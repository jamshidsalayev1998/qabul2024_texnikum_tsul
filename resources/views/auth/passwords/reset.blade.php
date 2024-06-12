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
<link rel="stylesheet" type="text/css" href="{{ asset('admin/my_style/my_css.css') }}">

<!--===============================================================================================-->
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
				<div class="w-100 text-right pr-4 pl-4 pt-2">
					<div class="float-right w-25">
						<li class="nav-item dropdown">
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
			        </li>
					</div>
					
			    </div>
				<form class="login100-form validate-form"  method="POST" action="{{ route('password.update') }}">
					@csrf
					<input type="hidden" name="token" value="{{ $token }}">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100 @error('email') is-invalid @enderror">Email</span>
						<input class="input100" value="{{ old('email') }}"  type="text" name="email" required autocomplete="email"  placeholder="">
						<span class="focus-input100"></span>
						@error('email')<span class="error">{{ $message }}</span>@enderror
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100  @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" placeholder="">
						<span class="focus-input100"></span>
						@error('password')<span class="error">{{ $message }}</span>@enderror
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Confirm password</span>
						<input class="input100" required autocomplete="new-password" type="password" name="password_confirmation" placeholder="">
						<span class="focus-input100"></span>
					</div>

					

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							@lang('login.Reset Password')
						</button>
					</div>

				</form>
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

</body>
</html>