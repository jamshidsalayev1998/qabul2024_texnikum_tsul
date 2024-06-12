<form action="<?php echo e(route('faculty.update' , ['id' => $item->id])); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('put'); ?>

    <div class="modal fade" id="edit_modal<?php echo e($item->id); ?>">
        <div class="modal-dialog modal-lg" style="max-width: 1200px !important;">

            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Fakultet o`zgartirish</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="form-group">
                                    <label>Uz</label>
                                    <input type="text" class="form-control" value="<?php echo e($item->name_uz); ?>" name="name_uz"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="form-group">
                                    <label>En</label>
                                    <input value="<?php echo e($item->name_en); ?>" type="text" class="form-control" name="name_en"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="form-group">
                                    <label>ru</label>
                                    <input type="text" value="<?php echo e($item->name_ru); ?>" class="form-control" name="name_ru"
                                           required>
                                </div>
                            </div>
                            <?php $high_schools = 'App\HighSchool'::all(); ?>
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="form-group">
                                    <label for="">Talim tashkiloti</label>
                                    <select name="high_school_id" style="display: block !important;" id=""
                                            class="form-control">
                                        <?php $__currentLoopData = $high_schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($item->high_school_id == $hg->id): ?> selected="true" <?php endif; ?> value="<?php echo e($hg->id); ?>"><?php echo e($hg->name_uz); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php $edutypes = 'App\Edutype'::all();$type_e = 'App\FacultyTypeEdu'::where('faculty_id' , $item->id)->pluck('type_education_id')->toArray(); ?>
                        <div class="col-md-3 pt-3">


                            <?php $i = 0; ?>
                            <?php $__currentLoopData = $edutypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div style="display: flex;">
                                    <input <?php if(in_array($t->id, $type_e)): ?> checked <?php endif; ?> type="checkbox"
                                           style="opacity: 1 !important; position: relative !important; pointer-events: painted;"
                                           class="w-25 float-left" name="edutype[<?php echo e($i); ?>]" value="<?php echo e($t->id); ?>">
                                    <h5 style="margin-bottom: 0 !important;"><?php echo e($t->$name_l); ?></h5>
                                </div>
                                <?php $i++; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>
                        <?php $langtype = 'App\Languagetype'::all(); $type_l = 'App\FacultyTypeLang'::where('faculty_id' , $item->id)->pluck('type_language_id')->toArray(); ?>
                        <div class="col-md-3 pt-3">


                            <?php $i = 0; ?>
                            <?php $__currentLoopData = $langtype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div style="display: flex;">
                                    <input <?php if(in_array($t->id, $type_l)): ?> checked <?php endif; ?> type="checkbox"
                                           style="opacity: 1 !important; position: relative !important; pointer-events: painted;"
                                           class="w-25 float-left" name="langtype[<?php echo e($i); ?>]" value="<?php echo e($t->id); ?>">
                                    <h5 style="margin-bottom: 0 !important;"><?php echo e($t->$name_l); ?></h5>
                                </div>
                                <?php $i++; ?>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Saqlash</button>
                </div>

            </div>
        </div>
    </div>
</form>
<?php /**PATH D:\myProject\OSPanel\domains\qabul_tsul_texnikum\resources\views/superadmin/pages/datas/faculty/edit.blade.php ENDPATH**/ ?>