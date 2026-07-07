<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Room;
use App\Models\StudentPayment;
use App\Models\StudentStay;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $students = Student::with(['room','room.floor'])
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                      ->orWhere('father_name', 'LIKE', "%$search%")
                      ->orWhere('contact', 'LIKE', "%$search%")
                      ->orWhere('taskira', 'LIKE', "%$search%");
            })
            ->paginate(10);

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $rooms = Room::with('floor')->get();
        return view('admin.students.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'father_name' => 'nullable',
            'address' => 'nullable',
            'contact' => 'nullable',
            'taskira' => 'nullable',
            'university' => 'nullable',
            'room_id' => 'required|exists:rooms,id',
            'monthly_fee' => 'required|integer',
            'paid_amount' => 'nullable|integer|min:0',
            'admission_date' => 'required|date',
        ]);

        // Prevent duplicate taskira
        if(!empty($data['taskira'])){
            $exists = Student::where('taskira',$data['taskira'])->first();
            if($exists){
                return redirect()->back()->with('error','Student with this Taskira already exists.');
            }
        }

        $room = Room::findOrFail($data['room_id']);

        $student = Student::create([
            'name' => $data['name'],
            'father_name' => $data['father_name'] ?? null,
            'address' => $data['address'] ?? null,
            'contact' => $data['contact'] ?? null,
            'taskira' => $data['taskira'] ?? null,
            'university' => $data['university'] ?? null,
            'room_id' => $room->id,
            'floor_id' => $room->floor_id,
            'monthly_fee' => $data['monthly_fee'],
            'admission_date' => $data['admission_date'],
        ]);

        $paid = intval($data['paid_amount'] ?? 0);
        $admissionDate = Carbon::parse($data['admission_date']);

        // Create initial payment if any
        if($paid >= 0){
            StudentPayment::create([
                'student_id' => $student->id,
                'month' => $admissionDate->month,
                'year' => $admissionDate->year,
                'monthly_fee' => $student->monthly_fee,
                'paid_amount' => $paid,
                'due_amount' => max(0, $student->monthly_fee - $paid),
                'status' => $paid >= $student->monthly_fee ? 'Paid' : 'Partial',
                'paid_at' => $admissionDate,
                'note' => 'Initial payment on admission'
            ]);
        }

        // Create stay record
        StudentStay::updateOrCreate(
            [
                'student_id' => $student->id,
                'month' => $admissionDate->month,
                'year' => $admissionDate->year,
            ],
            [
                'is_present' => true,
                'paid_amount' => $paid,
                'residual_amount' => max(0, $student->monthly_fee - $paid),
                'note' => 'admission',
            ]
        );

        // Increment room count
        $room->increment('current_students');

        return redirect()->route('admin.students.index')->with('success','Student added successfully');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $rooms = Room::with('floor')->get();
        return view('admin.students.edit', compact('student','rooms'));
    }

public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    // Validate request
    $data = $request->validate([
        'name' => 'required',
        'father_name' => 'nullable',
        'address' => 'nullable',
        'contact' => 'nullable',
        'taskira' => 'nullable',
        'university' => 'nullable',
        'room_id' => 'required|exists:rooms,id',
        'monthly_fee' => 'required|integer|min:0',
        'paid_amount' => 'nullable|integer|min:0',
        'admission_date' => 'nullable|date',
        'month' => 'required|integer|min:1|max:12',
        'year' => 'required|integer|min:2000|max:2100',
    ]);

    $month = $data['month'];
    $year  = $data['year'];

    $monthlyFee = $data['monthly_fee'];
    $paid = intval($data['paid_amount'] ?? 0);
    $due  = max(0, $monthlyFee - $paid);

    //  Update student basic info
    $student->update([
        'name' => $data['name'],
        'father_name' => $data['father_name'],
        'address' => $data['address'],
        'contact' => $data['contact'],
        'taskira' => $data['taskira'],
        'university' => $data['university'],
        'room_id' => $data['room_id'],
        'monthly_fee' => $monthlyFee,
        'admission_date' => $data['admission_date'] ?? $student->admission_date,
    ]);

    // Payment record for selected month
    StudentPayment::updateOrCreate(
        [
            'student_id' => $student->id,
            'month' => $month,
            'year' => $year,
        ],
        [
            'monthly_fee' => $monthlyFee,
            'paid_amount' => $paid,
            'due_amount' => $due,
            'status' => $paid >= $monthlyFee ? 'Paid' : ($paid > 0 ? 'Partial' : 'Unpaid'),
            'paid_at' => now(),
        ]
    );

    //Stay record for selected month
    StudentStay::updateOrCreate(
        [
            'student_id' => $student->id,
            'month' => $month,
            'year' => $year,
        ],
        [
            'is_present' => true,
            'paid_amount' => $paid,
            'residual_amount' => $due,
        ]
    );

    return redirect()
        ->route('admin.students.show', $student->id)
        ->with('success', "Student record for {$month}/{$year} updated successfully.");
   }

  
    public function show($id)
    {
        $student = Student::with(['room.floor','payments','stays'])->findOrFail($id);
        return view('admin.students.show', compact('student'));
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $room = $student->room;

        if($room && $room->current_students > 0){
            $room->decrement('current_students');
        }

        $student->delete();

        return redirect()->route('admin.students.index')->with('success','Student deleted successfully');
    }


  public function deleteMonthRecord($studentId, $year, $month)
 {
    // delete payment record of this month
    StudentPayment::where('student_id', $studentId)
        ->where('year', $year)
        ->where('month', $month)
        ->delete();

    // delete stay record of this month (if exists)
    StudentStay::where('student_id', $studentId)
        ->where('year', $year)
        ->where('month', $month)
        ->delete();

    return back()->with('success', 'Selected month record deleted successfully.');
}

}
