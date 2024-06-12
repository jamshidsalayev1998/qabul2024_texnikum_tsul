<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="endi_done">
        <?php $locale = App::getLocale(); $name_l = 'name_'.$locale; ?>

        <div class="test_done"></div>
        <div class="applicants" style="background-color: transparent !important;">
            <div class="row">
                <a href="#" class="btn btn-default" data-toggle="modal" data-target="#createModal"
                   style="color: white !important;"> <i class="fa fa-plus"></i> Qo`shish </a>
                <?php if(session('success')): ?>

                    <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">

                        <div class="alert-icon">

                            <span class="icon-checkmark-circle"></span>

                        </div>

                        <?php echo e(session('success')); ?>


                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                class="fa fa-times"></span></button>

                    </div>

                <?php endif; ?>
                <?php if(session('error')): ?>

                    <div class="alert alert-danger alert-icon-block alert-dismissible" role="alert">

                        <div class="alert-icon">

                            <span class="icon-checkmark-circle"></span>

                        </div>

                        <?php echo e(session('error')); ?>


                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                class="fa fa-times"></span></button>

                    </div>

                <?php endif; ?>
            </div>
            <?php echo $__env->make('superadmin.pages.high_school_admin.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
        <div class="back_div">
            <div>
                <div class="tab_content">
                    <aside class="active">
                        <table id="myTable1" class="tb">
                            <thead>
                            <th>#</th>
                            <th>F.I.O</th>
                            <th>Tashkiloti</th>
                            <th></th>
                            <th></th>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="width: 1px;"><?php echo e($i); ?><?php $i++; ?></td>
                                    <td>
                                        <?php echo e($item->fio()); ?>

                                    </td>
                                    <td>
                                        <?php if($item->high_school): ?>
                                            <?php echo e($item->high_school->name_uz); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center" style="width: 1px;">
                                        <a class="btn btn-default" data-toggle="modal"
                                           data-target="#new_password<?php echo e($item->id); ?>"><i class="fa fa-key"></i></a>
                                        <?php echo $__env->make('superadmin.pages.high_school_admin.new_password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    </td>

                                    <td class="text-center" style="width: 1px;">
                                        <form action="<?php echo e(route('high_school_admin.delete' , ['id' => $item->id])); ?>"
                                              method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <button class="btn btn-danger"
                                                    onclick="return confirm('Ma`lumotni o`chirasizmi')"><i
                                                    class="fa fa-trash"></i></button>

                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </aside>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        $('#myTable1').DataTable();

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tsul/domains/qabul2023-texnikum.tsul.uz/public_html/resources/views/superadmin/pages/high_school_admin/index.blade.php ENDPATH**/ ?>