@extends('admin.layouts.master_admin')
@section('style')
@endsection
@section('content')
    @php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp
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
        <div class="test_done"></div>

        <div class="padd">
            <div class="w-100 p-2 text-center "
                 style="color: white; border-radius: 7px; background-color: @if($petition->status == 0) #FFDD00 @elseif($petition->status == 1) #FF5A4B @elseif($petition->status == 2) #74FF41 @endif">
                @lang('petition.Status'): {{ $petition->getStatus() }}
            </div>
            <form class="form_check" method="post" action="{{ route('admin.return') }}">
                @csrf
                <input hidden type="text" name="petition_id" value="{{ $petition->id }}">
                <div class="personal_info">

                    <div class="tab_all tab_index">
                        <ul>
                            <li class="one act_li f_tab"><img src="{{ asset('newadmin/img/tab1.png') }}" alt=""></li>
                            <li class="one f_tab"><img src="{{ asset('newadmin/img/tab2.png') }}" alt=""></li>
                            <li class="three f_pdf"><img src="{{ asset('newadmin/img/tab3.png') }}" alt=""></li>
{{--                            @if($petition->zip_file && !Auth::user()->role == 4)--}}
                            <li class="three file_d"><a href="{{asset($petition->zip_file)}}"><i class="fa fa-download"></i></a></li>
{{--                            @endif--}}
                            @if(Auth::user()->role == 3)
                                <li url="{{ route('superadmin.petition.delete' , ['id' => $petition->id]) }}"
                                    class="three f_delet" style="background-color: #FF5F5F; color: white;"><i
                                            class="fa fa-trash"></i></li>
                            @endif
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
                                                <h3>@lang('petition.First name') </h3>
                                                <h4>{{ $petition->first_name }} <i style="color: #FF5F5F;"
                                                                                   class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[first_name]" id="" cols="30" rows="10"
                                                          class="input_hid"> @if(isset($com_mes['first_name'])) {{ $com_mes['first_name'] }} @endif </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.Last name') </h3>
                                                <h4>{{ $petition->last_name }} <i style="color: #FF5F5F;"
                                                                                  class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[last_name]" id="" cols="30" rows="10"
                                                          class="input_hid"> @if(isset($com_mes['last_name'])) {{ $com_mes['last_name'] }} @endif </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.Father`s name')</h3>
                                                <h4> {{ $petition->middle_name }} <i style="color: #FF5F5F;"
                                                                                     class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[middle_name]" id="" cols="30" rows="10"
                                                          class="input_hid"> @if(isset($com_mes['middle_name'])) {{ $com_mes['middle_name'] }} @endif </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.Gender')</h3>
                                                <h4>{{ $petition->getGender() }} <i style="color: #FF5F5F;"
                                                                                    class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[gender]" id="" cols="30" rows="10"
                                                          class="input_hid"> @if(isset($com_mes['gender'])) {{ $com_mes['gender'] }} @endif </textarea>
                                            </div>
                                        </div>
{{--                                        <div class="col-md-4 bor_right">--}}
{{--                                            <div class="row_info">--}}
{{--                                                <h3>@lang('petition.Country')</h3>--}}
{{--                                                <h4>{{ $petition->getCountry()->$name_l }} <i style="color: #FF5F5F;"--}}
{{--                                                                                              class="fa fa-exclamation-circle"></i>--}}
{{--                                                </h4>--}}
{{--                                                <textarea name="edit[country_id]" id="" cols="30" rows="10"--}}
{{--                                                          class="input_hid"> @if(isset($com_mes['country_id'])) {{ $com_mes['country_id'] }} @endif </textarea>--}}
{{--                                            </div>--}}
{{--                                            <div class="row_info">--}}
{{--                                                <h3>@lang('petition.Region Of Permanent Residence')</h3>--}}
{{--                                                <h4>{{ $petition->getRegion()->$name_l }} <i style="color: #FF5F5F;"--}}
{{--                                                                                             class="fa fa-exclamation-circle"></i>--}}
{{--                                                </h4>--}}
{{--                                                <textarea name="edit[region_id]" id="" cols="30" rows="10"--}}
{{--                                                          class="input_hid"> @if(isset($com_mes['region_id'])) {{ $com_mes['region_id'] }} @endif </textarea>--}}
{{--                                            </div>--}}
{{--                                            <div class="row_info">--}}
{{--                                                <h3>@lang('petition.City Of Permanent Residence')</h3>--}}
{{--                                                <h4>{{ $petition->getArea()->$name_l }} <i style="color: #FF5F5F;"--}}
{{--                                                                                           class="fa fa-exclamation-circle"></i>--}}
{{--                                                </h4>--}}
{{--                                                <textarea name="edit[area_id]" id="" cols="30" rows="10"--}}
{{--                                                          class="input_hid"> @if(isset($com_mes['area_id'])) {{ $com_mes['area_id'] }} @endif </textarea>--}}
{{--                                            </div>--}}
{{--                                            <div class="row_info">--}}
{{--                                                <h3>@lang('petition.Address')</h3>--}}
{{--                                                <h4>{{ $petition->address }} <i style="color: #FF5F5F;"--}}
{{--                                                                                class="fa fa-exclamation-circle"></i>--}}
{{--                                                </h4>--}}
{{--                                                <textarea name="edit[address]" id="" cols="30" rows="10"--}}
{{--                                                          class="input_hid"> @if(isset($com_mes['address'])) {{ $com_mes['address'] }} @endif </textarea>--}}
{{--                                            </div>--}}


{{--                                        </div>--}}
                                        <div class="col-md-5">
                                            <div class="info_img">
                                                <div class="row_info_img">
                                                    <div class="row_info">
                                                        <h3>@lang('petition.Citizenship')</h3>
                                                        <h4>{{ $petition->citizenship }} <i style="color: #FF5F5F;"
                                                                                            class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[citizenship]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['citizenship'])) {{ $com_mes['citizenship'] }} @endif </textarea>
                                                    </div>
                                                    <div class="row_info">
                                                        <h3>@lang('petition.Nationality')</h3>
                                                        <h4> {{ $petition->nationality }} <i style="color: #FF5F5F;"
                                                                                             class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[nationality]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['nationality'])) {{ $com_mes['nationality'] }} @endif </textarea>
                                                    </div>
                                                </div>
                                                <div style="width: 50%">
                                                    <div class="row_info">
                                                        <h4>@lang('petition.Image') <i style="color: #FF5F5F;"
                                                                                       class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[image]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['image'])) {{ $com_mes['image'] }} @endif </textarea>
                                                    </div>
                                                    <div class="row_info_img img " style="width: 100%">

                                                        <img src="{{ asset('users/documents/image') }}/{{ $petition->image }}"
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
                                                        <h4>@lang('petition.Passport image') <i style="color: #FF5F5F;"
                                                                                                class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[passport_image]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['passport_image'])) {{ $com_mes['passport_image'] }} @endif </textarea>
                                                    </div>
                                                    <div class="row_info_img img " style="width: 100%">
                                                        @if(mime_content_type(public_path().'/users/documents/passport_images/'.$petition->passport_image) == 'application/pdf')
                                                            <iframe id="iframePdf"
                                                                    style="display: block; width: 100%; height: auto"
                                                                    src="{{ asset('users/documents/passport_images') }}/{{ $petition->passport_image }}"
                                                                    class="profile-pic6-pdf" src=""></iframe>
                                                            <a href="{{ asset('users/documents/passport_images') }}/{{ $petition->passport_image }}">Yuklab
                                                                olish <i class="fa fa-download"></i></a>
                                                        @else
                                                            <img src="{{ asset('users/documents/passport_images') }}/{{ $petition->passport_image }}"
                                                                 alt="">
                                                        @endif


                                                    </div>
                                                </div>

                                                <div class="row_info_img pl-md-3">
                                                    <div class="row_info">
                                                        <h3>@lang('petition.Passport seria and number')</h3>
                                                        <h4>{{ $petition->passport_seria }} <i style="color: #FF5F5F;"
                                                                                               class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[passport_seria]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['passport_seria'])) {{ $com_mes['passport_seria'] }} @endif </textarea>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-3 bor_right">
                                            <div class="row_info">
                                                <h3>@lang('petition.Home phone number')</h3>
                                                <h4> {{ $petition->home_phone }} <i style="color: #FF5F5F;"
                                                                                    class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[home_phone]" id="" cols="30" rows="10"
                                                          class="input_hid"> @if(isset($com_mes['home_phone'])) {{ $com_mes['home_phone'] }} @endif </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.Mobile phone number')</h3>
                                                <h4>{{ $petition->mobile_phone }} <i style="color: #FF5F5F;"
                                                                                     class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[mobile_phone]" id="" cols="30" rows="10"
                                                          class="input_hid"> @if(isset($com_mes['mobile_phone'])) {{ $com_mes['mobile_phone'] }} @endif </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.Father`s phone number')</h3>
                                                <h4>{{ $petition->father_phone }} <i style="color: #FF5F5F;"
                                                                                     class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[father_phone]" id="" cols="30" rows="10"
                                                          class="input_hid"> @if(isset($com_mes['father_phone'])) {{ $com_mes['father_phone'] }} @endif </textarea>

                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.Mother`s phone number')</h3>
                                                <h4>{{ $petition->mother_phone }} <i style="color: #FF5F5F;"
                                                                                     class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[mother_phone]" id="" cols="30" rows="10"
                                                          class="input_hid"> @if(isset($com_mes['mother_phone'])) {{ $com_mes['mother_phone'] }} @endif </textarea>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="row_info">
                                                <h3>@lang('petition.Disability status')</h3>
                                                <h4>{{ $petition->getDisability()->$name_l }} <i style="color: #FF5F5F;"
                                                                                                 class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[disability_status_id]" id="" cols="30" rows="10"
                                                          class="input_hid"> @if(isset($com_mes['disability_status_id'])) {{ $com_mes['disability_status_id'] }} @endif </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.Disability description')</h3>
                                                <textarea name="" id="" disabled cols="29" rows="10">
                                                    	{{ $petition->disability_description }}
                                                    </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </aside>


                            <aside>
                                <div class="info_item">
                                    <div class="top">
                                        <h1>@lang('other.EDUCATION INFORMATION')</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 bor_right">
                                            <div class="row_info">
                                                <h3>@lang('petition.Name of school or number')</h3>
                                                <h4>{{ $petition->school }} <i style="color: #FF5F5F;"
                                                                               class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[school]" id="" cols="30" rows="10"
                                                          class="input_hid"> @if(isset($com_mes['school'])) {{ $com_mes['school'] }} @endif </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.Type school')</h3>
                                                <h4>{{ $petition->getTypeschool()->$name_l }} <i style="color: #FF5F5F;"
                                                                                                 class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[type_school]" id="" cols="30" rows="10"
                                                          class="input_hid"> @if(isset($com_mes['type_school'])) {{ $com_mes['type_school'] }} @endif </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.Graduation date')</h3>
                                                <h4>{{ $petition->graduation_date }} <i style="color: #FF5F5F;"
                                                                                        class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[graduation_date]" id="" cols="30" rows="10"
                                                          class="input_hid"> @if(isset($com_mes['graduation_date'])) {{ $com_mes['graduation_date'] }} @endif </textarea>
                                            </div>
                                            <div class="row_info">
                                                <h3>@lang('petition.Diploma number')</h3>
                                                <h4>{{ $petition->diplom_number }} <i style="color: #FF5F5F;"
                                                                                      class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[diplom_number]" id="" cols="30" rows="10"
                                                          class="input_hid"> @if(isset($com_mes['diplom_number'])) {{ $com_mes['diplom_number'] }} @endif </textarea>
                                            </div>
                                             <div class="row_info">
                                                <h3>@lang('petition.Imtiyozli diplom')</h3>
                                                <h4>
                                                    @if($petition->privileged_diploma == 1) HA @else YO'q @endif
                                                    <i style="color: #FF5F5F;"
                                                                                      class="fa fa-exclamation-circle"></i>
                                                </h4>
                                                <textarea name="edit[privileged_diploma]" id="" cols="30" rows="10"
                                                          class="input_hid"> @if(isset($com_mes['privileged_diploma'])) {{ $com_mes['privileged_diploma'] }} @endif </textarea>
                                            </div>

                                        </div>


                                        <div class="col-md-8">
                                            <div class="info_img">

                                                <div style="width: 50%">
                                                    <div class="row_info">
                                                        <h4>@lang('petition.Diplom image') <i style="color: #FF5F5F;"
                                                                                              class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[diplom_image]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['diplom_image'])) {{ $com_mes['diplom_image'] }} @endif </textarea>
                                                    </div>
                                                    <div class="row_info_img img " style="width: 100%">
                                                        @if(mime_content_type(public_path().'/users/documents/diplom_images/'.$petition->diplom_image) == 'application/pdf')
                                                            <iframe id="iframePdf"
                                                                    style="display: block; width: 100%; height: auto"
                                                                    src="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image }}"
                                                                    class="profile-pic6-pdf" src=""></iframe>
                                                            <a href="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image }}">Yuklab
                                                                olish <i class="fa fa-download"></i></a>
                                                        @else
                                                            <img src="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image }}"
                                                                 alt="">
                                                        @endif


                                                    </div>
                                                </div>
                                                <div style="width: 50%">
                                                    <div class="row_info">
                                                        <h4>@lang('petition.Diplom application image') <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[diplom_image_app]" id="" cols="30"
                                                                  rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['diplom_image_app'])) {{ $com_mes['diplom_image_app'] }} @endif </textarea>
                                                    </div>
                                                    <div class="row_info_img img " style="width: 100%">
                                                        @if(mime_content_type(public_path().'/users/documents/diplom_images/'.$petition->diplom_image_app) == 'application/pdf')
                                                            <iframe id="iframePdf"
                                                                    style="display: block; width: 100%; height: auto"
                                                                    src="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image_app }}"
                                                                    class="profile-pic6-pdf" src=""></iframe>
                                                            <a href="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image_app }}">Yuklab
                                                                olish <i class="fa fa-download"></i></a>
                                                        @else
                                                            <img src="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image_app }}"
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
                                        <div class="col-md-6 bor_right">
                                            <div class="info_img ">
                                                <div style="width: 50%">
                                                    <div class="row_info">
                                                        <h4>@lang('petition.English image') <i style="color: #FF5F5F;"
                                                                                               class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[english_image]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['english_image'])) {{ $com_mes['english_image'] }} @endif </textarea>
                                                    </div>
                                                    <div class="row_info_img img " style="width: 100%">
                                                        @if(mime_content_type(public_path().'/users/documents/english_images/'.$petition->english_image) == 'application/pdf')
                                                            <iframe id="iframePdf"
                                                                    style="display: block; width: 100%; height: auto"
                                                                    src="{{ asset('users/documents/english_images') }}/{{ $petition->english_image }}"
                                                                    class="profile-pic6-pdf" src=""></iframe>
                                                            <a href="{{ asset('users/documents/english_images') }}/{{ $petition->english_image }}">Yuklab
                                                                olish <i class="fa fa-download"></i></a>
                                                        @else
                                                            <img src="{{ asset('users/documents/english_images') }}/{{ $petition->english_image }}"
                                                                 alt="">
                                                        @endif


                                                    </div>
                                                </div>

                                                <div class="row_info_img pl-md-3">
                                                    <div class="row_info">
                                                        <h3>@lang('petition.English degree')</h3>
                                                        <h4>{{ $petition->getEndegree()->$name_l?$petition->getEndegree()->$name_l:'---------' }} <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4>
                                                        <textarea name="edit[english_degree]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['english_degree'])) {{ $com_mes['english_degree'] }} @endif </textarea>
                                                    </div>
                                                    <div class="row_info">
                                                        <h3>@lang('petition.Overall band score')</h3>
                                                        <h4>{{ $petition->overall_score_english?$petition->overall_score_english:'---------' }} <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4>
                                                        <textarea name="edit[overall_score_english]" id="" cols="30"
                                                                  rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['overall_score_english'])) {{ $com_mes['overall_score_english'] }} @endif </textarea>
                                                    </div>
                                                    <div class="row_info">
                                                        <h3>@lang('petition.IELTS Test Report Form Number (only if IELTS)')</h3>
                                                        <h4>{{ $petition->ilts_number?$petition->ilts_number:'---------' }} <i style="color: #FF5F5F;"
                                                                                            class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[ilts_number]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['ilts_number'])) {{ $com_mes['ilts_number'] }} @endif </textarea>
                                                    </div>
                                                     <div class="row_info">
                                                        <h3>@lang('petition.olympics')</h3>
                                                        <h4>{{$petition->olympics?$petition->olympics:'---------'}} <i style="color: #FF5F5F;"
                                                                                            class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                         <textarea name="edit[olympics]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['olympics'])) {{ $com_mes['olympics'] }} @endif </textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info_img">
                                                <div class="row_info_img">
                                                    <div class="row_info">
                                                        <h3>@lang('petition.Talim tashkiloti')</h3>
                                                        <h4>@if($petition->high_school){{ $petition->high_school->$name_l  }}@endif
                                                            <i style="color: #FF5F5F;"
                                                               class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[high_school_id]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['high_school_id'])) {{ $com_mes['high_school_id'] }} @endif </textarea>
                                                    </div>
                                                    <div class="row_info">
                                                        <h3>@lang('petition.Faculty')</h3>
                                                        <h4>{{ $petition->getFaculty()->$name_l?$petition->getFaculty()->$name_l:'---------'  }} <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[faculty_id]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['faculty_id'])) {{ $com_mes['faculty_id'] }} @endif </textarea>
                                                    </div>
                                                    <div class="row_info">
                                                        <h3>@lang('petition.Type of Education')</h3>
                                                        <h4> {{ $petition->getEdutype()->$name_l  }} <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[type_education_id]" id="" cols="30"
                                                                  rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['type_education_id'])) {{ $com_mes['type_education_id'] }} @endif </textarea>
                                                    </div>
                                                    <div class="row_info">
                                                        <h3>@lang('petition.Language of further education')</h3>
                                                        <h4>{{ $petition->getLanguagetype()->$name_l }} <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4>
                                                        <textarea name="edit[type_language_id]" id="" cols="30"
                                                                  rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['type_language_id'])) {{ $com_mes['type_language_id'] }} @endif </textarea>
                                                    </div>
                                                    <div class="row_info">
                                                        <h3>Suhbat tili</h3>
                                                        <h4>{{$petition->conversation_language == '1' ? 'O`zbek':'Rus'}} <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4>
                                                        <textarea name="edit[conversation_language]" id="" cols="30"
                                                                  rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['conversation_language'])) {{ $com_mes['conversation_language'] }} @endif </textarea>
                                                    </div>

                                                </div>
                                                <div style="width: 50%">
                                                    <div class="row_info">
                                                        <h4>@lang('petition.Tavsiyanoma') <i style="color: #FF5F5F;"
                                                                                             class="fa fa-exclamation-circle"></i>
                                                        </h4>
                                                        <textarea name="edit[recommendation]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['recommendation'])) {{ $com_mes['recommendation'] }} @endif </textarea>
                                                    </div>
                                                    <div class="row_info_img img " style="width: 100%">
                                                        @if(mime_content_type(public_path().'/users/documents/recommendation_images/'.$petition->image_recommendation) == 'application/pdf')
                                                            <iframe id="iframePdf"
                                                                    style="display: block; width: 100%; height: auto"
                                                                    src="{{ asset('users/documents/recommendation_images') }}/{{ $petition->image_recommendation }}"
                                                                    class="profile-pic6-pdf" src=""></iframe>
                                                            <a href="{{ asset('users/documents/recommendation_images') }}/{{ $petition->image_recommendation }}">Yuklab
                                                                olish <i class="fa fa-download"></i></a>
                                                        @else
                                                            <img src="{{ asset('users/documents/recommendation_images') }}/{{ $petition->image_recommendation }}"
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
                                        <div class="col-md-6 bor_right">
{{--                                            <div class="info_img ">--}}
{{--                                                <div style="width: 50%">--}}
{{--                                                    <div class="row_info">--}}
{{--                                                        <h4>@lang('petition.Mehnat daftarchasi') <i style="color: #FF5F5F;"--}}
{{--                                                                                               class="fa fa-exclamation-circle"></i>--}}
{{--                                                        </h4>--}}
{{--                                                        <textarea name="edit[workbook]" id="" cols="30" rows="10"--}}
{{--                                                                  class="input_hid"> @if(isset($com_mes['workbook'])) {{ $com_mes['workbook'] }} @endif </textarea>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row_info_img img " style="width: 100%">--}}
{{--                                                        @if(mime_content_type(public_path().'/users/documents/workbook/'.$petition->workbook) == 'application/pdf')--}}
{{--                                                            <iframe id="iframePdf"--}}
{{--                                                                    style="display: block; width: 100%; height: auto"--}}
{{--                                                                    src="{{ asset('users/documents/workbook') }}/{{ $petition->workbook }}"--}}
{{--                                                                    class="profile-pic6-pdf" src=""></iframe>--}}
{{--                                                            <a href="{{ asset('users/documents/workbook') }}/{{ $petition->workbook }}">Yuklab--}}
{{--                                                                olish <i class="fa fa-download"></i></a>--}}
{{--                                                        @else--}}
{{--                                                            <img src="{{ asset('users/documents/workbook') }}/{{ $petition->workbook }}"--}}
{{--                                                                 alt="">--}}
{{--                                                        @endif--}}


{{--                                                    </div>--}}
{{--                                                </div>--}}

                                                <div class="row_info_img pl-md-3">
                                                    <div class="row_info " style="display: flex">
{{--                                                        <h3>@lang('petition.Passport tarjima')</h3>--}}
                                                        <h4>@lang('petition.Passport tarjima')  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="{{asset('/users/documents/passport_images')}}/{{$petition->passport_copy_translate}}"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[passport_copy_translate]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['passport_copy_translate'])) {{ $com_mes['passport_copy_translate'] }} @endif </textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="row_info " style="display: flex">
{{--                                                        <h3>@lang('petition.Passport tarjima')</h3>--}}
                                                        <h4>@lang('petition.Tugilganlik haqida guvohnoma')  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="{{asset('/users/documents/passport_images')}}/{{$petition->birth_certificate_copy}}"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[birth_certificate_copy]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['birth_certificate_copy'])) {{ $com_mes['birth_certificate_copy'] }} @endif </textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="row_info " style="display: flex">
{{--                                                        <h3>@lang('petition.Passport tarjima')</h3>--}}
                                                        <h4>@lang('petition.Tugilganlik haqida guvohnoma tarjimasi')  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="{{asset('/users/documents/passport_images')}}/{{$petition->birth_certificate_copy_translate}}"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[birth_certificate_copy_translate]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['birth_certificate_copy_translate'])) {{ $com_mes['birth_certificate_copy_translate'] }} @endif </textarea>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="info_img">
                                                <div class="row_info_img">
                                                    <div class="row_info " style="display: flex">
                                                        <h4>@lang('petition.Talim haqida hujjat tarjima')  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="{{asset('/users/documents/diplom_images')}}/{{$petition->edu_document_copy_translate}}"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[edu_document_copy_translate]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['edu_document_copy_translate'])) {{ $com_mes['edu_document_copy_translate'] }} @endif </textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="row_info " style="display: flex">
                                                        <h4>@lang('petition.086 tibbiyot malumotnomasi')  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="{{asset('/users/documents/med_forms')}}/{{$petition->med_form_copy_086}}"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[med_form_copy_086]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['med_form_copy_086'])) {{ $com_mes['med_form_copy_086'] }} @endif </textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="row_info " style="display: flex">
                                                        <h4>@lang('petition.086 tibbiyot malumotnomasi tarjima')  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="{{asset('/users/documents/med_forms')}}/{{$petition->med_form_copy_086_translate}}"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[med_form_copy_086_translate]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['med_form_copy_086_translate'])) {{ $com_mes['med_form_copy_086_translate'] }} @endif </textarea>
                                                    </div>
                                                    <hr>


                                                </div>
                                                <div style="width: 50%; border-left: 1px solid #ABABAB">
                                                    <div class="row_info " style="display: flex">
                                                        <h4>@lang('petition.OIV infektsiyasi yo`qligi to`g`risidagi guvohnoma')  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="{{asset('/users/documents/med_forms')}}/{{$petition->vich_copy}}"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[vich_copy]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['vich_copy'])) {{ $com_mes['vich_copy'] }} @endif </textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="row_info " style="display: flex">
                                                        <h4>@lang('petition.OIV infektsiyasi yo`qligi to`g`risidagi guvohnoma tarjima')  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="{{asset('/users/documents/med_forms')}}/{{$petition->vich_copy_translate}}"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[vich_copy_translate]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['vich_copy_translate'])) {{ $com_mes['vich_copy_translate'] }} @endif </textarea>
                                                    </div>
                                                    <hr>

                                                    <div class="row_info " style="display: flex">
                                                        <h4>@lang('petition.063 tibbiyot malumotnomasi')  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="{{asset('/users/documents/med_forms')}}/{{$petition->med_form_copy_063}}"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[med_form_copy_063]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['med_form_copy_063'])) {{ $com_mes['med_form_copy_063'] }} @endif </textarea>
                                                    </div>
                                                    <hr>
                                                    <div class="row_info " style="display: flex">
                                                        <h4>@lang('petition.063 tibbiyot malumotnomasi tarjima')  <i
                                                                    style="color: #FF5F5F;"
                                                                    class="fa fa-exclamation-circle"></i></h4> &nbsp;&nbsp; <a href="{{asset('/users/documents/med_forms')}}/{{$petition->med_form_copy_063_translate}}"> <i class="fa fa-download"></i> </a>
                                                        <textarea name="edit[med_form_copy_063_translate]" id="" cols="30" rows="10"
                                                                  class="input_hid"> @if(isset($com_mes['med_form_copy_063_translate'])) {{ $com_mes['med_form_copy_063_translate'] }} @endif </textarea>
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
                @if($petition->yangi == 1)
                    <div style="background-color: white; color: red; width: 100%; padding: 7px; border-radius: 7px;">
                        {{ $petition->comment }}
                    </div>

                @endif

            </div>
            @if(Auth::user()->role >= 2 )
                <div class="send_bottom">
                    <button class="reject">REJECT</button>
                    <button href="{{ route('admin.accept' , ['id' => $petition->id]) }}" class="accept">ACCEPT</button>
                </div>
            @endif


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
        @if(Auth::user()->role == 1)
        $('.row_info textarea').attr('disabled', '');
        @endif
        $('.f_pdf').click(function () {
            window.location.href = '/application-pdf/' +{{ $petition->id }};
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
            var tt = confirm("@lang('other.Delete ?')");
            if (tt) {
                window.location.href = $(this).attr('url');
            }
        });
    </script>
@endsection
