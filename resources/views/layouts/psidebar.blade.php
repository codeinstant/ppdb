<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('pdashboard') }}" class="brand-link">
        <span class="brand-text font-weight-bold ml-2">PPDB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Kepala TU</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('pdashboard') }}"
                        class="nav-link {{ request()->is('dashboard/kepala-tu') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('hasil') }}" class="nav-link {{ request()->is('hasil') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Hasil
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kepala.profil.index') }}"
                        class="nav-link {{ request()->is('kprofil*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            Profil Sekolah
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
