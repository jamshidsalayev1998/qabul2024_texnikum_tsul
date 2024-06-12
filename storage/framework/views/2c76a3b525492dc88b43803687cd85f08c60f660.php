
<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="endi_done">
<?php $locale = App::getLocale(); $name_l = 'name_'.$locale; ?>

                <div class="test_done"></div>
                <div class="applicants" style="background-color: transparent !important;">
                	<div class="row">
                		<a href="#" class="btn btn-default" data-toggle="modal" data-target="#create_modal" style="color: white !important;"> <i class="fa fa-plus"></i> Qo`shish </a>
                		<?php if(session('success')): ?>

		                    <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">

		                        <div class="alert-icon">

		                            <span class="icon-checkmark-circle"></span>

		                        </div>

		                        <?php echo e(session('success')); ?>


		                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

		                    </div>

		                <?php endif; ?>
		                <?php if(session('error')): ?>

		                    <div class="alert alert-danger alert-icon-block alert-dismissible" role="alert">

		                        <div class="alert-icon">

		                            <span class="icon-checkmark-circle"></span>

		                        </div>

		                        <?php echo e(session('error')); ?>


		                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

		                    </div>

		                <?php endif; ?>
                	</div>
        	<?php echo $__env->make('superadmin.pages.datas.edutype.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

               	</div>
                <div class="back_div">
                    <div>
                        <div class="tab_content">
                            <aside class="active">
                                <table id="myTable1" class="tb">
                                    <thead>
                                        <th style="width: 1px;">#</th>
        					<th>Uz</th>
        					<th>En</th>
        					<th>RU</th>
        					<th style="width: 1px;"></th>
                            <th style="width: 1px;"></th>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; ?>
        				<?php $__currentLoopData = $edutypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i); ?><?php $i++; ?></td>
                            <td><?php echo e($item->name_uz); ?></td>
                            <td ><?php echo e($item->name_en); ?></td>
                            <td ><?php echo e($item->name_ru); ?></td>
                            
                            <td class="text-left">
                                <button class="btn btn-default"  data-toggle="modal" data-target="#edit_modal<?php echo e($item->id); ?>"><i class="fa fa-edit"></i></button>
                                <?php echo $__env->make('superadmin.pages.datas.edutype.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                
                            </td>
                            
                            <td>
                                <form action="<?php echo e(route('edutype.delete' , ['id' => $item->id])); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button class="btn btn-danger" onclick="return confirm('Ma`lumotni o`chirasizmi')"> <i class="fa fa-trash"></i> </button>
                                    
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
<?php echo $__env->make('admin.layouts.master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tsul/domains/qabul2023-texnikum.tsul.uz/public_html/resources/views/superadmin/pages/datas/edutype/index.blade.php ENDPATH**/ ?>