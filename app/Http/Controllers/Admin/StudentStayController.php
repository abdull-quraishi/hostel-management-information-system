<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentStay;
use Carbon\Carbon;

class StudentStayController extends Controller
{
    // Display all stays
    public function index()
    {
        $stays = StudentStay::with('student')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('admin.stays.index', compact('stays'));
    }

    // Show a single student's stays
    public function show($studentId)
    {
        $student = Student::with(['stays'])->findOrFail($studentId);

        return view('admin.stays.show', compact('student'));
    }

    // Show form to create a new stay
    public function create()
    {
        $students = Student::all();
        return view('admin.stays.create', compact('students'));
    }

    // Store a new stay record
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:2000',
            'paid_amount' => 'nullable|integer|min:0',
            'is_present' => 'nullable|boolean',
            'note' => 'nullable|string',
        ]);

        $student = Student::findOrFail($data['student_id']);
        $paid = $data['paid_amount'] ?? 0;
        $monthlyFee = $student->monthly_fee;
        $residual = max(0, $monthlyFee - $paid);

        $stay = StudentStay::updateOrCreate(
            [
                'student_id' => $student->id,
                'month' => $data['month'],
                'year' => $data['year'],
            ],
            [
                'paid_amount' => $paid,
                'residual_amount' => $residual,
                'is_present' => $data['is_present'] ?? true,
                'note' => $data['note'] ?? null,
            ]
        );

        return redirect()->route('admin.stays.index')
                         ->with('success', 'Student stay recorded successfully.');
    }

    // Show form to edit an existing stay
    public function edit($id)
    {
        $stay = StudentStay::with('student')->findOrFail($id);
        return view('admin.stays.edit', compact('stay'));
    }

    // Update a stay record
    public function update(Request $request, $id)
    {
        $stay = StudentStay::findOrFail($id);

        $data = $request->validate([
            'paid_amount' => 'nullable|integer|min:0',
            'is_present' => 'nullable|boolean',
            'note' => 'nullable|string',
        ]);

        $stay->update([
            'paid_amount' => $data['paid_amount'] ?? $stay->paid_amount,
            'residual_amount' => max(0, $stay->student->monthly_fee - ($data['paid_amount'] ?? $stay->paid_amount)),
            'is_present' => $data['is_present'] ?? $stay->is_present,
            'note' => $data['note'] ?? $stay->note,
        ]);

        return redirect()->route('admin.stays.index')
                         ->with('success', 'Student stay updated successfully.');
    }

    // Delete a stay
    public function destroy($id)
    {
        $stay = StudentStay::findOrFail($id);
        $stay->delete();

        return redirect()->route('admin.stays.index')
                         ->with('success', 'Student stay deleted successfully.');
    }
}
