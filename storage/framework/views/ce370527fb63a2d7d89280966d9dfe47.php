<?php $__env->startSection('title','Detail Pendaftar'); ?>
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
             <table class="table table-striped mb-5">
                <tbody>
                    <tr>
                        <td>Gelombang Ke</td>
                        <td>: <?php echo e($detail->penerimaan->gelombang); ?></td>
                        <td>Tahun Angkatan</td>
                        <td>: <?php echo e($detail->penerimaan->tahun_angkatan); ?></td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>: <?php echo e($detail->nik); ?></td>
                        <td>Nama</td>
                        <td>: <?php echo e($detail->user->name); ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: <?php echo e($detail->jenis_kelamin); ?></td>
                        <td>Alamat</td>
                        <td>: <?php echo e($detail->alamat); ?></td>
                    </tr>
                    <tr>
                        <td>Kecamtan</td>
                        <td>: <?php echo e($detail->kecamatan); ?></td>
                        <td>Kabupaten</td>
                        <td>: <?php echo e($detail->kabupaten); ?></td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td>: <?php echo e($detail->provinsi); ?></td>
                        <td>Tempat Lahir</td>
                        <td>: <?php echo e($detail->tempat_lahir); ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>: <?php echo e($detail->tanggal_lahir); ?></td>
                        <td>No telp</td>
                        <td>: <?php echo e($detail->no_telp); ?></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>: <?php echo e($detail->jurusan->nama); ?></td> 
                    </tr>
                    <tr>
                        <td>
                            NILAI UN
                        </td>
                    </tr>
                    <tr>
                        <td>IPA</td>
                        <td>: <?php echo e($detail->ipa); ?></td>
                        <td>Bahasa Indonesia</td>
                        <td>: <?php echo e($detail->bhs_indo); ?></td>
                    </tr>
                    <tr>
                        <td>Bahasa Inggris</td>
                        <td>: <?php echo e($detail->bhs_inggris); ?></td>
                        <td>Matematika</td>
                        <td>: <?php echo e($detail->matematika); ?></td>
                    </tr>
                    <tr>
                        <td>Pas Foto 3 x 4</td>
                        <td><img src="<?php echo e(url('storage/', $detail->foto)); ?>" alt="" style="height: 150px"></td>
                        <td>Ijasah</td>
                        <td><img src="<?php echo e(url('storage/', $detail->ijasah)); ?>" alt="" style="height: 150px"></td>
                    </tr>
                    <tr>
                        <td>Ayah</td>
                        <td>: <?php echo e($detail->nama_ayah); ?></td>
                        <td>Ibu</td>
                        <td>: <?php echo e($detail->nama_ibu); ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Ortu</td>
                        <td>: <?php echo e($detail->bhs_inggris); ?></td>
                        <td>No HP Ortu</td>
                        <td>: <?php echo e($detail->no_hp_ortu); ?></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Ayah</td>
                        <td>: <?php echo e($detail->pekerjaan_ayah); ?></td>
                        <td>Pekerjaan Ibu</td>
                        <td>: <?php echo e($detail->pekerjaan_ibu); ?></td>
                    </tr>
                    <tr>
                        <td>Penghasilan Ortu</td>
                        <td>: <?php echo e($detail->penghasilan_ortu); ?></td>
                    </tr>
                </tbody>
             </table>
            <?php if($detail->status == 1): ?>
                <!-- Jika status = 1 -->
                <form action="<?php echo e(route('pendaftar.updateterima', $detail->id)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-success" onclick="return confirm('Apakah anda ingin menerima?')">
                        <i class="fas fa-check-circle"></i> Terima
                    </button>
                </form>
                <form action="<?php echo e(route('pendaftar.updatetolak', $detail->id)); ?>" method="POST" class="d-inline"> 
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-danger" onclick="return confirm('Apakah anda ingin menolak?')">
                        <i class="fas fa-times-circle"></i> Tolak
                    </button>
                </form>
            <?php elseif($detail->status == 2): ?>
                <!-- Jika status = 2 atau 3 -->
                <!-- Tombol untuk memicu modal -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo e($detail->id); ?>">
                    Ubah Status
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modal<?php echo e($detail->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitle<?php echo e($detail->id); ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle<?php echo e($detail->id); ?>">Ubah Status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Isi modal, seperti form untuk mengubah status -->
                                <form action="<?php echo e(route('pendaftar.updatetolak', $detail->id)); ?>" method="POST" class="d-inline"> 
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-danger" onclick="return confirm('Apakah anda ingin menolak?')">
                                        <i class="fas fa-times-circle"></i> Tolak
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php elseif($detail->status == 3): ?>
                <!-- Jika status = 2 atau 3 -->
                <!-- Tombol untuk memicu modal -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo e($detail->id); ?>">
                    Ubah Status
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modal<?php echo e($detail->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitle<?php echo e($detail->id); ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle<?php echo e($detail->id); ?>">Ubah Status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Isi modal, seperti form untuk mengubah status -->
                                <form action="<?php echo e(route('pendaftar.updateterima', $detail->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-success" onclick="return confirm('Apakah anda ingin menerima?')">
                                        <i class="fas fa-check-circle"></i> Terima
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kodekulaku\projek\ppdb-master\resources\views/admin/pendaftar/detail.blade.php ENDPATH**/ ?>