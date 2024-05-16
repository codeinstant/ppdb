<?php $__env->startSection('title','Profil'); ?>
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
            <?php if($profil->count() == 0): ?>
            <div class="card-header">
                <a href="<?php echo e(route('profil.create')); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
            </div>
              <?php endif; ?>

            <!-- /.card-header -->
            <div class="card-body">
                
              <table class="table table-striped mb-5">
                <tbody>
                  <?php $__currentLoopData = $profil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>Nama Sekolah</td>
                        <td>: <?php echo e($detail->nama_sekolah); ?></td>
                        <td>Nama Kepala Sekolah</td>
                        <td>: <?php echo e($detail->nama_kpl_sekolah); ?></td>
                    </tr>
                    <tr>
                        <td>NIP Kepala Sekolah</td>
                        <td>: <?php echo e($detail->nip_kpl_sekolah); ?></td>
                        <td>TTD Kepala Sekolah</td>
                        <td>: <?php echo e($detail->ttd_kpl_sekolah); ?></td>
                    </tr>
                    <tr>
                        <td>Nama Ketua PPDB</td>
                        <td>: <?php echo e($detail->nama_ketua_ppdb); ?></td>
                        <td>NIP PPDB</td>
                        <td>: <?php echo e($detail->nip_ppdb); ?></td>
                    </tr>
                    <tr>
                        <td>Telepon Sekolah</td>
                        <td>: <?php echo e($detail->tel_sekolah); ?></td>
                        <td>Web Sekolah</td>
                        <td>: <?php echo e($detail->web_sekolah); ?></td>
                    </tr>
                    <tr>
                        <td>Email Sekolah</td>
                        <td>: <?php echo e($detail->email_sekolah); ?></td> 
                        <td>Logo Sekolah</td>
                        <td>: <?php echo e($detail->logo_sekolah); ?></td>
                    </tr>
                    
                      <td>
                        <a href="<?php echo e(route('profil.edit',$detail->id)); ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit</a>
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ppdb-master\resources\views/admin/profil/index.blade.php ENDPATH**/ ?>