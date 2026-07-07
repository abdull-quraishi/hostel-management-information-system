<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'Admin Panel' }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    
</head>
<body class="font-sans bg-gray-100">
<div class="flex min-h-screen">

    <aside class="w-64 bg-gray-800 text-white p-4 hidden md:block">
    <img src="{{ asset('images/logo.jpg') }}" class="w-10 h-10 rounded-full " alt="logo" style="width:100px;height:100px; margin-left:50px">
        <!-- <h1 style="font-size:50px;text-align:center;">🏨</h1>  -->
        <h2 class="text-xl font-bold mb-6">Doctor Bawar Hostel</h2>
        <nav class="space-y-2">
            <a href="/" class="block p-2 rounded hover:bg-gray-700 text-3xl">Home Page</a>
            <a href="{{ route('admin.dashboard') }}" class="block p-2 rounded hover:bg-gray-700 text-3xl">Dashboard</a>
            <a href="{{ route('admin.students.index') }}" class="block p-2 rounded hover:bg-gray-700 text-3xl">Students</a>
            <a href="{{ route('admin.rooms.index') }}" class="block p-2 rounded hover:bg-gray-700 text-2xl">Floors & Rooms</a>
            <a href="{{ route('admin.expenses.index') }}" class="block p-2 rounded hover:bg-gray-700 text-3xl">Expenses</a>
            <a href="{{ route('admin.reports.index') }}" class="block p-2 rounded hover:bg-gray-700 text-3xl">Reports</a>
        </nav>

        <form method="POST" action="{{ route('admin.logout') }}" class="mt-6"> 
            @csrf
            <button class="w-full bg-red-600 p-3 rounded text-3xl" style="cursor:pointer">Logout</button>  
        </form>
    </aside>

    <main class="flex-1 p-6">
     
               <!-- SUCCESS MESSAGE -->
      <!-- ALERTS CONTAINER -->
     <div id="alert-container" class="fixed top-4 right-4 z-50 space-y-3">
     
         <!-- SUCCESS MESSAGE -->
         @if(session('success'))
         <div id="success-alert"
             class="flex items-center p-3  text-white bg-green-600 rounded-lg shadow-lg animate-fade-in">
             <span class="text-3xl mr-2 bg-white-600">✔️</span>
             <p class="text-sm font-medium">{{ session('success') }}</p>
         </div>
         @endif
     
         <!-- ERROR MESSAGE -->
         @if(session('error'))
         <div id="error-alert"
             class="flex items-center p-4 text-white bg-red-600 rounded-lg shadow-lg animate-fade-in">
             <span class="text-3xl mr-2">❌</span>
             <p class="text-sm font-medium">{{ session('error') }}</p>
         </div>
         @endif
     
     </div>
     
     <!-- AUTO REMOVE SCRIPT -->
     <script>
         setTimeout(() => {
             const success = document.getElementById('success-alert');  
             const error = document.getElementById('error-alert');
     
             if (success) {
                 success.classList.add('animate-fade-out');
                 setTimeout(() => success.remove(), 500);
             }
             if (error) {
                 error.classList.add('animate-fade-out');
                 setTimeout(() => error.remove(), 500);
             }
         }, 5000);
     </script>
     
     <!-- CUSTOM ANIMATIONS -->
     <style>
         .animate-fade-in {
             animation: fadeIn 0.4s ease-out;
         }
     
         .animate-fade-out {
             animation: fadeOut 0.5s ease-in forwards;  
         }
     
         @keyframes fadeIn {
             from {
                 opacity: 0;
                 transform: translateY(-10px);
             }
     
             to {
                 opacity: 1;
                 transform: translateY(0px);
             }
         }
     
         @keyframes fadeOut {
             from {
                 opacity: 1;
             }
     
             to {
                 opacity: 0;
                 transform: translateY(-10px);
             }
         }
         #success-alert{
            margin-top:30px;
            color:white;
            font-size:20px;
            background-color:green;
            width:400px;
            margin-left:270px;
         }
     </style>
     
   
   
        @yield('content')
    </main>

</div>
</body>
</html>



