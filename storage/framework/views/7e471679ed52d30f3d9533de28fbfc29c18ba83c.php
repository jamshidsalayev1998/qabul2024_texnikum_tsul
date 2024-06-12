<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $locale = App::getLocale(); $name_l = 'name_'.$locale; ?>
    <style type="text/css">
        .error {
            color: red;
            font-size: 13px;
        }

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
        <div class="test_done">

        </div>

        <div class="padd" style="padding: 15px 15px 15px 15px !important;">

            <div class="row pl-3 pr-3 mb-2" style="color: white !important">
                <div class="jm_media col-md-2 p-1 text-center"
                     style="border-radius: 5px; background-color: <?php if($petition->status == 0): ?> #FFDD00 <?php elseif($petition->status == 1): ?> #FF5A4B <?php elseif($petition->status == 2): ?> #74FF41 <?php endif; ?>">
                    <?php echo app('translator')->get('petition.Status'); ?>: <?php echo e($petition->getStatus()); ?>

                </div>
                <?php
                    $faculty = 'App\Faculty'::find($petition->faculty_id);
                ?>
                <?php if($petition->status == 1 && $faculty->status == 1): ?>
                    <a href="<?php echo e(route('petition.edit' , ['id' => $petition->id])); ?>"
                       class="jm_media col-md-2 p-1 text-center ml-2"
                       style="color:white; border-radius: 5px; background-color: #4997CF">
                        <i class="fa fa-edit"></i> <?php echo app('translator')->get('petition.Edit'); ?>
                    </a>
                <?php endif; ?>
                <a href="<?php echo e(route('petition.pdf' , ['id' => $petition->id])); ?>"
                   class="jm_media col-md-2 p-1 text-center ml-2"
                   style="border-radius: 5px; background-color: #4997CF; color: white !important">
                    <img src="<?php echo e(asset('newadmin/img/tab3.png')); ?>" alt=""> <?php echo app('translator')->get('petition.Print'); ?>
                </a>
                <?php if($petition->yangi == 1): ?>
                    <div class="jm_media col-md-2 p-1 text-center"
                         style="border-radius: 5px; background-color: white; color: red;">
                        <?php echo e($petition->comment); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="personal_info">

                <div class="tab_all tab_index" style="border-top: none !important">
                    <ul style="width: 50px; border: none !important;">
                        <li style="display: none;" class="one act_li"><img src="<?php echo e(asset('newadmin/img/tab1.png')); ?>"
                                                                           alt=""></li>
                        <li style="display: none;" class="one"><img src="<?php echo e(asset('newadmin/img/tab2.png')); ?>" alt="">
                        </li>
                        <li style="display: none;" class="three"><img src="<?php echo e(asset('newadmin/img/tab3.png')); ?>" alt="">
                        </li>
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
                                            <h3><?php echo app('translator')->get('petition.First name'); ?> <b class="error first_name_error"></b></h3>
                                            <h4><?php echo e($petition->first_name); ?> </h4>
                                        </div>
                                        <div class="row_info">
                                            <h3><?php echo app('translator')->get('petition.Last name'); ?><b class="error last_name_error"></b></h3>
                                            <h4><?php echo e($petition->last_name); ?></h4>
                                        </div>
                                        <div class="row_info">
                                            <h3><?php echo app('translator')->get('petition.Father`s name'); ?><b class="error middle_name_error"></b>
                                            </h3>
                                            <h4> <?php echo e($petition->middle_name); ?></h4>
                                        </div>
                                        <div class="row_info">
                                            <h3><?php echo app('translator')->get('petition.Gender'); ?><b class="error gender_error"></b></h3>
                                            <h4><?php echo e($petition->getGender()); ?></h4>
                                        </div>
                                    </div>


















































                                </div>


                                <div class="info_item mt-md-3">
                                    <div class="row">
                                        <div class="col-md-6 bor_right">
                                            <div class="info_img info_img_order">
                                                <div style="width: 100%">
                                                    <div class="row_info">
                                                        <h4><?php echo app('translator')->get('petition.Passport image'); ?> <b
                                                                class="error passport_image_error"></b></h4>
                                                    </div>
                                                    <div class="row_info_img img" style="width: 100%;">
                                                        <?php if(mime_content_type(public_path().'/users/documents/passport_images/'.$petition->passport_image) == 'application/pdf'): ?>
                                                            <iframe id="iframePdf"
                                                                    style="display: block; width: 100%; height: auto"
                                                                    src="<?php echo e(asset('users/documents/passport_images')); ?>/<?php echo e($petition->passport_image); ?>"
                                                                    class="profile-pic6-pdf" src=""></iframe>
                                                            <a href="<?php echo e(asset('users/documents/passport_images')); ?>/<?php echo e($petition->passport_image); ?>">Yuklab
                                                                olish <i class="fa fa-download"></i></a>
                                                        <?php else: ?>
                                                            <img
                                                                src="<?php echo e(asset('users/documents/passport_images')); ?>/<?php echo e($petition->passport_image); ?>"
                                                                alt="">
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                                <div class="row_info_img pl-md-3">
                                                    <div class="row_info">
                                                        <h3><?php echo app('translator')->get('petition.Passport seria and number'); ?><b
                                                                class="error passport_seria_error"></b></h3>
                                                        <h4><?php echo e($petition->passport_seria); ?></h4>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Home phone number'); ?><b
                                                        class="error home_phone_error"></b></h3>
                                                <h4> <?php echo e($petition->home_phone); ?></h4>
                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Mobile phone number'); ?><b
                                                        class="error mobile_phone_error"></b></h3>
                                                <h4><?php echo e($petition->mobile_phone); ?></h4>
                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Father`s phone number'); ?><b
                                                        class="error father_phone_error"></b></h3>
                                                <h4><?php echo e($petition->father_phone); ?></h4>

                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Mother`s phone number'); ?><b
                                                        class="error mother_phone_error"></b></h3>
                                                <h4><?php echo e($petition->mother_phone); ?></h4>
                                            </div>

                                        </div>














                                    </div>
                                </div>
                            </div>
                        </aside>


                    </div>
                </div>
            </div>
            <div class="personal_info mt-2">

                <div class="tab_all tab_index" style="border-top: none !important">
                    <ul style="width: 50px; border: none !important;">
                        <li style="display: none;" class="one act_li"><img src="<?php echo e(asset('newadmin/img/tab1.png')); ?>"
                                                                           alt=""></li>
                        <li style="display: none;" class="one"><img src="<?php echo e(asset('newadmin/img/tab2.png')); ?>" alt="">
                        </li>
                        <li style="display: none;" class="three"><img src="<?php echo e(asset('newadmin/img/tab3.png')); ?>" alt="">
                        </li>
                    </ul>
                    <div class="tab_content">


                        <aside class="active">
                            <div class="info_item">
                                <div class="top">
                                    <h1><?php echo app('translator')->get('other.EDUCATION INFORMATION'); ?></h1>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 bor_right">
                                        <div class="row_info">
                                            <h3><?php echo app('translator')->get('petition.Name of school or number'); ?><b class="error"></b></h3>
                                            <h4><?php echo e($petition->school); ?></h4>
                                        </div>
                                        <div class="row_info">
                                            <h3><?php echo app('translator')->get('petition.Type school'); ?><b class="error"></b></h3>
                                            <h4><?php echo e($petition->getTypeschool()->$name_l); ?> </h4>
                                        </div>
                                        <div class="row_info">
                                            <h3><?php echo app('translator')->get('petition.Graduation date'); ?><b class="error"></b></h3>
                                            <h4><?php echo e($petition->graduation_date); ?></h4>
                                        </div>
                                        <div class="row_info">
                                            <h3><?php echo app('translator')->get('petition.Diploma number'); ?><b class="error"></b></h3>
                                            <h4><?php echo e($petition->diplom_number); ?></h4>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="info_img">

                                            <div style="width: 100%">
                                                <div class="row_info">
                                                    <h4><?php echo app('translator')->get('petition.Diplom image'); ?> <b class="error"></b></h4>
                                                </div>
                                                <div class="row_info_img img mr-md-3" style="width: 90%;">
                                                    <?php if(mime_content_type(public_path().'/users/documents/diplom_images/'.$petition->diplom_image) == 'application/pdf'): ?>
                                                        <iframe id="iframePdf"
                                                                style="display: block; width: 100%; height: auto"
                                                                src="<?php echo e(asset('users/documents/diplom_images')); ?>/<?php echo e($petition->diplom_image); ?>"
                                                                class="profile-pic6-pdf" src=""></iframe>
                                                        <a href="<?php echo e(asset('users/documents/diplom_images')); ?>/<?php echo e($petition->diplom_image); ?>">Yuklab
                                                            olish <i class="fa fa-download"></i></a>
                                                    <?php else: ?>
                                                        <img
                                                            src="<?php echo e(asset('users/documents/diplom_images')); ?>/<?php echo e($petition->diplom_image); ?>"
                                                            alt="">
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="info_img">

                                            <div style="width: 100%">
                                                <div class="row_info">
                                                    <h4><?php echo app('translator')->get('petition.Diplom application image'); ?> <b class="error"></b>
                                                    </h4>
                                                </div>
                                                <div class="row_info_img img mr-md-3" style="width: 90%;">
                                                    <?php if(mime_content_type(public_path().'/users/documents/diplom_images/'.$petition->diplom_image_app) == 'application/pdf'): ?>
                                                        <iframe id="iframePdf"
                                                                style="display: block; width: 100%; height: auto"
                                                                src="<?php echo e(asset('users/documents/diplom_images')); ?>/<?php echo e($petition->diplom_image_app); ?>"
                                                                class="profile-pic6-pdf" src=""></iframe>
                                                        <a href="<?php echo e(asset('users/documents/diplom_images')); ?>/<?php echo e($petition->diplom_image_app); ?>">Yuklab
                                                            olish <i class="fa fa-download"></i></a>
                                                    <?php else: ?>
                                                        <img
                                                            src="<?php echo e(asset('users/documents/diplom_images')); ?>/<?php echo e($petition->diplom_image_app); ?>"
                                                            alt="">
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info_img ">
                                            <div style="width: 100%">
                                                <div class="row_info">
                                                    <h4><?php echo app('translator')->get('petition.English image'); ?> <b class="error"></b></h4>
                                                </div>
                                                <div class="row_info_img img" style="width: 100%;">
                                                    <?php if(mime_content_type(public_path().'/users/documents/english_images/'.$petition->english_image) == 'application/pdf'): ?>
                                                        <iframe id="iframePdf"
                                                                style="display: block; width: 100%; height: auto"
                                                                src="<?php echo e(asset('users/documents/english_images')); ?>/<?php echo e($petition->english_image); ?>"
                                                                class="profile-pic6-pdf" src=""></iframe>
                                                        <a href="<?php echo e(asset('users/documents/english_images')); ?>/<?php echo e($petition->english_image); ?>">Yuklab
                                                            olish <i class="fa fa-download"></i></a>
                                                    <?php else: ?>
                                                        <img
                                                            src="<?php echo e(asset('users/documents/english_images')); ?>/<?php echo e($petition->english_image); ?>"
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
                                    <div class="col-md-3 bor_right">
                                        <div class="row_info_img pl-md-3">
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.English degree'); ?><b class="error"></b></h3>
                                                <h4><?php echo e($petition->getEndegree()->$name_l); ?></h4>
                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.Overall band score'); ?><b class="error"></b></h3>
                                                <h4><?php echo e($petition->overall_score_english); ?></h4>
                                            </div>
                                            <div class="row_info">
                                                <h3><?php echo app('translator')->get('petition.IELTS Test Report Form Number (only if IELTS)'); ?>
                                                    <b class="error"></b></h3>
                                                <h4><?php echo e($petition->ilts_number); ?></h4>
                                            </div>
                                            <div class="row_info">
                                                    <h3><?php echo app('translator')->get('petition.olympics'); ?><b
                                                            class="error"></b>
                                                    </h3>
                                                    <h4><?php echo e($petition->olympics); ?></h4>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="info_img">
                                            <div class="row_info_img">
                                                <div class="row_info">
                                                    <h3><?php echo app('translator')->get('petition.Talim tashkiloti'); ?><b class="error"></b></h3>
                                                    <h4><?php if($petition->high_school): ?><?php echo e($petition->high_school->$name_l); ?><?php endif; ?></h4>
                                                </div>
                                                <div class="row_info">
                                                    <h3><?php echo app('translator')->get('petition.Faculty'); ?><b class="error"></b></h3>
                                                    <h4><?php echo e($petition->getFaculty()->$name_l); ?></h4>
                                                </div>
                                                <div class="row_info">
                                                    <h3><?php echo app('translator')->get('petition.Type of Education'); ?><b class="error"></b></h3>
                                                    <h4> <?php echo e($petition->getEdutype()->$name_l); ?></h4>
                                                </div>
                                                <div class="row_info">
                                                    <h3><?php echo app('translator')->get('petition.Language of further education'); ?><b
                                                            class="error"></b>
                                                    </h3>
                                                    <h4><?php echo e($petition->getLanguagetype()->$name_l); ?></h4>
                                                </div>


                                            </div>
                                            <div style="width: 100%">
                                                <div class="row_info">
                                                    <h4><?php echo app('translator')->get('petition.Tavsiyanoma'); ?> <b class="error"></b></h4>
                                                </div>
                                                <div class="row_info_img img mr-md-3" style="width: 90%;">
                                                    <?php if(mime_content_type(public_path().'/users/documents/recommendation_images/'.$petition->image_recommendation) == 'application/pdf'): ?>
                                                        <iframe id="iframePdf"
                                                                style="display: block; width: 100%; height: auto"
                                                                src="<?php echo e(asset('users/documents/recommendation_images')); ?>/<?php echo e($petition->image_recommendation); ?>"
                                                                class="profile-pic6-pdf" src=""></iframe>
                                                        <a href="<?php echo e(asset('users/documents/recommendation_images')); ?>/<?php echo e($petition->image_recommendation); ?>">Yuklab
                                                            olish <i class="fa fa-download"></i></a>
                                                    <?php else: ?>
                                                        <img
                                                            src="<?php echo e(asset('users/documents/recommendation_images')); ?>/<?php echo e($petition->image_recommendation); ?>"
                                                            alt="">
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>


                                    </div>























                                </div>
                            </div>





















































































                        </aside>

                    </div>
                </div>
            </div>


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


        function get_edits(id) {
            var c_id = id;
            var url = '/get-edits/' + c_id;
            $.ajax({
                url: url,
                type: 'GET',
                success: function (result) {
                    var regions = $.parseJSON(result);
                    console.log(regions);
                    $.each(regions, function (key, value) {
                        $('.' + value['column']).css({
                            'display': 'block',
                        });
                        var comment = '\u00A0 | \u00A0' + value['comment'];

                        $('.' + value['column'] + '_error').html(comment);
                    });

                }
            });
        }

        get_edits(<?php echo e($petition->id); ?>);

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.for_user_show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\myProject\OSPanel\domains\qabul_tsul_texnikum\resources\views/user/pages/petition/show.blade.php ENDPATH**/ ?>