@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-3xl font-bold text-center">Add New Expense</h2>

    <div style="width: 1535px; height:20px; background-color:blue; "></div>

     <div class="bg-white p-6 shadow rounded w-full md:w-10/3" style="box-shadow: 5px 5px 10px 2px rgba(0,0,255,0.5);">

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

        
          <form action="{{ route('admin.expenses.store') }}" method="POST" class="bg-white shadow rounded p-6">
        
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-bold text-2xl">Title</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2 text-2xl" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-bold text-2xl">Amount (AFN)</label>
            <input type="number" name="amount" class="w-full border rounded px-3 py-2 text-2xl" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-bold text-2xl">Date</label>
            <input type="date" name="date" class="w-full border rounded px-3 py-2 text-2xl" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-bold text-2xl">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2 text-2xl" rows="3"></textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white text-3xl px-4 py-2 rounded">💾 Save Expense</button>
    </form>
    </div>
</div>
@endsection
