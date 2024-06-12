<form action="<?php echo e(route('region.store')); ?>" method="post">
  <?php echo csrf_field(); ?>
  <?php echo method_field('post'); ?>
<div class="modal fade" id="create_modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Viloyat qo`shish</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->

        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-8 ml-auto mr-auto">
                <div class="form-group">
                  <label><?php echo app('translator')->get('petition.Country'); ?></label>
                  <?php $countries = 'App\Country'::where('status' , 1)->get(); ?>
                  <select class="form-control select2" style="display: block !important;" name="country_id">
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($region->id); ?>"><?php echo e($region->$name_l); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
              <div class="col-md-8 ml-auto mr-auto">
                <div class="form-group">
                  <label>Uz</label>
                  <input type="text" class="form-control" name="name_uz" required>
                </div>
              </div>
              <div class="col-md-8 ml-auto mr-auto">
                <div class="form-group">
                  <label>En</label>
                  <input type="text" class="form-control" name="name_en" required>
                </div>
              </div>
              <div class="col-md-8 ml-auto mr-auto">
                <div class="form-group">
                  <label>Uz</label>
                  <input type="text" class="form-control" name="name_ru" required>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" >Saqlash</button>
        </div>
        
      </div>
    </div>
  </div>
</form><?php /**PATH D:\myProject\OSPanel\domains\qabul_tsul\resources\views/superadmin/pages/datas/region/create.blade.php ENDPATH**/ ?>