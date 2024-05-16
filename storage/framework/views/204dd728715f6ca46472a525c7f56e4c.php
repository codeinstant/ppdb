<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo e(route('dashboard')); ?>" class="brand-link">
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
          <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e((request()->is('dashboard*')) ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview <?php echo e((request()->is('pendaftar*')) ? 'menu-open' : ''); ?>">
          <a href="#" class="nav-link <?php echo e((request()->is('pendaftar*')) ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
             Pendaftar
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo e(route('pendaftar.index')); ?>" class="nav-link <?php echo e((request()->is('pendaftar/view*')) ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pendaftar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('pendaftar.terima')); ?>" class="nav-link <?php echo e((request()->is('pendaftar/diterima*')) ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Diterima</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('pendaftar.tolak')); ?>" class="nav-link <?php echo e((request()->is('pendaftar/ditolak*')) ? 'active' : ''); ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Ditolak</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="/jurusan" class="nav-link <?php echo e((request()->is('jurusan*')) ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-school"></i>
            <p>
              Jurusan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo e(route('persyaratan.index')); ?>" class="nav-link <?php echo e((request()->is('persyaratan*')) ? 'active' : ''); ?>">
           <i class="nav-icon fas fa-cogs"></i>
            <p>
              Persyaratan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo e(route('profil.index')); ?>" class="nav-link <?php echo e((request()->is('profil*')) ? 'active' : ''); ?>">
           <i class="nav-icon fas fa-cogs"></i>
            <p>
              Profil Sekolah
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo e(route('pengguna.index')); ?>" class="nav-link <?php echo e((request()->is('pengguna*')) ? 'active' : ''); ?>">
            <i class="fas fa-users-cog"></i>
            <p>
              Pengguna
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside><?php /**PATH C:\xampp\htdocs\ppdb-master\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>