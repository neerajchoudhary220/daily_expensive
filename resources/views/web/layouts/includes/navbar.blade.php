 <nav class="navbar navbar-light bg-light shadow-sm">
     <div class="container-fluid">
         <button class="btn btn-outline-primary" id="toggleSidebar">☰</button>
         <span class="ms-auto">Welcome, {{ auth()->user()->name }}</span>
         <a class="btn btn-danger btn-sm ms-2" href="{{ route('logout') }}">Logout</a>
     </div>
 </nav>
