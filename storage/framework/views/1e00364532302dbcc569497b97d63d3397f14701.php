
<?php $__env->startSection('style'); ?>
<style type="text/css">
    ul{
        list-style-type: none;
    }
    hr{
        margin: 0px !important;
    }
</style>
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
                    <style>
                        table tbody td{
                            font-size: 13px !important;
                            padding: 8px !important;
                        }

                    </style>
        	<?php echo $__env->make('superadmin.pages.datas.faculty.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

               	</div>
                <div class="back_div">
                    <div>
                        <div class="tab_content">
                            <aside class="active">
                                <table id="myTable1" class="tb">
                                    <thead>
                                        <th>Uz</th>
        					<th>En</th>
        					<th>RU</th>
        					<th>Talim tashkiloti</th>
                            <th>Talim turlari</th>
                            <th>Talim tillari</th>
        					<th style="width: 1px;"></th>
                            
                            <th style="width: 1px;"></th>
                                    </thead>
                                    <tbody>
                                    	<?php $i=1; ?>
        				<?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td ><?php echo e($item->name_uz); ?></td>
                            <td ><?php echo e($item->name_en); ?></td>
                            <td ><?php echo e($item->name_ru); ?></td>
                            <td ><?php if($item->high_school): ?> <?php echo e($item->high_school->name_uz); ?> <?php endif; ?></td>
                            <td>
                                <ul>
                                    <?php $tt = count($item->getEduTypes()); $i = 0;?>
                                    <?php $__currentLoopData = $item->getEduTypes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etyp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <?php echo e($etyp->$name_l); ?>

                                    </li>
                                    <?php if(++$i != $tt): ?>
                                    <hr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <?php $tt = count($item->getLangTypes()); $i = 0;?>
                                    <?php $__currentLoopData = $item->getLangTypes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ltyp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <?php echo e($ltyp->$name_l); ?>

                                    </li>
                                     <?php if(++$i != $tt): ?>
                                    <hr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </td>

                            <td class="text-left">
                                
                                <button class="btn btn-default"  data-toggle="modal" data-target="#edit_modal<?php echo e($item->id); ?>"><i class="fa fa-edit"></i></button>
                                <?php echo $__env->make('superadmin.pages.datas.faculty.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            </td>

                            
                            <td style="padding: 0px !important; width: 1px !important;">
                                <input type="checkbox" data-id="<?php echo e($item->id); ?>" class="faculty_switcher" <?php if($item->status == 1): ?> checked <?php endif; ?> data-toggle="toggle">
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
$('.faculty_switcher').change(function(){
    var value = 1;
    if($(this).is(':checked')){
        value = 1;
    }
    else{
        value = 0;
    }
    var id = $(this).attr('data-id');
    var tt = confirm('Fakultet holatini o`zgartirasizmi ?');
    if(tt){
        var url = '/change-faculty-status/'+id+'/'+value;
        window.location.href = url;
    }
    else{
        if(value == 0){
            var $this = $(this);
            var state = $this.prop('checked');
            //on error
            $this.prop('checked', !state).bootstrapToggle('destroy').bootstrapToggle();
        }
        if(value == 1){
            var $this = $(this);
            var state = $this.prop('checked');
            //on error
            $this.prop('checked', !state).bootstrapToggle('destroy').bootstrapToggle();

        }
    }
});
$(document).ready(function(){
    $('#myTable1').DataTable();

});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tsul/domains/qabul2023-texnikum.tsul.uz/public_html/resources/views/superadmin/pages/datas/faculty/index.blade.php ENDPATH**/ ?>