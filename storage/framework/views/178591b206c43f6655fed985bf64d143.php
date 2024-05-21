<?php $__env->startSection('title', 'Pengumuman Pendaftaran'); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><?php echo $__env->yieldContent('title'); ?></h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <!-- /.col-md-6 -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title m-0"><?php echo $__env->yieldContent('title'); ?> Gelombang
                                    ke-<?php echo e($pendaftar->penerimaan->gelombang); ?> Tahun Angkatan
                                    <?php echo e($pendaftar->penerimaan->tahun_angkatan); ?></h5>
                            </div>
                            <div class="card-body">
                                <?php if($pendaftar->status == 2): ?>
                                    Selamat anda lolos administrasi silahkan kerjakan test berikut<a
                                        href="/test/<?php echo e($pendaftar->penerimaan->id); ?>" class="btn btn-success">Test</a><br>
                                <?php elseif($pendaftar->status == 3): ?>
                                    Maaf anda tidak lolos administrasi, silahkan untuk mendaftar di sekolah lainnya.
                                <?php elseif($pendaftar->status == 5): ?>
                                    Selamat anda diterima silahkan <a
                                        href="<?php echo e(route('siswa.cetakformulir', $pendaftar->penerimaan->id)); ?>">Cetak
                                        Formulir</a><br>
                                <?php elseif($pendaftar->status == 6): ?>
                                    Maaf anda tidak diterima, silahkan untuk mencoba gelombang berikutnya.
                                <?php else: ?>
                                    Menunggu Konfirmasi Admin
                                <?php endif; ?>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo e(route('sdashboard')); ?>" class="btn btn-secondary"><i
                                        class="fas fa-arrow-alt-circle-left"></i> Ke Dashboard</a>
                            </div>

                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('plugins/select2/js/select2.full.min.js')); ?>"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kodekulaku\projek\ppdb-master\resources\views/siswa/pengumuman.blade.php ENDPATH**/ ?>