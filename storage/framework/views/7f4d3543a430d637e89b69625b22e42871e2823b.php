<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <!-- Font Awesome -->
  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(asset('newadmin/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo e(asset('newadmin/css/mdb.min.css')); ?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?php echo e(asset('newadmin/css/style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('newdesign/css/style.css')); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo e(asset('newdesign/css/media.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('newadmin/css/media.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('newadmin/css/font-awesome.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('newadmin/css/owl.carousel.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('newadmin/css/datatables.min.css')); ?>">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <?php echo $__env->yieldContent('style'); ?>
</head>
<body>



    <div class="fixn"></div>



    <div class="all_page">
        <nav class="nav_nav">
            <div class="log">
                <div class="nomer">
                    <span>
                        <i class="fa fa-user"></i>
                    </span>
                    <h2><?php echo e(Auth::user()->email); ?></h2>
                </div>


                <span class="close_nav"><i class="fa fa-close"></i></span>
            </div>

        </nav>
        <div class="right_content right_nav">

           <header>
    <span class="left">

      <div class="content_bars none_bars">
        <div class="top">
          <h2> <?php echo e(Auth::user()->email); ?></h2>
        </div>
        <div class="bottom">
          <ul>
            <?php echo $__env->make('admin.includes.menu_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </ul>
        </div>
      </div>
    </span>
    <h1>

    </h1>
    <div class="header_right">
      <div class="lan">
                            <div  class="" id="dd">
                                <span class="iii">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                                <span class="holder">  <?php echo app('translator')->get('other.'.App::getLocale()); ?> </span>
                                <ul class="dropdown">
                                   <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>  <a   hreflang="<?php echo e($localeCode); ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>" class="dropdown-item dropdown-footer"><?php echo e($properties['native']); ?></a></li>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </div>
                        </div>
      <div class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <b><?php echo app('translator')->get('other.LOG OUT'); ?></b>
        <span><img src="<?php echo e(asset('newdesign/img/logout.png')); ?>" alt=""></span>
      </div>
      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
    </div>
  </header>
           <div class="site_all_content">
            <?php echo $__env->yieldContent('content'); ?>
           </div>
        </div>
    </div>

    <!-- SCRIPTS -->

	<!-- JQuery -->
	<script type="text/javascript" src="<?php echo e(asset('newadmin/js/jquery-3.3.1.min.js')); ?>"></script>
  <!-- Bootstrap tooltips -->
  <script src="<?php echo e(asset('newadmin/js/datatables.min.js')); ?>"></script>
  <script src="<?php echo e(asset('newadmin/js/dataTables.checkboxes.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('newadmin/js/popper.min.js')); ?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo e(asset('newadmin/js/bootstrap.min.js')); ?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo e(asset('newadmin/js/mdb.min.js')); ?>"></script>
  <script type="text/javascript" src = "<?php echo e(asset('newadmin/js/owl.carousel.min.js')); ?>"></script>
  <script type="text/javascript" src = "<?php echo e(asset('newadmin/js/main.js')); ?>"></script>

  <?php echo $__env->yieldContent('js'); ?>

</body>
</html>
<?php /**PATH D:\myProject\OSPanel\domains\qabul_tsul_texnikum\resources\views/admin/layouts/for_user_show.blade.php ENDPATH**/ ?>