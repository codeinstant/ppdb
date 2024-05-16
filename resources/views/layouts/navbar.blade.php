<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i> {{ auth()->user()->name }}
      </a>
      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        
        {{-- <a href="{{ route('admin.ubahpassword') }}" class="dropdown-item">
          <i class="fas fa-user-cog mr-2"></i> Ubah Password
        </a> --}}
        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt mr-2" ></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
      </div>
    </li>
  </ul>
</nav>