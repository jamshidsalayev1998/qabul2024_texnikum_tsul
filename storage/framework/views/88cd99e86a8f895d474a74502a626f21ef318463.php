
<?php $__env->startSection('content'); ?>
  <?php

  date_default_timezone_set('Asia/Tashkent');
  $date = date('Y-m-d h:i:s', time());
  $date1 = strtotime($date);
  $dd =  DB::table('date_admission as d')->select('d.date_end')->where('status' , 1)->first();
  $date2 = strtotime($dd->date_end);
  $diff = abs($date2 - $date1);
  $years = floor($diff / (365*60*60*24));
  $months = floor(($diff - $years * 365*60*60*24)/ (30*60*60*24));
  $days = floor(($diff - $years * 365*60*60*24 -  $months*30*60*60*24)/ (60*60*24));
  $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
  $minutes = floor(($diff - $years * 365*60*60*24  - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
  $seconds = floor(($diff - $years * 365*60*60*24   - $months*30*60*60*24 - $days*60*60*24  - $hours*60*60 - $minutes*60));


   ?>
    <div class="all_login">

        <div class="login_modal">
             
            <div class="bg-white">
                <div class="row ">

                    <div class="col-md-6 mob_img">
                        <div class="img">
                            <img src="<?php echo e(asset('newadmin/img/edu_login.jpg')); ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="logo">
                            <img style="max-width: 130px; height: auto" src="<?php echo e(asset('newadmin/img/tsul_logo.png')); ?>" alt="">

                        </div>
                        <div class="logo">
                            <?php if(App::getLocale() == 'uz'): ?>
                                Parol <?php echo e(Auth::user()->email); ?> raqamiga jo`natildi
                                <?php endif; ?>
                                <?php if(App::getLocale() == 'en'): ?>
                                Password send to  <?php echo e(Auth::user()->email); ?>

                                <?php endif; ?>
                                <?php if(App::getLocale() == 'ru'): ?>
                                Пароль отправить на  <?php echo e(Auth::user()->email); ?>

                                <?php endif; ?>
                        </div>

                        <div class="form_out">
                            <div class="form_all">
                                <div class="language">
                                    <div class="lankalla">
                                        <div  class="" id="dd">
                                            <span class="iii">
                                                <i class="fa fa-angle-down"></i>
                                            </span>
                                            <span class="holder"><?php echo app('translator')->get('other.'.App::getLocale()); ?> </span>
                                            <ul class="dropdown">
                                                <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>  <a   hreflang="<?php echo e($localeCode); ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>" class="dropdown-item dropdown-footer"><?php echo e($properties['native']); ?></a></li>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            	<form class="form_login" method="POST" action="<?php echo e(route('check_phone_code')); ?>">
                                <?php echo csrf_field(); ?>
	                                <div class="item_form">
	                                    <h3><?php echo app('translator')->get('login.Password'); ?></h3>
	                                    <input value="<?php echo e(old('code')); ?>" autocomplete="code"  type="password" name="code">
                                       <i  class="fa fa-eye eye"></i>
                                        <i class="fa fa-eye-slash eye_slash" aria-hidden="true"></i>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error">!<?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <?php if(session('error_code')): ?> <span class="error">!<?php echo e(session('error_code')); ?></span> <?php endif; ?>
	                                </div>

	                            </form>
                                 <button class="login"><?php echo app('translator')->get('login.Login'); ?></button>
                                <button class="sign"><?php echo app('translator')->get('login.Logout'); ?></button>
                                <div class="addm">
                                    <h6>ADMISSION 2021</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="lg_form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    	$('.login').click(function(){
    		$('.form_login').submit();
    	});
    	$('.sign').click(function(){
    		$('#lg_form').submit();
    	});
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.login_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\myProject\OSPanel\domains\qabul_tsul\resources\views/user/pages/phone/check_code.blade.php ENDPATH**/ ?>