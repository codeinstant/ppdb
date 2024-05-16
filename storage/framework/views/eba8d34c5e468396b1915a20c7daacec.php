<?php $__env->startSection('title','Data Pengguna'); ?>
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

      
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <?php if(session('sukses')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('sukses')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <?php if(session('suksesEdit')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('suksesEdit')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <?php if(session('delete')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('delete')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
          <!-- /.card -->
            <div class="card-header">
                 <?php echo $__env->yieldContent('title'); ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama </th>
                  <th>Role </th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $pengguna; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($sek->name); ?></td>
                    <td><?php echo e($sek->role->name); ?></td>
                      <td>
                        <a href="<?php echo e(route('pengguna.edit',$sek->id)); ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit Password</a>
                    </td>
                  </tr>
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
  $(function () {
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ppdb-master\resources\views/admin/pengguna/index.blade.php ENDPATH**/ ?>