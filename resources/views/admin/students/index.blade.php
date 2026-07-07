@extends('layouts.app')

@section('content')

<a href="{{ route('admin.students.create') }}" class="bg-blue-600 text-white px-4 py-4 text-3xl font-bold rounded ">➕ Add New Student</a>
<h2 class="text-3xl font-bold mb-4 text-center ">All Students List</h2>

<form method="GET" action="{{ route('admin.students.index') }}" class="mb-4 flex justify-end">
    <input type="text" name="search" placeholder="Search by name, father name, contact..."
           class="border p-3 rounded" style="width: 400px;" value="{{ request('search') }}">
    <button class="bg-blue-600 text-white px-4 py-2 ml-2 rounded">Search</button>
</form>

<table class="w-full bg-white shadow rounded">
    <div style="width: 1733px; height:7px; background-color:darkblue;"></div>
    <thead>
        <tr class="bg-gray-200 text-left">
            <th class="p-3 text-lg">Name</th>
            <th class="p-3 text-lg">Father Name</th>
            <th class="p-3 text-lg">Address</th>
            <th class="p-3 text-lg">Contact</th>
            <th class="p-3 text-lg">Taskira/NIC</th>
            <th class="p-3 text-lg">University</th>
            <th class="p-3 text-lg">Floor</th>
            <th class="p-3 text-lg">Room</th>
            <th class="p-3 text-lg">Fixed Amount</th>
            <th class="p-3 text-lg">Paid</th>
            <th class="p-3 text-lg">Residual</th>
            <th class="p-3 text-lg">Adm Date</th>
            <th class="p-3 text-lg">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $s)
            <tr class="border-b">
                <td class="p-3 text-lg">{{ $s->name }}</td>
                <td class="p-3 text-lg">{{ $s->father_name ?? 'N/A' }}</td>
                <td class="p-3 text-lg">{{ $s->address ?? 'N/A' }}</td>
                <td class="p-3 text-lg">{{ $s->contact ?? 'N/A' }}</td>
                <td class="p-3 text-lg">{{ $s->taskira ?? 'N/A' }}</td>
                <td class="p-3 text-lg">{{ $s->university ?? 'N/A' }}</td>
                <td class="p-3 text-lg">{{ $s->floor->name ?? 'N/A' }}</td>
                <td class="p-3 text-lg">{{ $s->room->room_number ?? 'N/A' }}</td>
                <td class="p-3 text-2xl text-blue-500">{{ $s->monthly_fee }}</td>
                <td class="p-3 text-2xl text-green-600">{{ $s->payments()->sum('paid_amount') }}</td>
                <td class="p-3 text-2xl text-red-600">{{ $s->totalDue() }}</td>
                <td class="p-3 text-lg text-gray-700">{{ $s->admission_date }}</td>
                <td class="p-3 flex gap-2">
                    <a href="{{ route('admin.students.show', $s->id) }}" class="bg-blue-500 text-white px-2 py-2 rounded">Show</a>
                    <a href="{{ route('admin.students.edit', $s->id) }}" class="bg-green-500 text-white px-2 py-2 rounded">Add New</a>
                    <form action="{{ route('admin.students.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-2 py-2 rounded">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
 <div class="paginationDiv  mt-6 ">
    {{ $students->appends(request()->query())->links() }}

 </div>

@endsection
