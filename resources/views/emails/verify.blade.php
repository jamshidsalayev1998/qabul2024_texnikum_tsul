<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<a href="{{ route('email.check' , ['code' => $details['code']]) }}">@lang('email_check.Click here for activate account')</a>
<h3>Code: {{ $details['code'] }}</h3>




</body>
</html>