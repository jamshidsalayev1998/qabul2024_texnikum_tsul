@extends('admin.layouts.master')
@section('content')

  <div class="content-wrapper bg-white p-5">

    <section class="content ">
      <div class="container-fluid">
      	<div class="row">
      		<div class="col-md-8 ml-auto mr-auto bg-white">
      			<h2 class=" ml-auto mr-auto">@lang('email_check.Account didn`t activate')</h2><br>
      			<h2 class=" ml-auto mr-auto">@lang('email_check.We already send activation link to your email')</h2>
      		</div>
      		
      	</div>
      </div>
  </section>
</div>

@endsection