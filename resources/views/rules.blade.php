<!DOCTYPE html>
<html>
<head>
  <title>Doctor Bawar Hostel</title>
  @vite(['resources/css/app.css','resources/js/app.js'])

  <style>
    nav {
      position: fixed; /* Always fixed on screen */
      top: 0;          
      width: 100%;     
      z-index: 1000;   
      background: linear-gradient(to right, #3B82F6, #6366F1);
    }

    /* Move overlay text to the top of the image */
    .relative .absolute {
      top: 20px;          
      left: 30%;         
      transform: translateY(-30%);
      text-align: center; 
      max-width: 800px;   
      font-size:35px;
    }

    h2{
      font-size:60px;
      width:1000px;
    }

    /* Style for the small overlay image */
    .overlay-image {
      position: absolute;
      top: 410px;       
      left: 1360px;      
      width: 510px;   
      height: 530px;
      z-index: 0;     
    }
  
   .rules{
    margin-top:250px;
    top:800px;
    height:1050px;
     background-color: rgba(0, 0, 255, 0.7); 
     text-align:left;
     z-index: 10;     
     overflow-y: auto;  
    border-radius: 10px;
   }

   
  </style>
</head>
<body class="bg-gray-50">

<nav class="bg-white shadow p-4 flex justify-between items-center z-50 relative">
  <div class="flex items-center gap-3">
    <img src="{{ asset('images/logo.jpg') }}" class="w-10 h-10 rounded-full" alt="logo" style="width:100px;height:100px">
    <h1 class="text-3xl font-bold text-white">Doctor Bawar Hostel Management Information System</h1>
  </div>
  <div class="flex gap-3">
    <a href="/" class="px-4 py-4 border bg-blue-600 text-white text-3xl rounded">Home Page</a>
    <a href="{{ route('admin.login') }}" class="px-4 border py-4 bg-blue-600 text-white text-3xl rounded">Admin Login</a>
  </div>
</nav>

<!-- Full screen hero / image with overlay text -->
<div class="relative w-full h-screen">
    <!-- Background image -->
    <img src="{{ asset('images/homepic.jpg') }}" 
         alt="Dormitory" 
         class="w-full h-full object-cover opacity-70">
  <!-- Overlay text -->
    <div class="rules absolute inset-0 flex flex-col items-center justify-center text-center text-white">
    <h2 class="text-3xl font-bold mb-4" style="font-size:50px">Hostel Rules</h2>
     <ul class="list-disc text-left">
        <li>Rule 1: Keep your own place clean.</li>
        <li>Rule 2: Respect your timings</li>         
        <li>Rule 2: Respect every person here</li>         
        <li>Rule 3: No loud music or talking after 10pm</li>
        <li>Rule 3: No loud music or talking after 10pm</li>
        <li>Rule 3: No loud music or talking after 10pm</li>
        <li>Rule 3: No loud music or talking after 10pm</li>
        <li>Rule 3: No loud music or talking after 10pm</li>
        <li>Rule 3: No loud music or talking after 10pm</li>
      
     </ul>
       
    </div>

    <!-- Small overlay image -->
    <img src="{{ asset('images/drpic.jpg') }}" alt="Doctor Bawar" class="overlay-image">
</div>

</body>
</html>
