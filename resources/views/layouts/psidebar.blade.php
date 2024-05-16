<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link">
    <span class="brand-text font-weight-bold ml-2">PPDB</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">Admin</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('pdashboard') }}" class="nav-link {{ (request()->is('pdashboard*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview {{ (request()->is('pendaftar*')) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (request()->is('pendaftar*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
             Quiz
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('soal.index') }}" class="nav-link {{ (request()->is('soal*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Soal</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('jawaban.index') }}" class="nav-link {{ (request()->is('jawaban*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Jawaban</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pendaftar.tolak') }}" class="nav-link {{ (request()->is('pendaftar/ditolak*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Hasil</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('gelombang.index') }}" class="nav-link {{ (request()->is('gelombang*')) ? 'active' : '' }}">
           <i class="nav-icon fas fa-cogs"></i>
            <p>
              Gelombang
            </p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="{{ route('persyaratan.index') }}" class="nav-link {{ (request()->is('persyaratan*')) ? 'active' : '' }}">
           <i class="nav-icon fas fa-cogs"></i>
            <p>
              Persyaratan
            </p>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>