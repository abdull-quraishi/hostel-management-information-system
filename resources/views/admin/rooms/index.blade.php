@extends('layouts.app')

@section('content')
<!-- css section  -->
 <style>
    .container {
        margin-left:50px;
    }
.floor-card{
    background:#ffffff;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,0.12);
    padding:16px;
    transition:transform .4s ease, box-shadow .4s ease;
    width: 700px;
    height:400px;
    margin-left:30px;
    margin-bottom:60px;
}
.floor-card:hover{
    transform:scale(1.05);
    box-shadow:0 20px 40px rgba(0,0,0,0.2);
}

.floor-card h3{
    text-align:center;
    font-size:20px;
    margin-bottom:12px;
    color:#1e3a8a;
}

.slider{
    display:flex;
    gap:12px;
    overflow-x:auto;
    scroll-behavior:smooth;
    height:300px;
}
.slider img{
    height:260px;
    min-width:240px;
    border-radius:12px;
    object-fit:cover;
    transition:transform .4s ease;
    
}
.slider img:hover{
    transform:scale(1.08);
}
.slider::-webkit-scrollbar{
    height:6px;
}
.slider::-webkit-scrollbar-thumb{
    background:#3b82f6;
    border-radius:10px;
}
.h2{
    background-color:blue;
    color:white;
    text-align:center;
    padding-block:10px;
    font-size:30px;
    
}
.floor-card h3{
    font-size:30px;
    color:blue;
}
</style>

<!-- html section -->
<div class="container ">
    <h2 class="mb-4 h2">Floors and Rooms</h2>
  <div style="display:grid;grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); ">

   <div class="col-md-6">
     <!-- Basement -->
    <div class="floor-card">
        <h3>Basement (6 Rooms)</h3>
        <div class="slider">
            <img src="{{asset('images/rooms/br1.jpg')}}" alt="Room1">
            <img src="{{asset('images/rooms/br2.jpg')}}" alt="Room2">
            <img src="{{asset('images/rooms/br3.jpg')}}" alt="Room3">
            <img src="{{asset('images/rooms/br4.jpg')}}" alt="Room4">
            <img src="{{asset('images/rooms/br5.jpg')}}" alt="Room5">
            <img src="{{asset('images/rooms/br6.jpg')}}" alt="Room6">
        </div>
    </div>
                <!-- Second Floor -->
    <div class="floor-card">
        <h3>Second Floor (4 Rooms)</h3>
        <div class="slider">
            <img src="{{asset('images/rooms/f2r1.jpg')}}" alt="Room1">
            <img src="{{asset('images/rooms/f2r2.jpg')}}" alt="Room2">
            <img src="{{asset('images/rooms/f2r3.jpg')}}" alt="Room3">
            <img src="{{asset('images/rooms/f2r4.jpg')}}" alt="Room4">
        </div>
    </div>

   </div>

    <div class="col-md-6">
        <!-- First Floor -->
    <div class="floor-card">
        <h3>First Floor (2 Rooms)</h3>
        <div class="slider">
            <img src="{{asset('images/rooms/f1r1.jpg')}}" alt="Room1">
            <img src="{{asset('images/rooms/f1r2.jpg')}}" alt="Room2">
            <img src="{{asset('images/rooms/f1r3.jpg')}}" alt="Room2">
            <img src="{{asset('images/rooms/f1r4.jpg')}}" alt="Room2">
        </div>
    </div>


    <!-- Third Floor -->
    <div class="floor-card">
        <h3>Third Floor (2 Rooms)</h3>
        <div class="slider">
            <img src="{{asset('images/rooms/f3r1.jpg')}}" alt="Room1">
            <img src="{{asset('images/rooms/f3r2.jpg')}}" alt="Room2">
        </div>
    </div>
    </div>

</div>

    
</div>
@endsection
