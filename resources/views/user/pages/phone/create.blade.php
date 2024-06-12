@extends('admin.layouts.master')
@section('content')

<div class="container bg-white mt-2 p-2">
	<div class="row">
		<h3 class="ml-auto mr-auto">@lang('user_phone.Insert your phone number')</h3>
		<div class="col-md-12 mt-3 ">
			<div class="ml-auto mr-auto col-md-5 p-4 border">
				<form>
					<div class="row">
						<div class="col-md-8">
								<input type="text" placeholder="(+998991234567)" name="phone" class="form-control">
						</div>
						<div class="col-md-3">
								<button class="btn btn-success">@lang('user_phone.Send')</button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>

@endsection