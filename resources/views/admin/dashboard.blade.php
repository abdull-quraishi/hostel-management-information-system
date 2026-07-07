@extends('layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-4" style="font-size:40px">Dashboard Overview</h1>
<div class="grid grid-cols-1 md:grid-cols-4 gap-6" >
 
  <div class="bg-white p-6 shadow rounded" style="border:5px solid blue">
    <h3 class="text-gray-600 text-3xl" style="font-size:30px;padding:10px">Total Rooms</h3> <hr>
    <p class="text-3xl font-bold text-green-700" style="font-size:30px;padding:10px">{{ $total_rooms }}</p>
  </div>
  <div class="bg-white p-6 shadow rounded" style="border:5px solid red">
    <h3 class="text-gray-600 text-3xl" style="font-size:30px;padding:10px">Empty Rooms</h3> <hr>
    <p class="text-3xl font-bold text-purple-700" style="font-size:30px;padding:10px">{{ $empty_rooms }}</p>
  </div>

   <div class="bg-white p-6 shadow rounded" style="border:5px solid green">
    <h3 class="text-gray-600 text-3xl" style="font-size:30px;padding:10px">Total Students</h3> <hr>
    <p class="text-3xl font-bold text-blue-700" style="font-size:30px;padding:10px">{{ $total_students }}</p>
  </div>
  <div class="bg-white p-6 shadow rounded" style="border:5px solid black">
    <h3 class="text-gray-600 text-3xl" style="font-size:30px;padding:10px">Unpaid Students</h3> <hr>
    <p class="text-3xl font-bold text-red-700" style="font-size:30px;padding:10px">{{ $unpaid_students }}</p>
  </div>
</div>

<h1 class="text-xl font-bold mt-8  mb-4" style="font-size:40px">Quick Actions</h1>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
  <!-- Students -->
  <a href="{{ route('admin.students.create') }}" class="block bg-blue-500 h-20 p-4 text-center text-3xl text-white rounded shadow hover:bg-blue-600 transition"> 
    ➕ Add New Student
  </a>


  <!-- Payments -->
  <a href="{{ route('admin.reports.index') }}" class="block bg-green-500 p-4 text-center text-3xl text-white rounded shadow hover:bg-green-600 transition">
    📄 Monthly Report
  </a>

  <!-- Rooms -->
  <a href="{{ route('admin.rooms.index') }}" class="block bg-purple-500 p-4 text-center text-3xl text-white rounded shadow hover:bg-purple-600 transition">
    🏠 Manage Floors and Rooms
  </a>
</div>

<div style=" display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; height:500px;margin-top:5px">

    <!-- Card 1 -->
    <div style="overflow: hidden; border-radius: 16px; box-shadow: 0 8px 20px rgba(0,0,0,0.15); transition: transform 0.4s ease;"
    onmouseover="this.style.transform='scale(1.08)'"
    onmouseout="this.style.transform='scale(1)'">
        <img src="/images/mypic.jpg" style="
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;">
    </div>

    <!-- Card 2 -->
    <div style="overflow: hidden; border-radius: 16px;box-shadow: 0 8px 20px rgba(0,0,0,0.15); transition: transform 0.4s ease;"
    onmouseover="this.style.transform='scale(1.08)'"
    onmouseout="this.style.transform='scale(1)'">
        <img src="/images/report.jpg" style="
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;">
    </div>

    <!-- Card 3 -->
    <div style="overflow: hidden;border-radius: 16px; box-shadow: 0 8px 20px rgba(0,0,0,0.15); transition: transform 0.4s ease;"
    onmouseover="this.style.transform='scale(1.08)'"
    onmouseout="this.style.transform='scale(1)'">
        <img src="/images/floor.jpg" style="
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;">
            
    </div>

</div>

@endsection
