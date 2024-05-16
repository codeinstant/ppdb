<?php $__env->startSection('title','Tambah jawaban'); ?>
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
        <form role="form" action="<?php echo e(route('jawaban.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="card-body">
              <div class="form-group col-md-6">
                  <label for="">Soal</label>
                  <select
                      class="form-control select2bs4 <?php $__errorArgs = ['soal_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                      style="width: 100%;" name="soal_id">
                      <option selected="selected" disabled>Soal</option>
                      <?php $__currentLoopData = $soal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($sek->id); ?>"
                          <?php echo e(old('soal_id') == $sek->id ? 'selected' : ''); ?>>
                          <?php echo e($sek->soal); ?>

                      </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['soal_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="invalid-feedback">
                      <?php echo e($message); ?>

                  </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="form-group">
                <label for="roles">Jawaban</label>
                <textarea class="form-control col-lg-6 <?php $__errorArgs = ['jawaban'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="jawaban" ><?php echo e(old('jawaban')); ?></textarea>
                <span class="invalid-feedback">
                    <?php $__errorArgs = ['jawaban'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </span>
              </div>
              <div class="form-group">
                  <label for="kc">Kunci</label>
                  <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="kunci"
                          class="custom-control-input" value="benar" required
                          <?php if(old('kunci')): ?> checked <?php endif; ?>>
                      <label class="custom-control-label" for="customRadio1">benar</label>
                  </div>
                  <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="kunci"
                          class="custom-control-input" value="salah" <?php if(old('kunci')): ?>
                          checked <?php endif; ?>>
                      <label class="custom-control-label" for="customRadio2">salah</label>
                  </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
              <a href="<?php echo e(route('jawaban.index')); ?>" class="btn btn-secondary"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
          </form>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pmain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ppdb-master\resources\views/panitia/jawaban/create.blade.php ENDPATH**/ ?>