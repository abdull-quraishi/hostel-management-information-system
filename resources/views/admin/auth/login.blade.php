<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
    @vite('resources/css/app.css')

  <style>
    nav {
    position: fixed; /* Always fixed on screen */
    top: 0;          /* Stick at top */
    width: 100%;     /* Full width */
    z-index: 1000;   /* Stay above content */
   background: linear-gradient(to right, #3B82F6, #6366F1);

   }



  /* Make the login form appear on top of the image at the top */
.container {
    width: 1000px;
    height:540px;
    position: absolute;   
    top:140px;           
    left: 50%;            
    transform: translateX(-50%); 
    padding: 25px;
    background-color: rgba(255,255,255,0.90);
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    border-radius: 10px;
    z-index: 20;          
    font-size:25px
}

/* Optional: responsive adjustments */
@media (max-width: 768px) {
    .container {
        width: 480px;
        top: 30px;
    }
}


 h2{
  font-size:50px;
  color:blue;
 }
 label{
     color:darkblue;
     font-size:40px
 }

  /* ===== MODERN GLASS LOGIN ===== */

.container{
    backdrop-filter: blur(12px);
    background: rgba(255,255,255,0.85);
    animation: popUp 0.8s ease;
}

/* Entrance animation */
@keyframes popUp{
    0%{
        opacity:0;
        transform: translate(-50%,40px) scale(0.95);
    }
    100%{
        opacity:1;
        transform: translate(-50%,0) scale(1);
    }
}

/* Floating label system */
.field{
    position: relative;
    margin-bottom: 25px;
    margin-top: 45px;
}

.field input{
    width:100%;
    padding:16px 12px;
    font-size:24px;
    border:2px solid #CBD5E1;
    border-radius:8px;
    background: transparent;
    transition:0.3s;
}

.field label{
    position:absolute;
    left:12px;
    top:50%;
    transform: translateY(-50%);
    font-size:35px;
    color:#64748B;
    background:none;
    padding:0 8px;
    pointer-events:none;
    transition:0.3s;
}

/* Move label up */
.field input:focus + label,
.field input:not(:placeholder-shown) + label{
    top:-16px;
    font-size:16px;
    color:#2563EB;
}

/* Focus effect */
.field input:focus{
    border-color:#2563EB;
    box-shadow:0 0 0 4px rgba(37,99,235,0.25);
    outline:none;
}

/* Button modern effect */
.login-btn{
    position:relative;
    overflow:hidden;
    transition:0.3s;
}

.login-btn:hover{
    transform: translateY(-3px);
    box-shadow:0 12px 25px rgba(0,0,0,0.25);
}

.login-btn:active{
    transform: scale(0.96);
}

/* Ripple effect */
.login-btn::after{
    content:'';
    position:absolute;
    inset:0;
    background:rgba(255,255,255,0.25);
    opacity:0;
    transition:0.3s;
}

.login-btn:active::after{
    opacity:1;
}

/* Error shake */
.error{
    animation: shake 0.4s;
}

@keyframes shake{
    0%{transform:translateX(0);}
    25%{transform:translateX(-6px);}
    50%{transform:translateX(6px);}
    75%{transform:translateX(-6px);}
    100%{transform:translateX(0);}
}

 /* Style for the small overlay image */
    .overlay-image {
      position: absolute;
      top: 145px;       
      left: 1360px;      
      width: 510px;    
      height: 530px;
      z-index: 0;    
    }



  </style>
</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen">

<nav class="bg-white shadow p-4 flex justify-between items-center z-50 relative">
  <div class="flex items-center gap-3">
    <img src="{{ asset('images/logo.jpg') }}" class="w-10 h-10 rounded-full" alt="logo" style="width:100px;height:100px">
    <h1 class="text-3xl font-bold text-white">Doctor Bawar Hostel Management Information System</h1>
  </div>
  <div class="flex gap-3">
    <a href="{{ route('rules') }}" class="px-4 py-4 border bg-blue-600 text-white text-3xl rounded">Show Rules</a>
    <a href="/" class="px-4 border py-4 bg-blue-600 text-white text-3xl rounded">Home Page</a>
  </div>
</nav>

<!-- Full screen hero / image with overlay text -->
<div class="relative w-full h-screen">
    <!-- Background image -->
    <img src="{{ asset('images/homepic.jpg') }}" 
         alt="Dormitory" 
         class="w-full h-full object-cover opacity-70">
         
             <!-- Small overlay image -->
    <img src="{{ asset('images/drpic.jpg') }}" alt="Doctor Bawar" class="overlay-image">

         <!-- this is login form code -->
   <div class="w-96 bg-white p-6 shadow rounded container">
    <h2 class="text-xl font-bold mb-4 text-center">Admin Login</h2>
      @if ($errors->any())
      <p class="text-red-600 text-center font-bold error mb-4">
          {{ $errors->first() }}
      </p>
      @endif
      
       <form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf
    
    <div class="field">
        <input type="text" name="username" required placeholder=" ">
        <label>Username</label>
    </div>
    
    <div class="field ">
        <input type="password" name="password" required placeholder=" ">
        <label>Password</label>
    </div>
    
    <button class="w-full bg-blue-600 text-white text-3xl font-bold p-4 rounded login-btn">
        Login
    </button>
    
    </form>
  
</div>
</div>

</body>
</html>







