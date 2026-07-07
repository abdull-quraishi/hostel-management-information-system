@extends('layouts.app')

@section('content')
<a href="{{ route('admin.students.index') }}" class="inline-block bg-blue-600 text-white font-bold px-6 py-2 rounded-lg text-3xl hover:bg-blue-700 mb-4">⬅ Back to Students</a>

<h2 class="text-3xl font-semibold mb-4">Edit Student</h2>
<div style="width: 1155px; height:20px; background-color:blue;"></div>

<div class="bg-white p-6 shadow rounded w-full md:w-2/3" style="box-shadow: 5px 5px 10px 2px rgba(0,0,255,0.5);">

   <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
     @csrf
       @method('PUT')
    

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div><label>Name</label>
                <input class="w-full p-2 border rounded" name="name" value="{{ old('name', $student->name) }}" required></div>

            <div><label>Father Name</label>
                <input class="w-full p-2 border rounded" name="father_name" value="{{ old('father_name', $student->father_name) }}"></div>

            <div><label>Address</label>
                <input class="w-full p-2 border rounded" name="address" value="{{ old('address', $student->address) }}"></div>

            <div><label>Contact No</label>
                <input class="w-full p-2 border rounded" name="contact" value="{{ old('contact', $student->contact) }}"></div>

            <div><label>Taskira / NIC</label>
                <input class="w-full p-2 border rounded" name="taskira" value="{{ old('taskira', $student->taskira) }}"></div>

            <div><label>University</label>
                <input class="w-full p-2 border rounded" name="university" value="{{ old('university', $student->university) }}"></div>

            <div><label>Room</label>
                <select id="roomSelect" name="room_id" class="w-full p-2 border rounded" required>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" 
                                data-floor-name="{{ $room->floor->name }}"
                                {{ ($student->room_id == $room->id) ? 'selected' : '' }}>
                            Room {{ $room->room_number }} → Floor: {{ $room->floor->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div><label>Floor Name</label>
                <input id="floorName" type="text" class="w-full p-2 border rounded bg-gray-100"  
                       value="{{ $student->room->floor->name ?? '' }}"></div>


            {{-- readonly total paid (display only) --}}
            <div>
                <label>Total Paid Amount</label>
                <input type="number" class="w-full p-2 border rounded" 
                       value="{{ $student->payments()->sum('paid_amount') }}" readonly>
            </div>

              <div>
        <label>Fixed Amount (Monthly)</label>
        <input type="number" name="monthly_fee" class="w-full p-2 border rounded"
               value="{{ old('monthly_fee ', $student->monthly_fee) }}" required>
    </div>

    <div>
        <label>Add Payment for current month</label>
        <!-- IMPORTANT: use single name 'paid_amount' (this will REPLACE current month's payment) -->
      <input type="number" name="paid_amount" value="0" min="0"  class="w-full p-2 border rounded">

    </div>

  <div>
    <label>Month</label>
    <select name="month" required  class="w-full p-2 border rounded">
        @for($m=1; $m<=12; $m++)
            <option value="{{ $m }}" {{ $m == now()->month ? 'selected' : '' }}>
                {{ \Carbon\Carbon::create(null, $m, 1)->format('F') }}
            </option>
        @endfor
    </select>
</div>

<div>
    <label>Year</label>
    <input type="number" name="year" value="{{ now()->year }}" min="2000" max="2100" class="w-full p-2 border rounded" style="width:1110px">
</div> <br>


        <button class="bg-blue-600 text-white px-4 py-4 rounded mt-4 text-3xl">Update Student</button>   
    </form>
</div>

  <script>
  const roomSelect = document.getElementById('roomSelect');
  const floorName = document.getElementById('floorName');
  roomSelect.addEventListener('change', function () {
      const option = roomSelect.options[roomSelect.selectedIndex];
      floorName.value = option.getAttribute('data-floor-name');
  });
  </script>
  
@endsection
