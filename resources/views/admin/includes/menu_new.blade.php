
@if(Auth::user()->role == 0)
	<li>
		<a href="{{ route('petition.create') }}"><img src="{{ asset('newdesign/img/list.png') }}" alt="">@lang('menu.Registration')</a>
	</li>
	<li>
		<a href="{{ route('petition.status') }}"><img src="{{ asset('newdesign/img/soroq.png') }}" alt="">@lang('menu.Application status')</a>
	</li>
@endif