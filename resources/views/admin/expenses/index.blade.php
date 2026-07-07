@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <a href="{{ route('admin.expenses.create') }}" class="bg-blue-500 text-white px-4 py-4 text-2xl rounded mb-4 ">➕ Add Expense</a>
    <h2 class="mb-4 text-3xl font-bold text-center ">All Expenses</h2>
  
    <div class="bg-white shadow rounded p-4 mb-4">
        <h3 class="text-2xl font-bold">Total Expenses: AFN  {{ number_format($total_expenses) }}</h3>
    </div>

    <table class="w-full bg-white shadow rounded table-auto">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-2xl">#</th>
                <th class="px-4 py-2 text-2xl">Title</th>
                <th class="px-4 py-2 text-2xl">Amount (AFN)</th>  
                <th class="px-4 py-2 text-2xl">Date</th>
                <th class="px-4 py-2 text-2xl">Description</th>
                <th class="px-4 py-2 text-2xl">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
            <tr class="border-b">
                <td class="px-4 py-2 text-center text-2xl">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 text-center text-2xl">{{ $expense->title }}</td>
                <td class="px-4 py-2 text-center text-2xl">{{ number_format($expense->amount) }}</td>
                <td class="px-4 py-2 text-center text-2xl">{{ $expense->date }}</td>
                <td class="px-4 py-2 text-center text-2xl">{{ $expense->description ?? '-' }}</td>
                <td class="px-4 py-2 text-center text-2xl">
                   <form 
                         action="{{ route('admin.expenses.destroy', $expense->id) }}" method="POST"
                         onsubmit="return confirm('Are you sure you want to delete this month record?')" >   
                         @csrf
                         @method('DELETE')
                 
                         <button type="submit"class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 text-lg rounded-lg transition duration-200"  >
                                 Delete This Record
                         </button>
                     </form>

                </td>
                 
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
