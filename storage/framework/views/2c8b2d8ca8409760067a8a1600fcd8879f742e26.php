
<?php $__env->startSection('content'); ?>
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
                        <div style="display: flex; justify-content: flex-end; padding: 5px; color: #39B8D3">
                          <i  class="fa fa-question-circle" aria-hidden="true"></i>
                        </div>
                        <div class="logo">
                            <img style="max-width: 130px; height: auto" src="<?php echo e(asset('newadmin/img/tsul_logo.png')); ?>" alt="">
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
                            	<form class="form_login" method="POST" action="<?php echo e(route('register')); ?>">
									<?php echo csrf_field(); ?>
	                                <div class="item_form">
	                                    <h3><?php echo app('translator')->get('login.Telefon raqam'); ?></h3>
	                                    <input name="email" class="phn" value="<?php echo e(old('email')); ?>" placeholder="+998_________" type="text">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error">!<?php echo e($message); ?> <?php if(session('error')): ?> <?php echo e(session('error')); ?> <?php endif; ?> </span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
	                                </div>

	                            </form>
                                 <button class="login"><?php echo app('translator')->get('login.Sign up'); ?></button>
                                <button class="sign"><?php echo app('translator')->get('login.Sign in'); ?></button>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    	$('.login').click(function(){
    		$('.form_login').submit();
    	});
    	$('.sign').click(function(){
    		window.location.href = ' <?php echo e(route('login')); ?> ';
    	});
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.login_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tsul/domains/qabul2023-texnikum.tsul.uz/public_html/resources/views/auth/register.blade.php ENDPATH**/ ?>