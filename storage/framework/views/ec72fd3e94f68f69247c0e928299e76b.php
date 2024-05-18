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
                Provinsi DKI Jakarta Periode 2022 / 2023 secara online real time process untuk pelaksanaan PPDB Online.</p>

            <?php if($pendaftar == null): ?>
                <?php $__currentLoopData = $gelombang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <hr>
                    <h4>Gelombang ke <?php echo e($sek['gelombang']); ?></h4>
                    <p>Tahun angkatan <?php echo e($sek['tahun_angkatan']); ?></p>
                    <p>Open at <?php echo e($sek['buka']); ?></p>
                    <?php if($can_daftar[$key]): ?>
                        <p><a href="/form/<?php echo e($sek['id']); ?>" class="btn btn-primary">Daftar Sekarang!</a></p>
                    <?php endif; ?>
                    <p>Close at <?php echo e($sek['tutup']); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php
                    $sudah_lulus = false;
                    foreach ($pendaftar as $i => $p) {
                        if ($p->status == 4) {
                            $sudah_lulus = true;
                        }
                    }
                ?>
                <?php if($sudah_lulus): ?>
                    <h4>Halo <?php echo e(Auth::user()->name); ?></h4>
                <?php else: ?>
                    <?php $__currentLoopData = $pendaftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $print = true;
                        ?>
                        <?php $__currentLoopData = $gelombang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j => $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($p->penerimaan_id == $g['id']): ?>
                                <hr>
                                <h4>Gelombang ke <?php echo e($p->penerimaan->gelombang); ?></h4>
                                <p>Tahun angkatan <?php echo e($p->penerimaan->tahun_angkatan); ?></p>
                                <p><a href="/pengumuman/<?php echo e($g['id']); ?>" class="btn btn-primary">Lihat Pengumuman</a></p>
                                <?php
                                    $print = false;
                                    break;
                                ?>
                            <?php else: ?>
                                <hr>
                                <h4>Gelombang ke <?php echo e($g['gelombang']); ?></h4>
                                <p>Tahun angkatan <?php echo e($g['tahun_angkatan']); ?></p>
                                <p>Open at <?php echo e($g['buka']); ?></p>
                                <?php if($can_daftar[$j]): ?>
                                    <p><a href="/form/<?php echo e($g['id']); ?>" class="btn btn-primary">Daftar Sekarang!</a></p>
                                <?php endif; ?>
                                <p>Close at <?php echo e($g['tutup']); ?>

                                    <?php echo e($print); ?></p>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($print): ?>
                            <hr>
                            <h4>Gelombang ke <?php echo e($p->penerimaan->gelombang); ?></h4>
                            <p>Tahun angkatan <?php echo e($p->penerimaan->tahun_angkatan); ?></p>
                            <p><a href="/pengumuman/<?php echo e($p->penerimaan->id); ?>" class="btn btn-primary">Lihat Pengumuman</a>
                            </p>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endif; ?>
            
        </div>
    </div>

    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kodekulaku\projek\ppdb-master\resources\views/index.blade.php ENDPATH**/ ?>