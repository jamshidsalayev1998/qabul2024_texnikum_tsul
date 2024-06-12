<?php if(Auth::user()->role == 3): ?>
    <a href="<?php echo e(route('admin.index')); ?>" class="<?php if(url()->current() == route('admin.index')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-graduation-cap"></i>
        <?php echo app('translator')->get('menu.Applications'); ?>
    </a>
    
    
    
    

    <a href="<?php echo e(route('admin.messages')); ?>" class="<?php if(url()->current() == route('admin.messages')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-envelope"></i>
        <?php echo app('translator')->get('menu.Messages'); ?>
    </a>
    <a href="<?php echo e(route('admins.index')); ?>" class="<?php if(url()->current() == route('admins.index')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-users" aria-hidden="true"></i>
        <?php echo app('translator')->get('menu.Admins'); ?>
    </a>
    <a href="<?php echo e(route('superadmin.high.school.admin.index')); ?>"
       class="<?php if(url()->current() == route('superadmin.high.school.admin.index')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-users" aria-hidden="true"></i>
        <?php echo app('translator')->get('menu.Tashkilot adminlari'); ?>
    </a>
    <a href="<?php echo e(route('superadmin.countries')); ?>"
       class="<?php if(url()->current() == route('superadmin.countries')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-globe" aria-hidden="true"></i>
        <?php echo app('translator')->get('menu.Countries'); ?>
    </a>
    <a href="<?php echo e(route('superadmin.regions')); ?>"
       class="<?php if(url()->current() == route('superadmin.regions')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-map-pin" aria-hidden="true"></i>
        <?php echo app('translator')->get('menu.Regions'); ?>
    </a>
    <a href="<?php echo e(route('superadmin.areas')); ?>"
       class="<?php if(url()->current() == route('superadmin.areas')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <?php echo app('translator')->get('menu.Areas'); ?>
    </a>
    <a href="<?php echo e(route('superadmin.faculties')); ?>"
       class="<?php if(url()->current() == route('superadmin.faculties')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-tasks" aria-hidden="true"></i>
        <?php echo app('translator')->get('menu.Faculties'); ?>
    </a>
    <a href="<?php echo e(route('superadmin.edutypes')); ?>"
       class="<?php if(url()->current() == route('superadmin.edutypes')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-university"></i>
        <?php echo app('translator')->get('menu.Edu types'); ?>
    </a>
    <a href="<?php echo e(route('superadmin.langtypes')); ?>"
       class="<?php if(url()->current() == route('superadmin.langtypes')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-language" aria-hidden="true"></i>
        <?php echo app('translator')->get('menu.Language types'); ?>
    </a>
    <a href="<?php echo e(route('superadmin.high_schools')); ?>"
       class="<?php if(url()->current() == route('superadmin.langtypes')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-language" aria-hidden="true"></i>
        <?php echo app('translator')->get('menu.Talim tashkilotlari'); ?>
    </a>
    <?php
        $high_schools = 'App\HighSchool'::all();
    ?>
    <?php $__currentLoopData = $high_schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $high_school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('admin.statistics_by_high_schools' , ['id' => $high_school->id])); ?>" class="">
            <i class="fa fa-pie-chart"></i>
            <?php echo app('translator')->get('menu.Statistika '.$high_school->short_name); ?>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>

<?php if(Auth::user()->role == 2): ?>

    <span class="title_menu">
                    <b><?php echo app('translator')->get('menu.Applications menu'); ?></b>
                </span>
    <a href="<?php echo e(route('admin.index')); ?>" class="<?php if(url()->current() == route('admin.index')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-graduation-cap"></i>
        <?php echo app('translator')->get('menu.Applications'); ?>
    </a>
    <span class="title_menu">
                <b><?php echo app('translator')->get('menu.Additional options'); ?></b>
                </span>
    <a href="<?php echo e(route('admin.statistics')); ?>"
       class="<?php if(url()->current() == route('admin.statistics')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-pie-chart"></i>
        <?php echo app('translator')->get('menu.Statistics'); ?>
    </a>
    <a href="<?php echo e(route('admin.messages')); ?>" class="<?php if(url()->current() == route('admin.messages')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-envelope"></i>
        <?php echo app('translator')->get('menu.Messages'); ?>
    </a>

<?php endif; ?>


<?php if(Auth::user()->role == 1): ?>

    <span class="title_menu">
                    <b><?php echo app('translator')->get('menu.Applications menu'); ?></b>
                </span>
    <a href="<?php echo e(route('admin.index')); ?>" class="<?php if(url()->current() == route('admin.index')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-graduation-cap"></i>
        <?php echo app('translator')->get('menu.Applications'); ?>
    </a>
    <span class="title_menu">
                <b><?php echo app('translator')->get('menu.Additional options'); ?></b>
                </span>
    <a href="<?php echo e(route('admin.statistics')); ?>"
       class="<?php if(url()->current() == route('admin.statistics')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-pie-chart"></i>
        <?php echo app('translator')->get('menu.Statistics'); ?>
    </a>
    

<?php endif; ?>
<?php if(Auth::user()->role == 4): ?>
    <a href="<?php echo e(route('admin.index')); ?>" class="<?php if(url()->current() == route('admin.index')): ?> menu_active <?php endif; ?>">
        <i class="fa fa-graduation-cap"></i>
        <?php echo app('translator')->get('menu.Applications'); ?>
    </a>
    <?php
    $admin = \App\HighSchoolAdmin::where('user_id' , \Illuminate\Support\Facades\Auth::user()->id)->first();
        $high_schools = 'App\HighSchool'::where('id' , $admin->high_school_id)->get();
    ?>
    <?php $__currentLoopData = $high_schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $high_school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('admin.statistics_by_high_schools' , ['id' => $high_school->id])); ?>" class="">
            <i class="fa fa-pie-chart"></i>
            <?php echo app('translator')->get('menu.Statistika '.$high_school->short_name); ?>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /home/tsul/domains/qabul2023-texnikum.tsul.uz/public_html/resources/views/admin/includes/menu_admin.blade.php ENDPATH**/ ?>