@extends('layouts.app')

@section('content')
<a href="{{ route('admin.students.index') }}" class="inline-block bg-blue-600 text-white font-bold px-6 py-2 rounded-lg text-3xl hover:bg-blue-700 mb-4">⬅ Back to Students</a>

<div style="width: 1710px; height:20px; background-color:gray; margin-top:20px"></div>
<div class="bg-white shadow p-6 rounded w-full md:w-11/12 mx-auto text-lg">
    
    <h2 class="text-3xl font-bold text-black-700 mb-4">Student Full Details</h2>

    <!-- Basic info -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div><h3 class="font-bold">Student Name:</h3><p>{{ $student->name }}</p></div>
        <div><h3 class="font-bold">Father Name:</h3><p>{{ $student->father_name }}</p></div>
        <div><h3 class="font-bold">Address:</h3><p>{{ $student->address }}</p></div>
        <div><h3 class="font-bold">Contact:</h3><p>{{ $student->contact }}</p></div>
        <div><h3 class="font-bold">Taskira / NIC:</h3><p>{{ $student->taskira }}</p></div>
        <div><h3 class="font-bold">University:</h3><p>{{ $student->university }}</p></div>
        <div><h3 class="font-bold">Place</h3>
            <p>Floor: {{ $student->room->floor->name ?? 'N/A' }}<br>
               Room: {{ $student->room->room_number ?? 'N/A' }} (Capacity: {{ $student->room->capacity ?? 'N/A' }})</p>
        </div>
        <div><h3 class="font-bold">Admission Date:</h3><p>{{ $student->admission_date }}</p></div>


    </div>

    <hr class="my-6">

    <h3 class="text-2xl font-bold mb-4">Payment Information</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <div class="bg-blue-100 p-3 rounded">
            <h4 class="font-bold">Fixed Amount (Monthly)</h4>
            <p class="text-blue-700 text-xl">{{ $student->monthly_fee }} AFN</p>   
        </div>

        <div class="bg-green-100 p-3 rounded">
            <h4 class="font-bold">Total Paid</h4>
            <p class="text-green-700 text-xl">
                {{ $student->payments()->sum('paid_amount') }} AFN
            </p>
        </div>

        <div class="bg-red-100 p-3 rounded">
            <h4 class="font-bold">Total Due</h4>
            <p class="text-red-700 text-xl">
                {{ $student->payments()->sum('due_amount') }} AFN
            </p>
        </div>

    </div>

    <hr class="my-6">

    <h3 class="text-3xl font-bold mb-4">Full Year / Months Report</h3>

<div class="overflow-x-auto mt-6" >
    <table class="w-full bg-white border border-gray-200 shadow-md rounded-lg overflow-hidden border-separate border-spacing-y-3">
        <thead class="bg-blue-600 text-white">
            <tr class=" shadow-sm rounded-lg hover:shadow-md transition">

                <th class="px-6 py-3 text-left text-3xl font-semibold uppercase">Year</th>
                <th class="px-6 py-3 text-left text-3xl font-semibold uppercase">Month</th>
                <th class="px-6 py-3 text-left text-3xl font-semibold uppercase">Paid</th>
                <th class="px-6 py-3 text-left text-3xl font-semibold uppercase">Residual</th>
                <th class="px-6 py-3 text-left text-3xl font-semibold uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class=" divide-gray-200">
            @php
                $payments = $student->payments()->orderBy('year')->orderBy('month')->get();
                $totalPaid = 0;
                $totalDue = 0;
                $months = [
                    1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',
                    7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December'
                ];
            @endphp

            @foreach($payments as $payment)
                @php
                    $totalPaid += $payment->paid_amount;
                    $totalDue += $payment->due_amount;  
                @endphp
                <tr class="hover:bg-gray-100 transition duration-150">
                    <td class="px-6 py-3 text-2xl text-gray-700">{{ $payment->year }}</td>
                    <td class="px-6 py-3 text-2xl text-gray-700">{{ $months[$payment->month] }}</td>
                    <td class="px-6 py-3 text-2xl text-green-600 font-semibold">{{ $payment->paid_amount }} AFN</td>
                    <td class="px-6 py-3 text-2xl text-red-600 font-semibold">{{ $payment->due_amount }} AFN</td>
                    <td class="px-6 py-3 text-2xl">
                     <form 
                         action="{{ route('admin.students.month.delete', [$student->id, $payment->year, $payment->month]) }}" method="POST"
                         onsubmit="return confirm('Are you sure you want to delete this month record?')" >
                         @csrf
                         @method('DELETE')
                 
                         <button type="submit"class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 text-lg rounded-lg transition duration-200"  >
                                 Delete this month
                         </button>
                     </form>
                 </td>
                 
                </tr>
            @endforeach
        </tbody>
        <tfoot class="bg-gray-100 font-semibold text-gray-800 ">
            <tr>
                <td colspan="2" class="px-6  py-4 text-2xl text-left">Total:</td>
                <td class="px-6  py-4 text-2xl text-green-700">{{ $totalPaid }} AFN</td>
                <td class="px-6  py-4 text-2xl text-red-700">{{ $totalDue }} AFN</td>
                <td class="px-6  py-4 text-2xl text-gray-700">      </td>
            </tr>
        </tfoot>
    </table>
</div>


</div>
@endsection
