<div class="modal fade" id="createModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Admin qo`shish</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo e(route('superadmin.high.school.admin.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('post'); ?>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Ism</label> <label class="error"><?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></label>
                  <input type="text" value="<?php echo e(old('first_name')); ?>" class="form-control" name="first_name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Familiya</label> <label class="error"><?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></label>
                  <input type="text" value="<?php echo e(old('last_name')); ?>" class="form-control" name="last_name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Otasining ismi</label> <label class="error"><?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></label>
                  <input type="text" value="<?php echo e(old('middle_name')); ?>" class="form-control" name="middle_name">
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label><i class="fa fa-phone"></i> Telefon raqami</label> <label class="error"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></label>
                  <input type="text" value="<?php echo e(old('email')); ?>" class=" phn form-control" name="email">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label><i class="fa fa-key"></i> Parol</label> <label class="error"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></label>
                  <input type="password"  class="form-control" name="password" autocomplete="false">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label> <i class="fa fa-retweet"></i> Parolni takrorlang</label> <label class="error"><?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></label>
                  <input type="password"  class="form-control" name="password_confirmation">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>
                    <i class="fa fa-user"></i>
                    Vazifasi
                  </label>
                  <select class="form-control" style="display: block !important;" name="high_school_id">
                      <?php $__currentLoopData = $high_schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option style="padding: 5px;" value="<?php echo e($item->id); ?>"><?php echo e($item->name_uz); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-success">Saqlash</button>
              </div>
            </div>
          </form>
        </div>

        <!-- Modal footer -->
 

      </div>
    </div>
  </div>
<?php /**PATH D:\myProject\OSPanel\domains\qabul_tsul\resources\views/superadmin/pages/high_school_admin/create.blade.php ENDPATH**/ ?>