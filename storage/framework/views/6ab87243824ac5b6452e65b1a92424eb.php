<nav class="main-header navbar navbar-expand-md navbar-dark navbar-primary">
    <div class="container">
        <a href="/">
            <h5 class="brand-text font-weight-cold">PPDB</h5>
        </a>
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/" class="nav-link <?php echo e(request()->is('/') ? 'active' : ''); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('profil')); ?>"
                        class="nav-link <?php echo e(request()->is('profil*') ? 'active' : ''); ?>">Profil Sekolah</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('persyaratan')); ?>"
                        class="nav-link <?php echo e(request()->is('persyaratan*') ? 'active' : ''); ?>">Persyaratan</a>
                </li>

            </ul>

        </div>

        <!-- Right navbar links -->

        
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Messages Dropdown Menu -->
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item ">
                <?php if(auth()->guard()->guest()): ?>
                    <a class="nav-link" href="<?php echo e(route('login')); ?>">
                        <i class="far fa-user"></i> Login
                    </a>
                <?php endif; ?>
            </li>

            
            <!-- Level two dropdown-->
            <!-- End Level two -->
            


        </ul>
        

    </div>
</nav>
<?php /**PATH C:\Users\Kodekulaku\projek\ppdb-master\resources\views/layout/navbar.blade.php ENDPATH**/ ?>