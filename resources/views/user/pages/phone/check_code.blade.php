@extends('admin.layouts.login_layout')
@section('content')
  @php

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


   @endphp
    <div class="all_login">

        <div class="login_modal">
             {{-- <div class="top">
                @if(App::getLocale() == 'en')
                <h1> <span class="months"></span> MONTH, <span class="days"></span> DAYS, <span class="hours"></span> HOURS, <span class="minutes"></span> MINUTES, <span class="seconds"></span> SECONDS LEFT UNTIL THE END OF THE ADMISSION</h1>
                @endif
                 @if(App::getLocale() == 'uz')
                <h1>QABUL TUGASHIGA:  <span class="months"></span> OY, <span class="days"></span> KUN, <span class="hours"></span> SOAT,  <span class="minutes"></span> DAQIQA, <span class="seconds"></span> SONIYA QOLDI</h1>
                @endif
                 @if(App::getLocale() == 'ru')
                <h1>ОСТАЛОСЬ ДО КОНЦА ДОПУСКА:  <span class="months"></span> МЕСЯЦ, <span class="days"></span> ДНЕЙ, <span class="hours"></span> ЧАСОВ,  <span class="minutes"></span> МИНУТ, <span class="seconds"></span> СЕКУНД</h1>
                @endif
            </div> --}}
            <div class="bg-white">
                <div class="row ">

                    <div class="col-md-6 mob_img">
                        <div class="img">
                            <img src="{{ asset('newadmin/img/edu_login.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="logo">
                            <img style="max-width: 130px; height: auto" src="{{ asset('newadmin/img/tsul_logo.png') }}" alt="">

                        </div>
                        <div class="logo">
                            @if(App::getLocale() == 'uz')
                                Parol {{ Auth::user()->email }} raqamiga jo`natildi
                                @endif
                                @if(App::getLocale() == 'en')
                                Password send to  {{ Auth::user()->email }}
                                @endif
                                @if(App::getLocale() == 'ru')
                                Пароль отправить на  {{ Auth::user()->email }}
                                @endif
                        </div>

                        <div class="form_out">
                            <div class="form_all">
                                <div class="language">
                                    <div class="lankalla">
                                        <div  class="" id="dd">
                                            <span class="iii">
                                                <i class="fa fa-angle-down"></i>
                                            </span>
                                            <span class="holder">@lang('other.'.App::getLocale()) </span>
                                            <ul class="dropdown">
                                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                    <li>  <a   hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item dropdown-footer">{{ $properties['native'] }}</a></li>
                                                  @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            	<form class="form_login" method="POST" action="{{ route('check_phone_code') }}">
                                @csrf
	                                <div class="item_form">
	                                    <h3>@lang('login.Password')</h3>
	                                    <input value="{{ old('code') }}" autocomplete="code"  type="password" name="code">
                                       <i  class="fa fa-eye eye"></i>
                                        <i class="fa fa-eye-slash eye_slash" aria-hidden="true"></i>
                                        @error('email')<span class="error">!{{ $message }}</span>@enderror
                                        @if(session('error_code')) <span class="error">!{{ session('error_code') }}</span> @endif
	                                </div>

	                            </form>
                                 <button class="login">@lang('login.Login')</button>
                                <button class="sign">@lang('login.Logout')</button>
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
    <form id="lg_form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
@endsection

@section('js')
<script type="text/javascript">
    	$('.login').click(function(){
    		$('.form_login').submit();
    	});
    	$('.sign').click(function(){
    		$('#lg_form').submit();
    	});
    </script>
@endsection
