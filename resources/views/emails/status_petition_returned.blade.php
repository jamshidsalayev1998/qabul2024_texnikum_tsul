<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{ asset('login/vendor/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				Hurmatli {{ $details['last_name'] }} {{ $details['first_name'] }} {{ $details['middle_name'] }} sizning YOEJU universitetiga online arziangiz qabul qilinmadi arizalar to`liq emas yoki xatoliklar bor sabablar izohlarda yozilgan 
			</div>
			<div class="col-md-12">
				<h6>Izohlar</h6><br>
				<p>
					{{ $details['msg'] }}
				</p>
			</div>
			<div class="col-md-12 text-center">


				
				<a href="{{ route('petition.show' , ['id' => $details['id']]) }}">Ariza holatini ko`rish uchun buyerga bosing </a>
				
			</div>
		</div>
	</div>

</body>
</html>