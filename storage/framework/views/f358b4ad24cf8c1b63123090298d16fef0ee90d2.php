
<?php if(Auth::user()->role == 0): ?>
	<li>
		<a href="<?php echo e(route('petition.create')); ?>"><img src="<?php echo e(asset('newdesign/img/list.png')); ?>" alt=""><?php echo app('translator')->get('menu.Registration'); ?></a>
	</li>
	<li>
		<a href="<?php echo e(route('petition.status')); ?>"><img src="<?php echo e(asset('newdesign/img/soroq.png')); ?>" alt=""><?php echo app('translator')->get('menu.Application status'); ?></a>
	</li>
<?php endif; ?><?php /**PATH /home/tsul/domains/qabul2023-texnikum.tsul.uz/public_html/resources/views/admin/includes/menu_new.blade.php ENDPATH**/ ?>