<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Main content -->
        <style>
            .jumbotron {
                background-image: url("https://assets.zyrosite.com/cdn-cgi/image/format=auto,w=1920,fit=crop/AzGRxyegrGSGN2G3/BACKGROUND-mxB3a4x0WvHvz2Kd.png");
                background-size: cover;
            }
        </style>
        <div class="jumbotron">
            <h1 class="display-4">Selamat Datang!</h1>
            <p class="lead">di PPDB </p>



            <hr class="my-4">
            <p>Situs ini dipersiapkan sebagai pengganti pusat informasi dan pengolahan seleksi data siswa peserta PPDB
                Provinsi Sumatera Selatan Periode 2024 / 2025 secara online real time process untuk pelaksanaan PPDB Online.
            </p>

            <?php $__currentLoopData = $gelombang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gelombang ke <?php echo e($sek['gelombang']); ?></h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Tahun angkatan <?php echo e($sek['tahun_angkatan']); ?></p>
                        <p>Open at <?php echo e($sek['buka']); ?></p>
                        <?php if($can_daftar[$key]): ?>
                            <p><a href="/form/<?php echo e($sek['id']); ?>" class="btn btn-primary">Daftar Sekarang!</a></p>
                        <?php endif; ?>
                        <p>Close at <?php echo e($sek['tutup']); ?></p>
                    </div>
                </div>
                <!-- /.card -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
    </div>

    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kodekulaku\projek\ppdb-master\resources\views/index.blade.php ENDPATH**/ ?>