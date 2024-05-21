<?php $__env->startSection('title', 'Pendaftar Diterima'); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo $__env->yieldContent('title'); ?></h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo $__env->yieldContent('title'); ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 0;
                                    ?>
                                    <?php $__currentLoopData = $pendaftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendaf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($pendaf->status == 2 || $pendaf->status == 4 || $pendaf->status == 5): ?>
                                            <tr>
                                                <td><?php echo e($no += 1); ?></td>
                                                <td><?php echo e($pendaf->user->name); ?></td>
                                                <td><?php echo e($pendaf->jurusan->nama); ?></td>
                                                <td> <?php echo e($pendaf->alamat); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('pendaftar.detail', $pendaf->id)); ?>"
                                                        class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Detail</a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')); ?>"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kodekulaku\projek\ppdb-master\resources\views/admin/pendaftar/terima.blade.php ENDPATH**/ ?>