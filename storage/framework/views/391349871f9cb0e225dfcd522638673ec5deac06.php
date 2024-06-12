<div class="modal fade" id="new_password<?php echo e($item->id); ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Admin parol almashtirish</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo e(route('high_school_admin.new.password' , ['id' => $item->id])); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label><i class="fa fa-key"></i> Parol</label> <label class="error"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></label>
                  <input type="password"  class="form-control" name="password">
                </div>
              </div>
              <div class="col-md-6">
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
<?php /**PATH /home/tsul/domains/qabul2023-texnikum.tsul.uz/public_html/resources/views/superadmin/pages/high_school_admin/new_password.blade.php ENDPATH**/ ?>