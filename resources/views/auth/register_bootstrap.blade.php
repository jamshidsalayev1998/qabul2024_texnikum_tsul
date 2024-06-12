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
						<div class="col-md-8 ml-auto mr-auto">
							<form method="POST" action="{{ route('register') }}">
								@csrf
								<div class="form-group">
									<label>@lang('login.Telefon raqam') @error('email')<span class="error">!{{ $message }}</span>@enderror </label>  
									<input type="text" class="phn form-control" name="email" value="{{ old('email') }}" placeholder="+998_________">
								</div>
								<!-- <div class="form-group">
									<label>@lang('login.Password') @error('password')<span class="error">!{{ $message }}</span>@enderror</label>
									<input  class="form-control @error('password') is-invalid @enderror" autocomplete="current-password" type="password" name="password" >
								</div> -->
								<div class="form-group ">
									<a href="{{ route('login') }}" class="text-right w-100 border p-2" style="border-radius: 15px;">@lang('login.Sign in')</a>
									<button class="btn btn-success float-right">
										@lang('login.Sign up')
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>


				<!-- <div class="w-100 text-right pr-4 pl-4 pt-2">
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

				<form class="login100-form validate-form"  method="POST" action="{{ route('register') }}">
					@csrf
					<div class="wrap-input100 validate-input m-b-26" >
						<span class="label-input100">Telefon raqam</span>
						<input style="margin-top: 20px;" class="phn inpt" value="{{ old('email') }}" type="text" name="email" placeholder="+998123456789">
						<span class="focus-input100"></span>
						@error('email')<span class="error">{{ $message }}</span>@enderror

					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">@lang('login.Password')</span>
						<input class="input100 inpt  @error('password') is-invalid @enderror" autocomplete="new-password" type="password" name="password" placeholder="">
						<span class="focus-input100"></span>
						@error('password')<span class="error">{{ $message }}</span>@enderror
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">@lang('login.Confirm password')</span>
						<input class="input100 inpt" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="">
						<span class="focus-input100"></span>
						
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<span style="color: #666666; font-size: 13px;">@lang('login.Already have an account?') </span>
							<a href="{{ route('login') }}" class="text-right w-100 border p-2" style="border-radius: 15px;">@lang('login.Sign in')</a>
						</div>

						
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							@lang('login.Sign up')
						</button>
					</div>

				</form> -->
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
	<script src="{{ asset('admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>



	<script type="text/javascript">
		$('.phn').inputmask(
			"+\\9\\98999999999"
		);
	</script>

</body>
</html>