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
        <i class="far fa-user"></i> <?php echo e(auth()->user()->name); ?>

      </a>
      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        
        
        <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt mr-2" ></i> Logout
        </a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
          <?php echo csrf_field(); ?>
      </form>
      </div>
    </li>
  </ul>
</nav><?php /**PATH C:\Users\Kodekulaku\projek\ppdb-master\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>