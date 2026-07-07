@extends('layouts.app')

@section('content')
<a href="{{ route('admin.students.index') }}" class="inline-block bg-blue-600 text-white font-bold px-6 py-2 rounded-lg text-3xl hover:bg-blue-700 mb-4">⬅ Back to Students</a>

<h2 class="text-3xl font-semibold mt-4 mb-4">Add New Student</h2>
<div style="width: 1155px; height:20px; background-color:blue;"></div>

<div class="bg-white p-6 shadow rounded w-full md:w-2/3" style="box-shadow: 5px 5px 10px 2px rgba(0,0,255,0.5);"> 
    <form method="POST" action="{{ route('admin.students.store') }}">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div><label>Name</label><input class="w-full p-2 border rounded" name="name" required></div>
            <div><label>Father Name</label><input class="w-full p-2 border rounded" name="father_name"></div>
            <div><label>Address</label><input class="w-full p-2 border rounded" name="address"></div>
            <div><label>Contact No</label><input class="w-full p-2 border rounded" name="contact"></div>
            <div><label>Taskira / NIC</label><input class="w-full p-2 border rounded" name="taskira"></div>
            <div><label>University</label><input class="w-full p-2 border rounded" name="university"></div>

            <div>
                <label>Room</label>
                <select id="roomSelect" name="room_id" class="w-full p-2 border rounded" required>
                    <option value="">Select Room</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" 
                                data-floor-name="{{ $room->floor->name }}">
                            Room {{ $room->room_number }} → Floor: {{ $room->floor->name }}   
                        </option>
                    @endforeach
                </select>
            </div>

            <div><label>Floor Name</label>
                <input id="floorName" type="text" class="w-full p-2 border rounded bg-gray-100" readonly>
            </div>

          

            <div><label>Fixed Amount (Monthly)</label>
                <input type="number" name="monthly_fee" class="w-full p-2 border rounded" required>
            </div>

            <div><label>Paid Amount (for admission)</label>
                <input type="number" name="paid_amount" value="0" class="w-full p-2 border rounded" required>
            </div>

            <div><label>Admission Date</label>
                <input type="datetime-local" name="admission_date" class="w-full p-2 border rounded" required style="width:1110px">
            </div>
        </div>

        <button class="bg-blue-600 text-white text-3xl px-4 py-4 rounded mt-4">Save Student</button>
    </form>
</div>

<script>
const roomSelect = document.getElementById('roomSelect');
const floorName = document.getElementById('floorName');

roomSelect.addEventListener('change', function () {
    const option = roomSelect.options[roomSelect.selectedIndex];
    // check if data-floor-name exists
    const floor = option.getAttribute('data-floor-name');
    floorName.value = floor ?? 'N/A';
});
</script>


@endsection
