@extends('admin.layouts.login_layout')
@section('content')
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
                        <div style="display: flex; justify-content: flex-end; padding: 5px; color: #39B8D3">
                          <i  class="fa fa-question-circle" aria-hidden="true"></i>
                        </div>
                        <div class="logo">
                            <img style="max-width: 130px; height: auto" src="{{ asset('newadmin/img/tsul_logo.png') }}" alt="">
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
                            	<form class="form_login" method="POST" action="{{ route('register') }}">
									@csrf
	                                <div class="item_form">
	                                    <h3>@lang('login.Telefon raqam')</h3>
	                                    <input name="email" class="phn" value="{{ old('email') }}" placeholder="+998_________" type="text">
                                        @error('email')<span class="error">!{{ $message }} @if(session('error')) {{ session('error') }} @endif </span>@enderror
	                                </div>

	                            </form>
                                 <button class="login">@lang('login.Sign up')</button>
                                <button class="sign">@lang('login.Sign in')</button>
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

@endsection

@section('js')
<script type="text/javascript">
    	$('.login').click(function(){
    		$('.form_login').submit();
    	});
    	$('.sign').click(function(){
    		window.location.href = ' {{ route('login') }} ';
    	});
    </script>
@endsection
