<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentPayment;
use App\Models\StudentStay;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = StudentPayment::with('student')
            ->orderBy('year','desc')
            ->orderBy('month','desc')
            ->get();

        return view('admin.payments.index', compact('payments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'paid_amount' => 'required|integer|min:0',
            'paid_at' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $student = Student::findOrFail($data['student_id']);
        $paid = $data['paid_amount'];
        $date = Carbon::parse($data['paid_at']);
        $month = $date->month;
        $year = $date->year;

        $monthlyFee = $student->monthly_fee;

        // Determine status
        $status = $paid >= $monthlyFee ? 'Paid' : ($paid > 0 ? 'Partial' : 'Unpaid');

        // Payment record for that month
        StudentPayment::updateOrCreate(
            [
                'student_id' => $student->id,
                'month' => $month,
                'year' => $year,
            ],
            [
                'monthly_fee' => $monthlyFee,
                'paid_amount' => $paid,
                'due_amount' => max(0, $monthlyFee - $paid),
                'status' => $status,
                'paid_at' => $date,
                'note' => $data['note'] ?? null,
            ]
        );

        // Update or create stay record
        $stay = StudentStay::updateOrCreate(
            [
                'student_id' => $student->id,
                'month' => $month,
                'year' => $year,
            ],
            [
                'is_present' => true,
                'paid_amount' => $paid,
                'residual_amount' => max(0, $monthlyFee - $paid),
                'note' => $data['note'] ?? null,
            ]
        );

        return redirect()->route('admin.payments.index')->with('success','Payment recorded successfully');
    }

    
}
