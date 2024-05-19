<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('sdashboard') }}" class="brand-link">
        <span class="brand-text font-weight-bold ml-2">PPDB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('sdashboard') }}"
                        class="nav-link {{ request()->is('dashboard/siswa') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('siswa.riwayat') }}"
                        class="nav-link {{ request()->is('riwayat*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            Riwayat Pendaftaran
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
          <a href="{{ route('persyaratan.index') }}" class="nav-link {{ request()->is('persyaratan*') ? 'active' : '' }}">
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
