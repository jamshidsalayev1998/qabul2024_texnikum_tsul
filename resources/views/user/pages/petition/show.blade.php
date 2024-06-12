@extends('admin.layouts.for_user_show')
@section('style')
@endsection
@section('content')
    @php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp
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

        @keyframes zoom {
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
        @media only screen and (max-width: 700px) {
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
                     style="border-radius: 5px; background-color: @if($petition->status == 0) #FFDD00 @elseif($petition->status == 1) #FF5A4B @elseif($petition->status == 2) #74FF41 @endif">
                    @lang('petition.Status'): {{ $petition->getStatus() }}
                </div>
                @php
                    $faculty = 'App\Faculty'::find($petition->faculty_id);
                @endphp
                @if($petition->status == 1 && $faculty->status == 1)
                    <a href="{{ route('petition.edit' , ['id' => $petition->id]) }}"
                       class="jm_media col-md-2 p-1 text-center ml-2"
                       style="color:white; border-radius: 5px; background-color: #4997CF">
                        <i class="fa fa-edit"></i> @lang('petition.Edit')
                    </a>
                @endif
                <a href="{{ route('petition.pdf' , ['id' => $petition->id]) }}"
                   class="jm_media col-md-2 p-1 text-center ml-2"
                   style="border-radius: 5px; background-color: #4997CF; color: white !important">
                    <img src="{{ asset('newadmin/img/tab3.png') }}" alt=""> @lang('petition.Print')
                </a>
                @if($petition->yangi == 1)
                    <div class="jm_media col-md-2 p-1 text-center"
                         style="border-radius: 5px; background-color: white; color: red;">
                        {{ $petition->comment }}
                    </div>
                @endif
            </div>
            <div class="personal_info">

                <div class="tab_all tab_index" style="border-top: none !important">
                    <ul style="width: 50px; border: none !important;">
                        <li style="display: none;" class="one act_li"><img src="{{ asset('newadmin/img/tab1.png') }}"
                                                                           alt=""></li>
                        <li style="display: none;" class="one"><img src="{{ asset('newadmin/img/tab2.png') }}" alt="">
                        </li>
                        <li style="display: none;" class="three"><img src="{{ asset('newadmin/img/tab3.png') }}" alt="">
                        </li>
                    </ul>
                    <div class="tab_content">
                        <aside class="active">

                            <div class="info_item">

                                <div class="top">
                                    <h1>@lang('other.PERSONAL INFO')</h1>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 bor_right">
                                        <div class="row_info">
                                            <h3>@lang('petition.First name') <b class="error first_name_error"></b></h3>
                                            <h4>{{ $petition->first_name }} </h4>
                                        </div>
                                        <div class="row_info">
                                            <h3>@lang('petition.Last name')<b class="error last_name_error"></b></h3>
                                            <h4>{{ $petition->last_name }}</h4>
                                        </div>
                                        <div class="row_info">
                                            <h3>@lang('petition.Father`s name')<b class="error middle_name_error"></b>
                                            </h3>
                                            <h4> {{ $petition->middle_name }}</h4>
                                        </div>
                                        <div class="row_info">
                                            <h3>@lang('petition.Gender')<b class="error gender_error"></b></h3>
                                            <h4>{{ $petition->getGender() }}</h4>
                                        </div>
                                    </div>
{{--                                    <div class="col-md-4 bor_right">--}}
{{--                                        <div class="row_info">--}}
{{--                                            <h3>@lang('petition.Country')<b class="error country_id_error"></b></h3>--}}
{{--                                            <h4>{{ $petition->getCountry()->$name_l }}</h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="row_info">--}}
{{--                                            <h3>@lang('petition.Region Of Permanent Residence')<b--}}
{{--                                                    class="error region_id_error"></b></h3>--}}
{{--                                            <h4>{{ $petition->getRegion()->$name_l }}</h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="row_info">--}}
{{--                                            <h3>@lang('petition.City Of Permanent Residence')<b--}}
{{--                                                    class="error area_id_error"></b></h3>--}}
{{--                                            <h4>{{ $petition->getArea()->$name_l }}</h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="row_info">--}}
{{--                                            <h3>@lang('petition.Address')<b class="error address_error"></b></h3>--}}
{{--                                            <h4>{{ $petition->address }}</h4>--}}
{{--                                        </div>--}}


{{--                                    </div>--}}
{{--                                    <div class="col-md-5">--}}
{{--                                        <div class="info_img">--}}
{{--                                            <div class="row_info_img">--}}
{{--                                                <div class="row_info">--}}
{{--                                                    <h3>@lang('petition.Citizenship')<b--}}
{{--                                                            class="error citizenship_error"></b></h3>--}}
{{--                                                    <h4>{{ $petition->citizenship }}</h4>--}}
{{--                                                </div>--}}
{{--                                                <div class="row_info">--}}
{{--                                                    <h3>@lang('petition.Nationality')<b--}}
{{--                                                            class="error nationality_error"></b></h3>--}}
{{--                                                    <h4> {{ $petition->nationality }}</h4>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div style="width: 100%">--}}
{{--                                                <div class="row_info">--}}
{{--                                                    <h4>@lang('petition.Image') <b class="error image_error"></b></h4>--}}
{{--                                                </div>--}}
{{--                                                <div class="row_info_img img " style="width: 100%">--}}

{{--                                                    <img--}}
{{--                                                        src="{{ asset('users/documents/image') }}/{{ $petition->image }}"--}}
{{--                                                        alt="">--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>


                                <div class="info_item mt-md-3">
                                    <div class="row">
                                        <div class="col-md-6 bor_right">
                                            <div class="info_img info_img_order">
                                                <div style="width: 100%">
                                                    <div class="row_info">
                                                        <h4>@lang('petition.Passport image') <b
                                                                class="error passport_image_error"></b></h4>
                                                    </div>
                                                    <div class="row_info_img img" style="width: 100%;">
                                                        @if(mime_content_type(public_path().'/users/documents/passport_images/'.$petition->passport_image) == 'application/pdf')
                                                            <iframe id="iframePdf"
                                                                    style="display: block; width: 100%; height: auto"
                                                                    src="{{ asset('users/documents/passport_images') }}/{{ $petition->passport_image }}"
                                                                    class="profile-pic6-pdf" src=""></iframe>
                                                            <a href="{{ asset('users/documents/passport_images') }}/{{ $petition->passport_image }}">Yuklab
                                                                olish <i class="fa fa-download"></i></a>
                                                        @else
                                                            <img
                                                                src="{{ asset('users/documents/passport_images') }}/{{ $petition->passport_image }}"
                                                                alt="">
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="row_info_img pl-md-3">
                                                    <div class="row_info">
                                                        <h3>@lang('petition.Passport seria and number')<b
                                                                class="error passport_seria_error"></b></h3>
                                                        <h4>{{ $petition->passport_seria }}</h4>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row_info">
                                                <h3>@lang('petition.Home phone number')<b
                                                        class="error home_phone_error"></b></h3>
                                                <h4> {{ $petition->home_phone }}</h4>
                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.Mobile phone number')<b
                                                        class="error mobile_phone_error"></b></h3>
                                                <h4>{{ $petition->mobile_phone }}</h4>
                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.Father`s phone number')<b
                                                        class="error father_phone_error"></b></h3>
                                                <h4>{{ $petition->father_phone }}</h4>

                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.Mother`s phone number')<b
                                                        class="error mother_phone_error"></b></h3>
                                                <h4>{{ $petition->mother_phone }}</h4>
                                            </div>

                                        </div>
{{--                                        <div class="col-md-4">--}}
{{--                                            <div class="row_info">--}}
{{--                                                <h3>@lang('petition.Disability status')<b--}}
{{--                                                        class="error disability_status_id_error"></b></h3>--}}
{{--                                                <h4>{{ $petition->getDisability()->$name_l }}</h4>--}}
{{--                                            </div>--}}
{{--                                            <div class="row_info">--}}
{{--                                                <h3>@lang('petition.Disability description')<b--}}
{{--                                                        class="error disability_description_error"></b></h3>--}}
{{--                                                <textarea name="" id="" disabled cols="30" rows="15">--}}
{{--                                                    	{{ $petition->disability_description }}--}}
{{--                                                    </textarea>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
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
                        <li style="display: none;" class="one act_li"><img src="{{ asset('newadmin/img/tab1.png') }}"
                                                                           alt=""></li>
                        <li style="display: none;" class="one"><img src="{{ asset('newadmin/img/tab2.png') }}" alt="">
                        </li>
                        <li style="display: none;" class="three"><img src="{{ asset('newadmin/img/tab3.png') }}" alt="">
                        </li>
                    </ul>
                    <div class="tab_content">


                        <aside class="active">
                            <div class="info_item">
                                <div class="top">
                                    <h1>@lang('other.EDUCATION INFORMATION')</h1>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 bor_right">
                                        <div class="row_info">
                                            <h3>@lang('petition.Name of school or number')<b class="error"></b></h3>
                                            <h4>{{ $petition->school }}</h4>
                                        </div>
                                        <div class="row_info">
                                            <h3>@lang('petition.Type school')<b class="error"></b></h3>
                                            <h4>{{ $petition->getTypeschool()->$name_l }} </h4>
                                        </div>
                                        <div class="row_info">
                                            <h3>@lang('petition.Graduation date')<b class="error"></b></h3>
                                            <h4>{{ $petition->graduation_date }}</h4>
                                        </div>
                                        <div class="row_info">
                                            <h3>@lang('petition.Diploma number')<b class="error"></b></h3>
                                            <h4>{{ $petition->diplom_number }}</h4>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="info_img">

                                            <div style="width: 100%">
                                                <div class="row_info">
                                                    <h4>@lang('petition.Diplom image') <b class="error"></b></h4>
                                                </div>
                                                <div class="row_info_img img mr-md-3" style="width: 90%;">
                                                    @if(mime_content_type(public_path().'/users/documents/diplom_images/'.$petition->diplom_image) == 'application/pdf')
                                                        <iframe id="iframePdf"
                                                                style="display: block; width: 100%; height: auto"
                                                                src="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image }}"
                                                                class="profile-pic6-pdf" src=""></iframe>
                                                        <a href="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image }}">Yuklab
                                                            olish <i class="fa fa-download"></i></a>
                                                    @else
                                                        <img
                                                            src="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image }}"
                                                            alt="">
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="info_img">

                                            <div style="width: 100%">
                                                <div class="row_info">
                                                    <h4>@lang('petition.Diplom application image') <b class="error"></b>
                                                    </h4>
                                                </div>
                                                <div class="row_info_img img mr-md-3" style="width: 90%;">
                                                    @if(mime_content_type(public_path().'/users/documents/diplom_images/'.$petition->diplom_image_app) == 'application/pdf')
                                                        <iframe id="iframePdf"
                                                                style="display: block; width: 100%; height: auto"
                                                                src="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image_app }}"
                                                                class="profile-pic6-pdf" src=""></iframe>
                                                        <a href="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image_app }}">Yuklab
                                                            olish <i class="fa fa-download"></i></a>
                                                    @else
                                                        <img
                                                            src="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image_app }}"
                                                            alt="">
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="info_img ">
                                            <div style="width: 100%">
                                                <div class="row_info">
                                                    <h4>@lang('petition.English image') <b class="error"></b></h4>
                                                </div>
                                                <div class="row_info_img img" style="width: 100%;">
                                                    @if(mime_content_type(public_path().'/users/documents/english_images/'.$petition->english_image) == 'application/pdf')
                                                        <iframe id="iframePdf"
                                                                style="display: block; width: 100%; height: auto"
                                                                src="{{ asset('users/documents/english_images') }}/{{ $petition->english_image }}"
                                                                class="profile-pic6-pdf" src=""></iframe>
                                                        <a href="{{ asset('users/documents/english_images') }}/{{ $petition->english_image }}">Yuklab
                                                            olish <i class="fa fa-download"></i></a>
                                                    @else
                                                        <img
                                                            src="{{ asset('users/documents/english_images') }}/{{ $petition->english_image }}"
                                                            alt="">
                                                    @endif

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
                                                <h3>@lang('petition.English degree')<b class="error"></b></h3>
                                                <h4>{{ $petition->getEndegree()->$name_l }}</h4>
                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.Overall band score')<b class="error"></b></h3>
                                                <h4>{{ $petition->overall_score_english }}</h4>
                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.IELTS Test Report Form Number (only if IELTS)')
                                                    <b class="error"></b></h3>
                                                <h4>{{ $petition->ilts_number }}</h4>
                                            </div>
                                            <div class="row_info">
                                                    <h3>@lang('petition.olympics')<b
                                                            class="error"></b>
                                                    </h3>
                                                    <h4>{{ $petition->olympics }}</h4>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="info_img">
                                            <div class="row_info_img">
                                                <div class="row_info">
                                                    <h3>@lang('petition.Talim tashkiloti')<b class="error"></b></h3>
                                                    <h4>@if($petition->high_school){{ $petition->high_school->$name_l}}@endif</h4>
                                                </div>
                                                <div class="row_info">
                                                    <h3>@lang('petition.Faculty')<b class="error"></b></h3>
                                                    <h4>{{ $petition->getFaculty()->$name_l  }}</h4>
                                                </div>
                                                <div class="row_info">
                                                    <h3>@lang('petition.Type of Education')<b class="error"></b></h3>
                                                    <h4> {{ $petition->getEdutype()->$name_l  }}</h4>
                                                </div>
                                                <div class="row_info">
                                                    <h3>@lang('petition.Language of further education')<b
                                                            class="error"></b>
                                                    </h3>
                                                    <h4>{{ $petition->getLanguagetype()->$name_l }}</h4>
                                                </div>


                                            </div>
                                            <div style="width: 100%">
                                                <div class="row_info">
                                                    <h4>@lang('petition.Tavsiyanoma') <b class="error"></b></h4>
                                                </div>
                                                <div class="row_info_img img mr-md-3" style="width: 90%;">
                                                    @if(mime_content_type(public_path().'/users/documents/recommendation_images/'.$petition->image_recommendation) == 'application/pdf')
                                                        <iframe id="iframePdf"
                                                                style="display: block; width: 100%; height: auto"
                                                                src="{{ asset('users/documents/recommendation_images') }}/{{ $petition->image_recommendation }}"
                                                                class="profile-pic6-pdf" src=""></iframe>
                                                        <a href="{{ asset('users/documents/recommendation_images') }}/{{ $petition->image_recommendation }}">Yuklab
                                                            olish <i class="fa fa-download"></i></a>
                                                    @else
                                                        <img
                                                            src="{{ asset('users/documents/recommendation_images') }}/{{ $petition->image_recommendation }}"
                                                            alt="">
                                                    @endif

                                                </div>
                                            </div>
                                        </div>


                                    </div>
{{--                                    <div class="col-md-3 bor_right">--}}
{{--                                        <div class="info_img" style="display: block">--}}
{{--                                            <div class="row_info">--}}
{{--                                                <h4>@lang('petition.Mehnat daftarchasi') <b class="error"></b></h4>--}}
{{--                                            </div>--}}
{{--                                            <div class="row_info_img img mr-md-3" style="width: 100%;">--}}
{{--                                                @if(mime_content_type(public_path().'/users/documents/workbook/'.$petition->workbook) == 'application/pdf')--}}
{{--                                                    <iframe id="iframePdf"--}}
{{--                                                            style="display: block; width: 100%; height: auto"--}}
{{--                                                            src="{{ asset('users/documents/workbook') }}/{{ $petition->workbook }}"--}}
{{--                                                            class="profile-pic6-pdf" src=""></iframe>--}}
{{--                                                    <a href="{{ asset('users/documents/workbook') }}/{{ $petition->workbook }}">Yuklab--}}
{{--                                                        olish <i class="fa fa-download"></i></a>--}}
{{--                                                @else--}}
{{--                                                    <img--}}
{{--                                                        src="{{ asset('users/documents/workbook') }}/{{ $petition->workbook }}"--}}
{{--                                                        alt="">--}}
{{--                                                @endif--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                </div>
                            </div>
{{--                            <div class="info_item mt-md-3">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-4 bor_right">--}}
{{--                                        <div class="row_info_img pl-md-3">--}}
{{--                                            <div class="row_info" style="display: flex">--}}
{{--                                                <h4>@lang('petition.Passport tarjima')<b class="error"></b></h4> &nbsp;&nbsp;--}}
{{--                                                <a href="{{asset('/users/documents/passport_images')}}/{{$petition->passport_copy_translate}}">--}}
{{--                                                    <i class="fa fa-download"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <hr>--}}
{{--                                            <div class="row_info" style="display: flex">--}}
{{--                                                <h4>@lang('petition.Tugilganlik haqida guvohnoma')<b class="error"></b></h4> &nbsp;&nbsp;--}}
{{--                                                <a href="{{asset('/users/documents/passport_images')}}/{{$petition->birth_certificate_copy}}">--}}
{{--                                                    <i class="fa fa-download"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <hr>--}}
{{--                                            <div class="row_info" style="display: flex">--}}
{{--                                                <h4>@lang('petition.Tugilganlik haqida guvohnoma tarjimasi')<b class="error"></b></h4> &nbsp;&nbsp;--}}
{{--                                                <a href="{{asset('/users/documents/passport_images')}}/{{$petition->birth_certificate_copy_translate}}">--}}
{{--                                                    <i class="fa fa-download"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <hr>--}}
{{--                                             <div class="row_info" style="display: flex">--}}
{{--                                                <h4>@lang('petition.Talim haqida hujjat tarjima')<b class="error"></b></h4> &nbsp;&nbsp;--}}
{{--                                                <a href="{{asset('/users/documents/diplom_images')}}/{{$petition->edu_document_copy_translate}}">--}}
{{--                                                    <i class="fa fa-download"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4 bor_right">--}}
{{--                                        <div class="info_img" style="display: block">--}}
{{--                                             <div class="row_info" style="display: flex">--}}
{{--                                                <h4>@lang('petition.086 tibbiyot malumotnomasi')<b class="error"></b></h4> &nbsp;&nbsp;--}}
{{--                                                <a href="{{asset('/users/documents/med_forms')}}/{{$petition->med_form_copy_086}}">--}}
{{--                                                    <i class="fa fa-download"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <hr>--}}
{{--                                             <div class="row_info" style="display: flex">--}}
{{--                                                <h4>@lang('petition.086 tibbiyot malumotnomasi tarjima')<b class="error"></b></h4> &nbsp;&nbsp;--}}
{{--                                                <a href="{{asset('/users/documents/med_forms')}}/{{$petition->med_form_copy_086_translate}}">--}}
{{--                                                    <i class="fa fa-download"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <hr>--}}
{{--                                            <div class="row_info" style="display: flex">--}}
{{--                                                <h4>@lang('petition.OIV infektsiyasi yo`qligi to`g`risidagi guvohnoma')<b class="error"></b></h4> &nbsp;&nbsp;--}}
{{--                                                <a href="{{asset('/users/documents/med_forms')}}/{{$petition->vich_copy}}">--}}
{{--                                                    <i class="fa fa-download"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <hr>--}}
{{--                                            <div class="row_info" style="display: flex">--}}
{{--                                                <h4>@lang('petition.OIV infektsiyasi yo`qligi to`g`risidagi guvohnoma tarjima')<b class="error"></b></h4> &nbsp;&nbsp;--}}
{{--                                                <a href="{{asset('/users/documents/med_forms')}}/{{$petition->vich_copy_translate}}">--}}
{{--                                                    <i class="fa fa-download"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4 ">--}}
{{--                                        <div class="info_img" style="display: block">--}}
{{--                                             <div class="row_info" style="display: flex">--}}
{{--                                                <h4>@lang('petition.063 tibbiyot malumotnomasi')<b class="error"></b></h4> &nbsp;&nbsp;--}}
{{--                                                <a href="{{asset('/users/documents/med_forms')}}/{{$petition->med_form_copy_063}}">--}}
{{--                                                    <i class="fa fa-download"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <hr>--}}
{{--                                             <div class="row_info" style="display: flex">--}}
{{--                                                <h4>@lang('petition.063 tibbiyot malumotnomasi tarjima')<b class="error"></b></h4> &nbsp;&nbsp;--}}
{{--                                                <a href="{{asset('/users/documents/med_forms')}}/{{$petition->med_form_copy_063_translate}}">--}}
{{--                                                    <i class="fa fa-download"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
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
@endsection
@section('js')
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

        get_edits({{ $petition->id }});

    </script>
@endsection
