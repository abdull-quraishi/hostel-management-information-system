<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\Student;
use App\Models\Room;
use App\Models\StudentPayment;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $total_students = Student::count();
        $total_rooms = Room::count();

        // Empty rooms (rooms with no students)
        $empty_rooms = Room::doesntHave('students')->count();

        // Payments total
        $total_payments = StudentPayment::sum('paid_amount');

        // Unpaid Students
        $unpaid_students = StudentPayment::where('due_amount', '>', 0)->distinct('student_id') ->count('student_id');


        return view('admin.dashboard', compact(
            'total_students',
            'total_rooms',
            'empty_rooms',
            'unpaid_students'
        ));
    }
}
