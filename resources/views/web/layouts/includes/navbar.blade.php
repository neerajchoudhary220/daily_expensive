 <nav class="navbar navbar-light bg-light shadow-sm">
     <div class="container-fluid">
         <button class="btn btn-outline-primary" id="toggleSidebar">☰</button>

         <div class="dropdown ms-auto">
             <button class="btn btn-light dropdown-toggle" type="button" id="profileMenu" data-bs-toggle="dropdown"
                 aria-expanded="false">
                 👤 {{ auth()->user()->name }}
             </button>
             <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileMenu">
                 <li>
                     <a class="dropdown-item" href="#">
                         <i class="bi bi-person-circle me-2"></i> Profile
                     </a>
                 </li>
                 <li>
                     <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                         <i class="bi bi-box-arrow-right me-2"></i> Logout
                     </a>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
