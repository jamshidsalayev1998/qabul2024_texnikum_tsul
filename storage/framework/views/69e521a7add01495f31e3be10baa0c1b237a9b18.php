<?php $__env->startSection('content'); ?>
    <style>
        .hidden_document {
            display: none;
        }
    </style>
    <?php   $locale = App::getLocale(); $name_l = 'name_'.$locale;?>

    <div class="container pt-5">
        
        
        
        
        
        
        
        

        <form method="post" action="<?php echo e(route('petition.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form_one">
                <div class="top">
                    <b><?php echo app('translator')->get('other.PERSONAL INFORMATION'); ?></b>
                </div>
                <div class="row">
                    <div class="col-md-6 bor_right">
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.First name'); ?> <span class="color-red">*</span> <b
                                    id="first_name_error"><?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <input required="tt" id="first_name" type="text" name="first_name" class="latyn"
                                   value="<?php echo e(old('first_name')); ?>" placeholder="<?php echo app('translator')->get('petition.Example - Azizbek'); ?>">
                        </div>

                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Last name'); ?> <span class="color-red">*</span> <b
                                    id="last_name_error"><?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <input type="text" id="lastname" required="tt" class="latyn" name="last_name"
                                   value="<?php echo e(old('last_name')); ?>" placeholder="<?php echo app('translator')->get('petition.Example - Ismoilov'); ?>">
                        </div>

                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Father`s name'); ?> <span class="color-red">*</span> <b
                                    id="middle_name_error"><?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <input required="tt" id="middle_name" type="text" class="latyn" name="middle_name"
                                   value="<?php echo e(old('middle_name')); ?>"
                                   placeholder="<?php echo app('translator')->get('petition.Example - Alisher o`g`li'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Gender'); ?> <span class="color-red">*</span> <b></b></h2>
                            <div class="all_radio ">
                                <div class="radio male">
                                    <input type="radio" name="gender" <?php if(!old('gender') || old('gender') == 1): ?> checked
                                           <?php endif; ?>  value="1"><b class="male"><?php echo app('translator')->get('petition.Male'); ?></b>
                                </div>
                                <div class="radio female">
                                    <input type="radio" name="gender" <?php if(old('gender') == 0): ?> checked=""
                                           <?php endif; ?> value="0"><b class="female"><?php echo app('translator')->get('petition.Female'); ?></b>
                                </div>
                            </div>
                        </div>

                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Date of birth'); ?> <span class="color-red">*</span> <b
                                    id="birth_date_error"><?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <div class="date_input">
        								<span>
        									<img src="<?php echo e(asset('newdesign/img/icondate.png')); ?>" alt="">
        								</span>
                                <input type="date" required="tt" id="birth_date" name="birth_date"
                                       value="<?php echo e(old('birth_date')); ?>">
                            </div>
                        </div>
                    </div>





















                </div>
            </div>















































































            <div class="form_one">
                <div class="top">
                    <b><?php echo app('translator')->get('petition.Passport Information'); ?></b>
                </div>
                <div class="row">
                    <div class="col-md-6 bor_right">
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Passport seria and number'); ?> <span class="color-red">*</span>
                                <b><?php $__errorArgs = ['passport_seria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <input type="text" onkeydown="this.value = this.value.toUpperCase();" name="passport_seria"
                                   value="<?php echo e(old('passport_seria')); ?>"
                                   placeholder="<?php echo app('translator')->get('petition.Example - AA1234567'); ?>" id="passport_seria">
                        </div>
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Passport berilgan joy'); ?> <span class="color-red">*</span>
                                <b><?php $__errorArgs = ['passport_given_place'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <input type="text" onkeydown="this.value = this.value.toUpperCase();"
                                   name="passport_given_place"
                                   value="<?php echo e(old('passport_given_place')); ?>"
                                   placeholder="" id="passport_given_place">
                        </div>
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Upload passport copy (Upload only the main page)'); ?> <span
                                    class="color-red">*</span>
                                <b><?php $__errorArgs = ['passport_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <div class="chose_file upload-button2">
                                <b><?php echo app('translator')->get('petition.Choose file'); ?></b>
                            </div>
                            <input type="file" class="file-upload2" hidden id="image_pass"
                                   accept="image/x-png,image/jpeg,application/pdf" name="passport_image">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="img_all">
                            <div class="big_img">
                                <iframe id="iframePdf" style="display: block; width: 100%; height: auto" src=""
                                        class="profile-pic2-pdf" src=""></iframe>
                                <img src="" class="profile-pic2" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form_one">
                <div class="top">
                    <b><?php echo app('translator')->get('petition.Contact Information'); ?></b>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Telefon raqam'); ?> <span class="color-red">*</span>
                                <b><?php $__errorArgs = ['mobile_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <input type="text" class="phone_mask" disabled value="<?php echo e(Auth::user()->email); ?>">
                        </div>
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Qoshimcha telefon raqam'); ?> <b><?php $__errorArgs = ['home_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <input type="text" class="phone_mask" name="home_phone" value="<?php echo e(old('home_phone')); ?>">
                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Father`s phone number'); ?> <b><?php $__errorArgs = ['father_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <input type="text" class="phone_mask" name="father_phone" value="<?php echo e(old('father_phone')); ?>">
                        </div>

                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Mother`s phone number'); ?> <b><?php $__errorArgs = ['mother_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <input type="text" class="phone_mask" name="mother_phone" value="<?php echo e(old('mother_phone')); ?>">
                        </div>

                    </div>
                </div>
            </div>


            <div class="form_one">
                <div class="top">
                    <b><?php echo app('translator')->get('petition.High School (College Information)'); ?></b>
                </div>
                <div class="row">
                    <div class="col-md-6 bor_right">
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Name of school or number'); ?> <span class="color-red">*</span>
                                <b><?php $__errorArgs = ['school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <input type="text" class="latyn_address" name="school" value="<?php echo e(old('school')); ?>">
                        </div>

                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Type school'); ?> <span class="color-red">*</span> <b><?php $__errorArgs = ['type_school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b>
                            </h2>
                            <select class="form-control" name="type_school">
                                <?php $__currentLoopData = $typeschool; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(old('type_school') == $item->id): ?> selected
                                            <?php endif; ?> value="<?php echo e($item->id); ?>"><?php echo e($item->$name_l); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Select graduation date'); ?> <span class="color-red">*</span>
                                <b><?php $__errorArgs = ['graduation_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <select class="form-control" name="graduation_date">
                                <?php for($i = date('Y'); $i > date('Y')-2 ; $i--): ?>
                                    <option <?php if(old('graduation_date') == $i): ?> selected
                                            <?php endif; ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                <?php endfor; ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Diploma number'); ?> <span class="color-red">*</span>
                                <b><?php $__errorArgs = ['diplom_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <input type="text" class="latyn_address" name="diplom_number"
                                   value="<?php echo e(old('diplom_number')); ?>"
                                   placeholder="<?php echo app('translator')->get('petition.Example - K1234567'); ?>">
                        </div>










                    </div>


                    <div class="col-md-3">
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Upload Diploma (Upload only diploma)'); ?> <span class="color-red">*</span>
                                <b><?php $__errorArgs = ['diplom_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <div class="chose_file upload-button3">
                                <b><?php echo app('translator')->get('petition.Choose file'); ?></b>
                            </div>
                            <input type="file" class="file-upload3" hidden id="image_dip"
                                   accept="image/x-png,image/jpeg,application/pdf" name="diplom_image">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="big_img2">
                            <img src="" class="profile-pic3" alt="">
                            <iframe id="iframePdf" style="display: block; width: 100%; height: auto" src=""
                                    class="profile-pic3-pdf" src=""></iframe>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Upload Diploma application (Upload only diploma application)'); ?> <span
                                    class="color-red">*</span> <b><?php $__errorArgs = ['diplom_image_app'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <div class="chose_file upload-button6">
                                <b><?php echo app('translator')->get('petition.Choose file'); ?></b>
                            </div>
                            <input type="file" class="file-upload6" hidden id="image_dip_app"
                                   accept="image/x-png,image/jpeg,application/pdf" name="diplom_image_app">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="big_img2">
                            <img src="" class="profile-pic6" alt="">
                            <iframe id="iframePdf" style="display: block; width: 100%; height: auto" src=""
                                    class="profile-pic6-pdf" src=""></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form_one">
                <div class="top">
                    <b><?php echo app('translator')->get('petition.English Proficiency Information'); ?></b>
                </div>
                <div class="row">
                    <div class="col-md-4 bor_right">

                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.English degree'); ?> <b><?php $__errorArgs = ['english_degree'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <select class="form-control" name="english_degree">
                                <?php $__currentLoopData = $endegree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(old('endegree') == $item): ?> selected
                                            <?php endif; ?> value="<?php echo e($item->id); ?>"><?php echo e($item->$name_l); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Overall band score'); ?></h2>
                            <input type="text" style="width: 100px !important;" class="latyn_address"
                                   name="overall_score_english" value="<?php echo e(old('overall_score_english')); ?>">
                        </div>

                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.IELTS Test Report Form Number (only if IELTS)'); ?></h2>
                            <input type="text" class="latyn_address" name="ilts_number"
                                   value="<?php echo e(old('ilts_number')); ?>">
                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Upload test report copy'); ?> </h2>
                            <div class="chose_file upload-button4">
                                <b><?php echo app('translator')->get('petition.Choose file'); ?></b>
                            </div>
                            <input type="file" class="file-upload4" hidden id="image_eng"
                                   accept="image/x-png,image/jpeg,application/pdf" name="english_image">
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="big_img2">
                            <img src="" class="profile-pic4" alt="">
                            <iframe id="iframePdf" style="display: block; width: 100%; height: auto" src=""
                                    class="profile-pic4-pdf" src=""></iframe>

                        </div>
                    </div>
                </div>
            </div>

            <div class="form_one">
                <div class="top">
                    <b><?php echo app('translator')->get('petition.Faculty Selection'); ?></b>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Talim tashkilotini tanlang'); ?> <span class="color-red">*</span>
                                <b><?php $__errorArgs = ['high_school_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <select class="form-control" id="high_school" name="high_school_id" style="width: 100%;">
                                <option value="">-----</option>
                                <?php $__currentLoopData = $high_schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(old('high_school_id') == $item->id): ?> selected
                                            <?php endif; ?> value="<?php echo e($item->id); ?>"><?php echo e($item->$name_l); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Select faculty'); ?> <span class="color-red">*</span>
                                <b><?php $__errorArgs = ['faculty_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b>
                            </h2>
                            <select class="form-control" id="faculty" name="faculty_id" style="width: 100%;">
                                <option value="">-----</option>
                                <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(old('faculty_id') == $item->id): ?> selected
                                            <?php endif; ?> value="<?php echo e($item->id); ?>"><?php echo e($item->$name_l); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Type of Education'); ?> <span class="color-red">*</span>
                                <b><?php $__errorArgs = ['type_education_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <select class="form-control" id="faculty_type_edu" name="type_education_id"
                                    style="width: 100%;">
                                <?php $__currentLoopData = $edutypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(old('type_education_id') == $item): ?> selected
                                            <?php endif; ?> value="<?php echo e($item->id); ?>"><?php echo e($item->$name_l); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if(old('faculty_id')): ?>
                                    <?php $ar = 'App\FacultyTypeEdu'::where('faculty_id' , old('faculty_id'))->pluck('type_education_id'); $regions = 'App\Edutype'::whereIn('id' , $ar)->get(); ?>
                                    <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if(old('type_education_id') == $item->id): ?> selected
                                                <?php endif; ?> value="<?php echo e($item->id); ?>"><?php echo e($item->$name_l); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Language of further education'); ?> <span class="color-red">*</span>
                                <b><?php $__errorArgs = ['type_language_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <select class="form-control" id="faculty_type_lang" name="type_language_id"
                                    style="width: 100%;">
                                <?php $__currentLoopData = $languagetype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(old('type_language_id') == $item): ?> selected
                                            <?php endif; ?> value="<?php echo e($item->id); ?>"><?php echo e($item->$name_l); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if(old('faculty_id')): ?>
                                    <?php $ar = 'App\FacultyTypeLang'::where('faculty_id' , old('faculty_id'))->pluck('type_language_id'); $regions = 'App\Languagetype'::whereIn('id' , $ar)->get(); ?>
                                    <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if(old('type_language_id') == $item->id): ?> selected
                                                <?php endif; ?> value="<?php echo e($item->id); ?>"><?php echo e($item->$name_l); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="divinput">
                            <h2><?php echo app('translator')->get('petition.Tavfsiyanoma nusxasi'); ?> <b><?php $__errorArgs = ['recommendation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    ! <?php echo e(@message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></b></h2>
                            <div class="col-md-6">
                                <div class="divinput">
                                    <h2><?php echo app('translator')->get('petition.Tavsiyanoma nusxasini yuklang'); ?> </h2>
                                    <div class="chose_file upload-button5">
                                        <b><?php echo app('translator')->get('petition.Choose file'); ?></b>
                                    </div>
                                    <input type="file" class="file-upload5" hidden id="image_recommendation"
                                           accept="image/x-png,image/jpeg,application/pdf" name="image_recommendation">
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="big_img2">
                                    <img src="" class="profile-pic5" alt="">
                                    <iframe id="iframePdf" style="display: block; width: 100%; height: auto" src=""
                                            class="profile-pic5-pdf" src=""></iframe>

                                </div>
                            </div>
                        </div>

                    </div>


















































                </div>
            </div>





























































































































            <div class="send">
                <button type="submit" class="send_btn"><?php echo app('translator')->get('petition.Send'); ?></button>
            </div>

        </form>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
    <script type="text/javascript">

        var notf = "<?php echo app('translator')->get('petition.Please select file size smaller from 4Mb'); ?>";
        $(document).ready(function () {
            $('#image_doc').bind('change', function () {
                var a = (this.files[0].size);
                // alert(a);
                if (a > 4000000) {
                    alert(notf);
                    $(this).val('');
                }
                ;
            });
            $('#image_pass').bind('change', function () {
                var a = (this.files[0].size);
                // alert(a);
                if (a > 4000000) {
                    alert(notf);
                    $(this).val('');
                }
                ;
            });
            $('#image_dip').bind('change', function () {
                var a = (this.files[0].size);
                // alert(a);
                if (a > 4000000) {
                    alert(notf);
                    $(this).val('');
                }
                ;
            });
            $('#image_eng').bind('change', function () {
                var a = (this.files[0].size);
                // alert(a);
                if (a > 4000000) {
                    alert(notf);
                    $(this).val('');
                }
                ;
            });
            $('.jonatish').click(function () {
                var ad = $('.address').val();
                var bd = $('#birth_date').val();
                var c = $('#country').val();
                var mn = $('#middle_name').val();
                var ln = $('#last_name').val();
                var fn = $('#first_name').val();
                var r = $('#country_region').val();
                var a = $('#country_region_area').val();
                var xatoc = '<?php echo app('translator')->get('petition.Davlatlardan birini tanlang'); ?>';
                var xatoa = '<?php echo app('translator')->get('petition.Tumanlardan  birini tanlang'); ?>';
                var xator = '<?php echo app('translator')->get('petition.Viloyatlardan birini tanlang'); ?>';
                var xatot = '<?php echo app('translator')->get('petition.Malumotlarni kiriting'); ?>';
                // alert(r);
                if (c == "" || c == null) {
                    $('#country_error').html(xatoc);
                }
                if (r == "" || r == null) {
                    $('#country_region_error').html(xator);
                }
                if (a == "" || a == null) {
                    $('#country_region_area_error').html(xatoa);
                }
                if (ln == "" || ln == null) {
                    $('#last_name_error').html(xatot);

                }
                if (mn == "" || mn == null) {
                    $('#middle_name_error').html(xatot);

                }
                if (fn == "" || fn == null) {
                    $('#first_name_error').html(xatot);

                }
                if (bd == "" || bd == null) {
                    $('#birth_date_error').html(xatot);

                }
                // if (ad == "" || ad == null) {
                // 	$('#address_error').html(xatot);

                // }


            });
        });

        $('.send_btn').click(function () {
            // if ($('input[name="image"]').get(0).files.length === 0) {
            // 	alert(<?php echo app('translator')->get('petition.Upload photo 3x4'); ?> );
            // 	$([document.documentElement, document.body]).animate({
            //         scrollTop: $(".sc_img").offset().top
            //     }, 1000);
            // }
        });

        $('.male').click(function () {
            $('.male input').prop('checked', true);
        });
        $('.female').click(function () {
            $('.female input').prop('checked', true);
        });


    </script>
    <script type="text/javascript">
         $('#punkt2').change(function () {
            if ($(this).is(':checked')) {
                $('.forpunkt2').css({
                    'display': 'block'
                })
            }

        })
         $('#punkt1').change(function () {
            if ($(this).is(':checked')) {
                $('.forpunkt2').css({
                    'display': 'none'
                })
            }

        })
        function get_enable_documents(id) {
            if (id != '') {
                $.ajax({
                    url: '/get-enable_documents/' + id,
                    type: 'GET',
                    success: function (res) {
                        $('.input_requireds').each(function (i, obj) {
                            $(this).removeAttr('required');
                        });
                        var res2 = JSON.parse(res);
                        $.each(res2, function (key, value) {
                            $('.en_' + value.column).removeClass('hidden_document');
                            $('.en_' + value.column + ' h2 span').remove();
                            var el_content = $('.en_' + value.column + ' h2').html();
                            if (value.type_input == 'required') {
                                el_content = ' <span class="text-danger">*</span> ' + el_content;
                                $('.en_' + value.column + ' input').attr('required', 'true');

                            }
                            var el_content = $('.en_' + value.column + ' h2').html(el_content);

                        })
                    }
                })
            }
        }

        $('#high_school').change(function () {
            $('.document_input').addClass('hidden_document');
            var id = $(this).val();
            if(id == 3 || id == 4 || id ==5){

            }
            else{
                $('.conversation_language_div').css({
                    'display':'none'
                })
            }
            get_enable_documents(id)
            if (id == 3) {
                $('.punkt').css({
                    'display': 'block'
                })
            } else {
                $('.punkt').css({
                    'display': 'none'
                })
                $('.forpunkt2').css({
                    'display': 'none'
                })
            }
        })
        $(document).ready(function () {
            var id = '<?php echo e(old('high_school_id')); ?>';
            get_enable_documents(id);
        })
        $('.clickPunkt').onclick(function () {
            var name = $(this).attr('for');
            $('#' + name).click()
        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tsul/domains/qabul2023-texnikum.tsul.uz/public_html/resources/views/user/pages/petition/create.blade.php ENDPATH**/ ?>