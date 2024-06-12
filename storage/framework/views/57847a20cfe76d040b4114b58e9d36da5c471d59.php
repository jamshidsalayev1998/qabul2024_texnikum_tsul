<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $locale = App::getLocale(); $name_l = 'name_'.$locale; ?>
    <style type="text/css">
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9); /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image (Image Text) - Same Width as the Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation - Zoom in the Modal */
        .modal-content, #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes  zoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: fixed;
            top: 65px;
            right: 55px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media  only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <div class="endi_done">
        <div class="test_done"></div>

        <div class="padd">
            <div class="w-100 p-2 text-center "
                 style="color: white; border-radius: 7px; background-color: <?php if($petition->status == 0): ?> #FFDD00 <?php elseif($petition->status == 1): ?> #FF5A4B <?php elseif($petition->status == 2): ?> #74FF41 <?php endif; ?>">
                <?php echo app('translator')->get('petition.Status'); ?>: <?php echo e($petition->getStatus()); ?>

            </div>
            <form class="form_check" method="post" action="<?php echo e(route('admin.return')); ?>">
                <?php echo csrf_field(); ?>
                <input hidden type="text" name="petition_id" value="<?php echo e($petition->id); ?>">
                <div class="personal_info">

                    <div class="tab_all tab_index">
                        <ul>
                            <li class="one act_li f_tab"><img src="<?php echo e(asset('newadmin/img/tab1.png')); ?>" alt=""></li>
                            <li class="one f_tab"><img src="<?php echo e(asset('newadmin/img/tab2.png')); ?>" alt=""></li>
                            <li class="three f_pdf"><img src="<?php echo e(asset('newadmin/img/tab3.png')); ?>" alt=""></li>

                            <li class="three file_d"><a href="<?php echo e(asset($petition->zip_file)); ?>"><i class="fa fa-download"></i></a></li>

                            <?php if(Auth::user()->role == 3): ?>
                                <li url="<?php echo e(route('superadmin.petition.delete' , ['id' => $petition->id])); ?>"
                                    class="three f_delet" style="background-color: #FF5F5F; color: white;"><i
                                            class="fa fa-trash"></i></li>
                            <?php endif; ?>
                        </ul>
                        <div class="tab_content">
                            <aside class="active">
                                <div class="info_item">
                                    <div class="top">
                                        <h1><?php echo app('translator')->get('other.PERSONAL INFO'); ?></h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 bor_right">
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.First name'); ?> </h3>
                                                <h4><?php echo e($petition->first_name); ?> <i style="color: #FF5F5F;"
                                                                                   class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[first_name]" id="" cols="30" rows="10"
                                                          class="input_hid"> <?php if(isset($com_mes['first_name'])): ?> <?php echo e($com_mes['first_name']); ?> <?php endif; ?> </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Last name'); ?> </h3>
                                                <h4><?php echo e($petition->last_name); ?> <i style="color: #FF5F5F;"
                                                                                  class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[last_name]" id="" cols="30" rows="10"
                                                          class="input_hid"> <?php if(isset($com_mes['last_name'])): ?> <?php echo e($com_mes['last_name']); ?> <?php endif; ?> </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Father`s name'); ?></h3>
                                                <h4> <?php echo e($petition->middle_name); ?> <i style="color: #FF5F5F;"
                                                                                     class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[middle_name]" id="" cols="30" rows="10"
                                                          class="input_hid"> <?php if(isset($com_mes['middle_name'])): ?> <?php echo e($com_mes['middle_name']); ?> <?php endif; ?> </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Gender'); ?></h3>
                                                <h4><?php echo e($petition->getGender()); ?> <i style="color: #FF5F5F;"
                                                                                    class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[gender]" id="" cols="30" rows="10"
                                                          class="input_hid"> <?php if(isset($com_mes['gender'])): ?> <?php echo e($com_mes['gender']); ?> <?php endif; ?> </textarea>
                                            </div>
                                        </div>




































                                        <div class="col-md-5">
                                            <div class="info_img">
                                                <div class="row_info_img">
                                                    <div class="row_info">
                                                        <h3><?php echo app('translator')->get('petition.Citizenship'); ?></h3>
                                                        <h4><?php echo e($petition->citizenship); ?> <i style="color: #FF5F5F;"
                                                                                            class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[citizenship]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['citizenship'])): ?> <?php echo e($com_mes['citizenship']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <div class="row_info">
                                                        <h3><?php echo app('translator')->get('petition.Nationality'); ?></h3>
                                                        <h4> <?php echo e($petition->nationality); ?> <i style="color: #FF5F5F;"
                                                                                             class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[nationality]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['nationality'])): ?> <?php echo e($com_mes['nationality']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                </div>
                                                <div style="width: 50%">
                                                    <div class="row_info">
                                                        <h4><?php echo app('translator')->get('petition.Image'); ?> <i style="color: #FF5F5F;"
                                                                                       class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[image]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['image'])): ?> <?php echo e($com_mes['image']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <div class="row_info_img img " style="width: 100%">

                                                        <img src="<?php echo e(asset('users/documents/image')); ?>/<?php echo e($petition->image); ?>"
                                                             alt="">

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="info_item mt-md-3">
                                    <div class="row">
                                        <div class="col-md-5 bor_right">
                                            <div class="info_img info_img_order">
                                                <div style="width: 50%">
                                                    <div class="row_info">
                                                        <h4><?php echo app('translator')->get('petition.Passport image'); ?> <i style="color: #FF5F5F;"
                                                                                                class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[passport_image]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['passport_image'])): ?> <?php echo e($com_mes['passport_image']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <div class="row_info_img img " style="width: 100%">
                                                        <?php if(mime_content_type(public_path().'/users/documents/passport_images/'.$petition->passport_image) == 'application/pdf'): ?>
                                                            <iframe id="iframePdf"
                                                                    style="display: block; width: 100%; height: auto"
                                                                    src="<?php echo e(asset('users/documents/passport_images')); ?>/<?php echo e($petition->passport_image); ?>"
                                                                    class="profile-pic6-pdf" src=""></iframe>
                                                            <a href="<?php echo e(asset('users/documents/passport_images')); ?>/<?php echo e($petition->passport_image); ?>">Yuklab
                                                                olish <i class="fa fa-download"></i></a>
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('users/documents/passport_images')); ?>/<?php echo e($petition->passport_image); ?>"
                                                                 alt="">
                                                        <?php endif; ?>


                                                    </div>
                                                </div>

                                                <div class="row_info_img pl-md-3">
                                                    <div class="row_info">
                                                        <h3><?php echo app('translator')->get('petition.Passport seria and number'); ?></h3>
                                                        <h4><?php echo e($petition->passport_seria); ?> <i style="color: #FF5F5F;"
                                                                                               class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[passport_seria]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['passport_seria'])): ?> <?php echo e($com_mes['passport_seria']); ?> <?php endif; ?> </textarea>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-3 bor_right">
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Home phone number'); ?></h3>
                                                <h4> <?php echo e($petition->home_phone); ?> <i style="color: #FF5F5F;"
                                                                                    class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[home_phone]" id="" cols="30" rows="10"
                                                          class="input_hid"> <?php if(isset($com_mes['home_phone'])): ?> <?php echo e($com_mes['home_phone']); ?> <?php endif; ?> </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Mobile phone number'); ?></h3>
                                                <h4><?php echo e($petition->mobile_phone); ?> <i style="color: #FF5F5F;"
                                                                                     class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[mobile_phone]" id="" cols="30" rows="10"
                                                          class="input_hid"> <?php if(isset($com_mes['mobile_phone'])): ?> <?php echo e($com_mes['mobile_phone']); ?> <?php endif; ?> </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Father`s phone number'); ?></h3>
                                                <h4><?php echo e($petition->father_phone); ?> <i style="color: #FF5F5F;"
                                                                                     class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[father_phone]" id="" cols="30" rows="10"
                                                          class="input_hid"> <?php if(isset($com_mes['father_phone'])): ?> <?php echo e($com_mes['father_phone']); ?> <?php endif; ?> </textarea>

                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Mother`s phone number'); ?></h3>
                                                <h4><?php echo e($petition->mother_phone); ?> <i style="color: #FF5F5F;"
                                                                                     class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[mother_phone]" id="" cols="30" rows="10"
                                                          class="input_hid"> <?php if(isset($com_mes['mother_phone'])): ?> <?php echo e($com_mes['mother_phone']); ?> <?php endif; ?> </textarea>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Disability status'); ?></h3>
                                                <h4><?php echo e($petition->getDisability()->$name_l); ?> <i style="color: #FF5F5F;"
                                                                                                 class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[disability_status_id]" id="" cols="30" rows="10"
                                                          class="input_hid"> <?php if(isset($com_mes['disability_status_id'])): ?> <?php echo e($com_mes['disability_status_id']); ?> <?php endif; ?> </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Disability description'); ?></h3>
                                                <textarea name="" id="" disabled cols="29" rows="10">
                                                    	<?php echo e($petition->disability_description); ?>

                                                    </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </aside>


                            <aside>
                                <div class="info_item">
                                    <div class="top">
                                        <h1><?php echo app('translator')->get('other.EDUCATION INFORMATION'); ?></h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 bor_right">
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Name of school or number'); ?></h3>
                                                <h4><?php echo e($petition->school); ?> <i style="color: #FF5F5F;"
                                                                               class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[school]" id="" cols="30" rows="10"
                                                          class="input_hid"> <?php if(isset($com_mes['school'])): ?> <?php echo e($com_mes['school']); ?> <?php endif; ?> </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Type school'); ?></h3>
                                                <h4><?php echo e($petition->getTypeschool()->$name_l); ?> <i style="color: #FF5F5F;"
                                                                                                 class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[type_school]" id="" cols="30" rows="10"
                                                          class="input_hid"> <?php if(isset($com_mes['type_school'])): ?> <?php echo e($com_mes['type_school']); ?> <?php endif; ?> </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Graduation date'); ?></h3>
                                                <h4><?php echo e($petition->graduation_date); ?> <i style="color: #FF5F5F;"
                                                                                        class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[graduation_date]" id="" cols="30" rows="10"
                                                          class="input_hid"> <?php if(isset($com_mes['graduation_date'])): ?> <?php echo e($com_mes['graduation_date']); ?> <?php endif; ?> </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Diploma number'); ?></h3>
                                                <h4><?php echo e($petition->diplom_number); ?> <i style="color: #FF5F5F;"
                                                                                      class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[diplom_number]" id="" cols="30" rows="10"
                                                          class="input_hid"> <?php if(isset($com_mes['diplom_number'])): ?> <?php echo e($com_mes['diplom_number']); ?> <?php endif; ?> </textarea>
                                            </div>
                                             <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Imtiyozli diplom'); ?></h3>
                                                <h4>
                                                    <?php if($petition->privileged_diploma == 1): ?> HA <?php else: ?> YO'q <?php endif; ?>
                                                    <i style="color: #FF5F5F;"
                                                                                      class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[privileged_diploma]" id="" cols="30" rows="10"
                                                          class="input_hid"> <?php if(isset($com_mes['privileged_diploma'])): ?> <?php echo e($com_mes['privileged_diploma']); ?> <?php endif; ?> </textarea>
                                            </div>

                                        </div>


                                        <div class="col-md-8">
                                            <div class="info_img">

                                                <div style="width: 50%">
                                                    <div class="row_info">
                                                        <h4><?php echo app('translator')->get('petition.Diplom image'); ?> <i style="color: #FF5F5F;"
                                                                                              class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[diplom_image]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['diplom_image'])): ?> <?php echo e($com_mes['diplom_image']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <div class="row_info_img img " style="width: 100%">
                                                        <?php if(mime_content_type(public_path().'/users/documents/diplom_images/'.$petition->diplom_image) == 'application/pdf'): ?>
                                                            <iframe id="iframePdf"
                                                                    style="display: block; width: 100%; height: auto"
                                                                    src="<?php echo e(asset('users/documents/diplom_images')); ?>/<?php echo e($petition->diplom_image); ?>"
                                                                    class="profile-pic6-pdf" src=""></iframe>
                                                            <a href="<?php echo e(asset('users/documents/diplom_images')); ?>/<?php echo e($petition->diplom_image); ?>">Yuklab
                                                                olish <i class="fa fa-download"></i></a>
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('users/documents/diplom_images')); ?>/<?php echo e($petition->diplom_image); ?>"
                                                                 alt="">
                                                        <?php endif; ?>


                                                    </div>
                                                </div>
                                                <div style="width: 50%">
                                                    <div class="row_info">
                                                        <h4><?php echo app('translator')->get('petition.Diplom application image'); ?> <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[diplom_image_app]" id="" cols="30"
                                                                  rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['diplom_image_app'])): ?> <?php echo e($com_mes['diplom_image_app']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <div class="row_info_img img " style="width: 100%">
                                                        <?php if(mime_content_type(public_path().'/users/documents/diplom_images/'.$petition->diplom_image_app) == 'application/pdf'): ?>
                                                            <iframe id="iframePdf"
                                                                    style="display: block; width: 100%; height: auto"
                                                                    src="<?php echo e(asset('users/documents/diplom_images')); ?>/<?php echo e($petition->diplom_image_app); ?>"
                                                                    class="profile-pic6-pdf" src=""></iframe>
                                                            <a href="<?php echo e(asset('users/documents/diplom_images')); ?>/<?php echo e($petition->diplom_image_app); ?>">Yuklab
                                                                olish <i class="fa fa-download"></i></a>
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('users/documents/diplom_images')); ?>/<?php echo e($petition->diplom_image_app); ?>"
                                                                 alt="">
                                                        <?php endif; ?>


                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="info_item mt-md-3">
                                    <div class="row">
                                        <div class="col-md-6 bor_right">
                                            <div class="info_img ">
                                                <div style="width: 50%">
                                                    <div class="row_info">
                                                        <h4><?php echo app('translator')->get('petition.English image'); ?> <i style="color: #FF5F5F;"
                                                                                               class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[english_image]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['english_image'])): ?> <?php echo e($com_mes['english_image']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <div class="row_info_img img " style="width: 100%">
                                                        <?php if(mime_content_type(public_path().'/users/documents/english_images/'.$petition->english_image) == 'application/pdf'): ?>
                                                            <iframe id="iframePdf"
                                                                    style="display: block; width: 100%; height: auto"
                                                                    src="<?php echo e(asset('users/documents/english_images')); ?>/<?php echo e($petition->english_image); ?>"
                                                                    class="profile-pic6-pdf" src=""></iframe>
                                                            <a href="<?php echo e(asset('users/documents/english_images')); ?>/<?php echo e($petition->english_image); ?>">Yuklab
                                                                olish <i class="fa fa-download"></i></a>
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('users/documents/english_images')); ?>/<?php echo e($petition->english_image); ?>"
                                                                 alt="">
                                                        <?php endif; ?>


                                                    </div>
                                                </div>

                                                <div class="row_info_img pl-md-3">
                                                    <div class="row_info">
                                                        <h3><?php echo app('translator')->get('petition.English degree'); ?></h3>
                                                        <h4><?php echo e($petition->getEndegree()->$name_l?$petition->getEndegree()->$name_l:'---------'); ?> <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4>
                                                        <textarea name="edit[english_degree]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['english_degree'])): ?> <?php echo e($com_mes['english_degree']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <div class="row_info">
                                                        <h3><?php echo app('translator')->get('petition.Overall band score'); ?></h3>
                                                        <h4><?php echo e($petition->overall_score_english?$petition->overall_score_english:'---------'); ?> <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4>
                                                        <textarea name="edit[overall_score_english]" id="" cols="30"
                                                                  rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['overall_score_english'])): ?> <?php echo e($com_mes['overall_score_english']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <div class="row_info">
                                                        <h3><?php echo app('translator')->get('petition.IELTS Test Report Form Number (only if IELTS)'); ?></h3>
                                                        <h4><?php echo e($petition->ilts_number?$petition->ilts_number:'---------'); ?> <i style="color: #FF5F5F;"
                                                                                            class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[ilts_number]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['ilts_number'])): ?> <?php echo e($com_mes['ilts_number']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                     <div class="row_info">
                                                        <h3><?php echo app('translator')->get('petition.olympics'); ?></h3>
                                                        <h4><?php echo e($petition->olympics?$petition->olympics:'---------'); ?> <i style="color: #FF5F5F;"
                                                                                            class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                         <textarea name="edit[olympics]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['olympics'])): ?> <?php echo e($com_mes['olympics']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info_img">
                                                <div class="row_info_img">
                                                    <div class="row_info">
                                                        <h3><?php echo app('translator')->get('petition.Talim tashkiloti'); ?></h3>
                                                        <h4><?php if($petition->high_school): ?><?php echo e($petition->high_school->$name_l); ?><?php endif; ?>
                                                            <i style="color: #FF5F5F;"
                                                               class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[high_school_id]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['high_school_id'])): ?> <?php echo e($com_mes['high_school_id']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <div class="row_info">
                                                        <h3><?php echo app('translator')->get('petition.Faculty'); ?></h3>
                                                        <h4><?php echo e($petition->getFaculty()->$name_l?$petition->getFaculty()->$name_l:'---------'); ?> <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[faculty_id]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['faculty_id'])): ?> <?php echo e($com_mes['faculty_id']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <div class="row_info">
                                                        <h3><?php echo app('translator')->get('petition.Type of Education'); ?></h3>
                                                        <h4> <?php echo e($petition->getEdutype()->$name_l); ?> <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[type_education_id]" id="" cols="30"
                                                                  rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['type_education_id'])): ?> <?php echo e($com_mes['type_education_id']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <div class="row_info">
                                                        <h3><?php echo app('translator')->get('petition.Language of further education'); ?></h3>
                                                        <h4><?php echo e($petition->getLanguagetype()->$name_l); ?> <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4>
                                                        <textarea name="edit[type_language_id]" id="" cols="30"
                                                                  rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['type_language_id'])): ?> <?php echo e($com_mes['type_language_id']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <div class="row_info">
                                                        <h3>Suhbat tili</h3>
                                                        <h4><?php echo e($petition->conversation_language == '1' ? 'O`zbek':'Rus'); ?> <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4>
                                                        <textarea name="edit[conversation_language]" id="" cols="30"
                                                                  rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['conversation_language'])): ?> <?php echo e($com_mes['conversation_language']); ?> <?php endif; ?> </textarea>
                                                    </div>

                                                </div>
                                                <div style="width: 50%">
                                                    <div class="row_info">
                                                        <h4><?php echo app('translator')->get('petition.Tavsiyanoma'); ?> <i style="color: #FF5F5F;"
                                                                                             class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[recommendation]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['recommendation'])): ?> <?php echo e($com_mes['recommendation']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <div class="row_info_img img " style="width: 100%">
                                                        <?php if(mime_content_type(public_path().'/users/documents/recommendation_images/'.$petition->image_recommendation) == 'application/pdf'): ?>
                                                            <iframe id="iframePdf"
                                                                    style="display: block; width: 100%; height: auto"
                                                                    src="<?php echo e(asset('users/documents/recommendation_images')); ?>/<?php echo e($petition->image_recommendation); ?>"
                                                                    class="profile-pic6-pdf" src=""></iframe>
                                                            <a href="<?php echo e(asset('users/documents/recommendation_images')); ?>/<?php echo e($petition->image_recommendation); ?>">Yuklab
                                                                olish <i class="fa fa-download"></i></a>
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('users/documents/recommendation_images')); ?>/<?php echo e($petition->image_recommendation); ?>"
                                                                 alt="">
                                                        <?php endif; ?>


                                                    </div>
                                                </div>

                                            </div>


                                        </div>

                                    </div>
                                </div>
                                 <div class="info_item mt-md-3">
                                    <div class="row">
                                        <div class="col-md-6 bor_right">


























                                                <div class="row_info_img pl-md-3">
                                                    <div class="row_info " style="display: flex">

                                                        <h4><?php echo app('translator')->get('petition.Passport tarjima'); ?>  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="<?php echo e(asset('/users/documents/passport_images')); ?>/<?php echo e($petition->passport_copy_translate); ?>"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[passport_copy_translate]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['passport_copy_translate'])): ?> <?php echo e($com_mes['passport_copy_translate']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="row_info " style="display: flex">

                                                        <h4><?php echo app('translator')->get('petition.Tugilganlik haqida guvohnoma'); ?>  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="<?php echo e(asset('/users/documents/passport_images')); ?>/<?php echo e($petition->birth_certificate_copy); ?>"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[birth_certificate_copy]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['birth_certificate_copy'])): ?> <?php echo e($com_mes['birth_certificate_copy']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="row_info " style="display: flex">

                                                        <h4><?php echo app('translator')->get('petition.Tugilganlik haqida guvohnoma tarjimasi'); ?>  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="<?php echo e(asset('/users/documents/passport_images')); ?>/<?php echo e($petition->birth_certificate_copy_translate); ?>"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[birth_certificate_copy_translate]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['birth_certificate_copy_translate'])): ?> <?php echo e($com_mes['birth_certificate_copy_translate']); ?> <?php endif; ?> </textarea>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info_img">
                                                <div class="row_info_img">
                                                    <div class="row_info " style="display: flex">
                                                        <h4><?php echo app('translator')->get('petition.Talim haqida hujjat tarjima'); ?>  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="<?php echo e(asset('/users/documents/diplom_images')); ?>/<?php echo e($petition->edu_document_copy_translate); ?>"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[edu_document_copy_translate]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['edu_document_copy_translate'])): ?> <?php echo e($com_mes['edu_document_copy_translate']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="row_info " style="display: flex">
                                                        <h4><?php echo app('translator')->get('petition.086 tibbiyot malumotnomasi'); ?>  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="<?php echo e(asset('/users/documents/med_forms')); ?>/<?php echo e($petition->med_form_copy_086); ?>"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[med_form_copy_086]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['med_form_copy_086'])): ?> <?php echo e($com_mes['med_form_copy_086']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="row_info " style="display: flex">
                                                        <h4><?php echo app('translator')->get('petition.086 tibbiyot malumotnomasi tarjima'); ?>  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="<?php echo e(asset('/users/documents/med_forms')); ?>/<?php echo e($petition->med_form_copy_086_translate); ?>"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[med_form_copy_086_translate]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['med_form_copy_086_translate'])): ?> <?php echo e($com_mes['med_form_copy_086_translate']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <hr>


                                                </div>
                                                <div style="width: 50%; border-left: 1px solid #ABABAB">
                                                    <div class="row_info " style="display: flex">
                                                        <h4><?php echo app('translator')->get('petition.OIV infektsiyasi yo`qligi to`g`risidagi guvohnoma'); ?>  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="<?php echo e(asset('/users/documents/med_forms')); ?>/<?php echo e($petition->vich_copy); ?>"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[vich_copy]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['vich_copy'])): ?> <?php echo e($com_mes['vich_copy']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="row_info " style="display: flex">
                                                        <h4><?php echo app('translator')->get('petition.OIV infektsiyasi yo`qligi to`g`risidagi guvohnoma tarjima'); ?>  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="<?php echo e(asset('/users/documents/med_forms')); ?>/<?php echo e($petition->vich_copy_translate); ?>"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[vich_copy_translate]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['vich_copy_translate'])): ?> <?php echo e($com_mes['vich_copy_translate']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <hr>

                                                    <div class="row_info " style="display: flex">
                                                        <h4><?php echo app('translator')->get('petition.063 tibbiyot malumotnomasi'); ?>  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="<?php echo e(asset('/users/documents/med_forms')); ?>/<?php echo e($petition->med_form_copy_063); ?>"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[med_form_copy_063]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['med_form_copy_063'])): ?> <?php echo e($com_mes['med_form_copy_063']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="row_info " style="display: flex">
                                                        <h4><?php echo app('translator')->get('petition.063 tibbiyot malumotnomasi tarjima'); ?>  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="<?php echo e(asset('/users/documents/med_forms')); ?>/<?php echo e($petition->med_form_copy_063_translate); ?>"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[med_form_copy_063_translate]" id="" cols="30" rows="10"
                                                                  class="input_hid"> <?php if(isset($com_mes['med_form_copy_063_translate'])): ?> <?php echo e($com_mes['med_form_copy_063_translate']); ?> <?php endif; ?> </textarea>
                                                    </div>
                                                    <hr>
                                                </div>

                                            </div>


                                        </div>

                                    </div>
                                </div>


                            </aside>
                            <aside>3</aside>
                        </div>
                    </div>
                </div>
            </form>
            <div style="display: flex; width: 60%; float: left;">
                <?php if($petition->yangi == 1): ?>
                    <div style="background-color: white; color: red; width: 100%; padding: 7px; border-radius: 7px;">
                        <?php echo e($petition->comment); ?>

                    </div>

                <?php endif; ?>

            </div>
            <?php if(Auth::user()->role >= 2 ): ?>
                <div class="send_bottom">
                    <button class="reject">REJECT</button>
                    <button href="<?php echo e(route('admin.accept' , ['id' => $petition->id])); ?>" class="accept">ACCEPT</button>
                </div>
            <?php endif; ?>


        </div>

    </div>
    <div id="image_modal" class="modal">

        <!-- The Close Button -->
        <span class="close">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01">

        <!-- Modal Caption (Image Text) -->
        <div id="caption"></div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        <?php if(Auth::user()->role == 1): ?>
        $('.row_info textarea').attr('disabled', '');
        <?php endif; ?>
        $('.f_pdf').click(function () {
            window.location.href = '/application-pdf/' +<?php echo e($petition->id); ?>;
        });
        $('.reject').click(function () {
            var c = confirm("REJECT");
            if (c) {
                $('.form_check').submit();
            }

        });
        $('.accept').click(function () {
            var c = confirm("ACCEPT");
            if (c) {
                window.location.href = $(this).attr('href');

            }
        });
        $('.img').click(function () {
            // alert("sdsd");
            $('.modal').css({
                'display': 'block',
            });
            var src = $(this).find('img').attr('src');
            // alert(src);
            $('#img01').attr('src', src);

        });
        $('.close').click(function () {
            $('.modal').css({
                'display': 'none',
            });
        })
        $(window).click(function () {
            $('.modal').css({
                'display': 'none',
            });
        });
        $('.modal').click(function (event) {
            event.stopPropagation();
        });
        $('.img').click(function (event) {
            event.stopPropagation();
        });

        $('.f_edit').click(function () {
            window.location.href = $(this).attr('url');
        });

        $('.f_delet').click(function () {
            var tt = confirm("<?php echo app('translator')->get('other.Delete ?'); ?>");
            if (tt) {
                window.location.href = $(this).attr('url');
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tsul/domains/qabul2023-texnikum.tsul.uz/public_html/resources/views/admin/pages/petition/show.blade.php ENDPATH**/ ?>