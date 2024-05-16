<?php $__env->startSection('title', isset($detail) ? 'Edit Profil Sekolah' : 'Tambah Profil Sekolah'); ?>
<?php $__env->startSection(''); ?>
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
      <!-- Default box -->
      <div class="card">
        <div class="card-header">   
            <h3 class="card-title"><?php echo $__env->yieldContent('title'); ?></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <form role="form" 
              <?php if(isset($detail)): ?> 
                action="<?php echo e(route('profil.update', $detail->id)); ?>" 
              <?php else: ?> 
                action="<?php echo e(route('profil.store')); ?>" 
              <?php endif; ?> 
              method="POST">
            <?php echo csrf_field(); ?>
            <?php if(isset($detail)): ?>
              <?php echo method_field('PUT'); ?>
            <?php endif; ?>
        
            <div class="card-body">
              <div class="form-group">
                <label for="nama_sekolah">Nama Sekolah</label>
                <input type="text" class="form-control col-lg-6 <?php $__errorArgs = ['nama_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo e(isset($detail) ? $detail->nama_sekolah : old('nama_sekolah')); ?>">

                <label for="nama_kpl_sekolah">Nama Kepala Sekolah</label>
                <input type="text" class="form-control col-lg-6 <?php $__errorArgs = ['nama_kpl_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nama_kpl_sekolah" placeholder="Nama Kepala Sekolah" value="<?php echo e(isset($detail) ? $detail->nama_kpl_sekolah : old('nama_kpl_sekolah')); ?>">

                <label for="nip_kpl_sekolah">NIP Kepala Sekolah</label>
                <input type="text" class="form-control col-lg-6 <?php $__errorArgs = ['nip_kpl_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nip_kpl_sekolah" placeholder="NIP Kepala Sekolah" value="<?php echo e(isset($detail) ? $detail->nip_kpl_sekolah : old('nip_kpl_sekolah')); ?>">

                <label for="ttd_kpl_sekolah">TTD Kepala Sekolah</label>
                <input type="img" class="form-control col-lg-6 <?php $__errorArgs = ['ttd_kpl_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="ttd_kpl_sekolah" placeholder="TTD Kepala Sekolah" value="<?php echo e(isset($detail) ? $detail->ttd_kpl_sekolah : old('ttd_kpl_sekolah')); ?>">

                <label for="nama_ketua_ppdb">Nama Ketua PPDB</label>
                <input type="text" class="form-control col-lg-6 <?php $__errorArgs = ['nama_ketua_ppdb'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nama_ketua_ppdb" placeholder="Nama Ketua PPDB" value="<?php echo e(isset($detail) ? $detail->nama_ketua_ppdb : old('nama_ketua_ppdb')); ?>">

                <label for="nip_ppdb">NIP PPDB</label>
                <input type="text" class="form-control col-lg-6 <?php $__errorArgs = ['nip_ppdb'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nip_ppdb" placeholder="NIP PPDB" value="<?php echo e(isset($detail) ? $detail->nip_ppdb : old('nip_ppdb')); ?>">

                <label for="alamat_sekolah">Alamat Sekolah</label>
                <input type="text" class="form-control col-lg-6 <?php $__errorArgs = ['alamat_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="alamat_sekolah" placeholder="Alamat Sekolah" value="<?php echo e(isset($detail) ? $detail->alamat_sekolah : old('alamat_sekolah')); ?>">

                <label for="tel_sekolah">Telepon Sekolah</label>
                <input type="text" class="form-control col-lg-6 <?php $__errorArgs = ['tel_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tel_sekolah" placeholder="Telepon Sekolah" value="<?php echo e(isset($detail) ? $detail->tel_sekolah : old('tel_sekolah')); ?>">

                <label for="web_sekolah">Web Sekolah</label>
                <input type="text" class="form-control col-lg-6 <?php $__errorArgs = ['web_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="web_sekolah" placeholder="Web Sekolah" value="<?php echo e(isset($detail) ? $detail->web_sekolah : old('web_sekolah')); ?>">

                <label for="email_sekolah">Email Sekolah</label>
                <input type="text" class="form-control col-lg-6 <?php $__errorArgs = ['email_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email_sekolah" placeholder="Email Sekolah" value="<?php echo e(isset($detail) ? $detail->email_sekolah : old('email_sekolah')); ?>">

                <label for="logo_sekolah">Logo Sekolah</label>
                <input type="text" class="form-control col-lg-6 <?php $__errorArgs = ['logo_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="logo_sekolah" placeholder="Logo Sekolah" value="<?php echo e(isset($detail) ? $detail->logo_sekolah : old('logo_sekolah')); ?>">

                <!-- Menambahkan hidden input untuk menyimpan ID jika sedang mengedit -->
                <?php if(isset($detail)): ?>
                  <input type="hidden" name="id" value="<?php echo e($detail->id); ?>">
                <?php endif; ?>

                <span class="invalid-feedback">
                  <!-- Menampilkan pesan error -->
                  <?php $__errorArgs = ['nama_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <?php echo e($message); ?>

                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                  <!-- Menampilkan pesan error untuk input lainnya -->
                </span>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
              <a href="<?php echo e(isset($detail) ? route('profil.edit', $detail->id) : route('profil.create')); ?>" class="btn btn-secondary"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
          </form>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ppdb-master\resources\views/admin/profil/create.blade.php ENDPATH**/ ?>