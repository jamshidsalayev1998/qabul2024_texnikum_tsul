<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('login/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('login/css/main.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('admin/my_style/my_css.css') }}">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url({{ asset('login/images/bg-01.jpg') }});">
					<span class="login100-form-title-1">
						@lang('login.YEOJU TECHNICAL INSTITUTE IN TASHKENT')
					</span>
				</div>


				<div class="row mt-5 mb-5">
					<div class="col-md-12 pr-5">
						<div class="col-md-4 float-right">
							<a class="nav-link" data-toggle="dropdown" href="#">
			          	@lang('login.Language')
			            <i class="fa fa-language" ></i>
			          </a>
			          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
			                                <a  rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item dropdown-footer">{{ $properties['native'] }}</a>
			                <div class="dropdown-divider"></div>
			            
			            @endforeach
			            
			          </div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-8 ml-auto mr-auto mt-3 mb-3">
							<h5>
								@if(App::getLocale() == 'uz')
								Parol {{ Auth::user()->email }} raqamiga jo`natildi
								@endif
								@if(App::getLocale() == 'en')
								Password send to  {{ Auth::user()->email }} 
								@endif
								@if(App::getLocale() == 'ru')
								Пароль отправить на  {{ Auth::user()->email }} 
								@endif
								
							</h5>
						</div>
						<div class="col-md-8 ml-auto mr-auto">
							<form method="POST" action="{{ route('check_phone_code') }}">
								@csrf
								<div class="form-group">
									<label>@lang('login.Password') @error('email')<span class="error">!{{ $message }}</span>@enderror @if(session('error_code')) <span class="error">!{{ session('error_code') }}</span> @endif </label>  
									<input  value="{{ old('code') }}" autocomplete="code"  type="text" name="code" class="phn form-control"   >
								</div>
								
								<div class="form-group ">
									{{-- <a href="{{ route('login') }}" class="text-right w-100 border p-2" style="border-radius: 15px;">@lang('login.Sign in')</a> --}}
									 <a  class="text-right w-100 border p-2" style="border-radius: 15px; cursor: pointer;"  id="logout" >@lang('login.Logout')</a>
			          						
									<button class="btn btn-success float-right">
										@lang('login.Login')
									</button>
								</div>
							</form>
							<form id="lg_form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                                        @csrf
			                                    </form>
						</div>
					</div>
				</div>






				
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('login/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login/js/main.js') }}"></script>

	<script type="text/javascript">
		$('#logout').click(function(){
			$('#lg_form').submit();
		});
	</script>

</body>
</html>