<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentPayment;
use App\Models\Expense;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        // Current Month
        $month = Carbon::now()->month;
        $year  = Carbon::now()->year;

        // Total Income from Payments
        $total_income = StudentPayment::whereMonth('created_at', $month)
                               ->whereYear('created_at', $year)
                               ->sum('paid_amount');

        // Total Expenses
        $total_expenses = Expense::whereMonth('date', $month)
                                 ->whereYear('date', $year)
                                 ->sum('amount');

        // Profit / Loss
        $profit_loss = $total_income - $total_expenses;

        return view('admin.reports.index', compact(
            'total_income',
            'total_expenses',
            'profit_loss',
              'month',
              'year'
          ));
      }
  
  }
