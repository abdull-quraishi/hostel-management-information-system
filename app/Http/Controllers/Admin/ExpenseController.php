<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    // 
    public function index()
    {
        $expenses = Expense::orderBy('date', 'desc')->get();
        $total_expenses = Expense::sum('amount');
        return view('admin.expenses.index', compact('expenses', 'total_expenses'));
    }

    public function create()
    {
        return view('admin.expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        Expense::create($request->all());  
        return redirect()->route('admin.expenses.index')->with('success', 'Expense added successfully!');
    }

      public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('admin.expenses.index')->with('success','Record deleted successfully');
    }

}
