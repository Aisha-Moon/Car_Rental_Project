 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2)=='dashboard') @else collapsed @endif" href="{{ url('admin/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>


      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/car/list') }}" @if(Request::segment(2)=='car') @else collapsed @endif">
          <i class="bi bi-person"></i>
          <span>Manage Cars</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/rental') }}" @if(Request::segment(2)=='rental') @else collapsed @endif">
          <i class="bi bi-person"></i>
          <span>Manage Rentals</span>
        </a>
      </li>
     

     
    

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Manage Customers</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('logout') }}">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </li>

    </ul>

  </aside>
