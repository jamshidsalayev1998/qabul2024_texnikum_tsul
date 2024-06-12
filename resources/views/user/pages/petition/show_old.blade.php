@extends('admin.layouts.master')
@section('title')

Applications
@endsection
@section('content')
@php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp
 <div class="content-wrapper bg-white mb-5">
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid bg-white">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        	
        	<div class="col-md-12 bg-white p-3 " style="border-radius: 5px;">
        		@if(session('success'))

                    <div class="alert alert-success alert-icon-block alert-dismissible" role="alert">

                        <div class="alert-icon">

                            <span class="icon-checkmark-circle"></span>

                        </div>

                        {{ session('success') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                    </div>

                @endif
                @if(session('error'))

                    <div class="alert alert-danger alert-icon-block alert-dismissible" role="alert">

                        <div class="alert-icon">

                            <span class="icon-checkmark-circle"></span>

                        </div>

                        {{ session('error') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>

                    </div>

                @endif
               
        	</div>
             <div class="col-md-12">
                <div class="col-md-5 ml-auto mr-auto text-center">
                    <h5>@lang('petition.Status'): {{ $petition->getStatus() }}</h5>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-5 ml-auto mr-auto">
                    <img src="{{ asset('users/documents/image') }}/{{ $petition->image }}" class="img-thumbnail" style="width: 100%; height: auto;">
                </div>
            </div>
            <div class="col-md-12">
                <hr class="w-100">
            </div>
            <div class="col-md-6">
                <h5>@lang('petition.Last name')</h5>
                {{ $petition->last_name }}
                <h5>@lang('petition.First name')</h5>
                {{ $petition->first_name }}
                <h5>@lang('petition.Father`s name')</h5>
                {{ $petition->middle_name }}
                <h5>@lang('petition.Gender')</h5>
                {{ $petition->getGender() }}
                <h5>@lang('petition.Country')</h5>
                {{ $petition->getCountry()->$name_l }}
                <h5>@lang('petition.Region Of Permanent Residence')</h5>
                {{ $petition->getRegion()->$name_l }}
                <h5>@lang('petition.City Of Permanent Residence')</h5>
                {{ $petition->getArea()->$name_l }}
                <h5>@lang('petition.Address')</h5>
                {{ $petition->address }}
                <h5>@lang('petition.Citizenship')</h5>
                {{ $petition->citizenship }}
                <h5>@lang('petition.Nationality')</h5>
                {{ $petition->nationality }}
                <h5>@lang('petition.Passport seria and number')</h5>
                {{ $petition->passport_seria }}
                <h5>@lang('petition.Home phone number')</h5>
                {{ $petition->home_phone }}
                <h5>@lang('petition.Mobile phone number')</h5>
                {{ $petition->mobile_phone }}
                <h5>@lang('petition.Father`s phone number')</h5>
                {{ $petition->father_phone }}
                
            </div>
            <div class="col-md-6">
                <h5>@lang('petition.Mother`s phone number')</h5>
                {{ $petition->mother_phone }}
                <h5>@lang('petition.Name of school or number')</h5>
                {{ $petition->school }}
                <h5>@lang('petition.Type school')</h5>
                {{ $petition->getTypeschool()->$name_l }}
                <h5>@lang('petition.Graduation date')</h5>
                {{ $petition->graduation_date }}
                <h5>@lang('petition.Diploma number')</h5>
                {{ $petition->diplom_number }}
                <h5>@lang('petition.English degree')</h5>
                {{ $petition->getEndegree()->$name_l }}
                <h5>@lang('petition.Overall band score')</h5>
                {{ $petition->overall_score_english }}
                <h5>@lang('petition.IELTS Test Report Form Number (only if IELTS)')</h5>
                {{ $petition->ilts_number }}
                <h5>@lang('petition.Faculty')</h5>
                {{ $petition->getFaculty()->$name_l }}
                <h5>@lang('petition.Type of Education')</h5>
                {{ $petition->getEdutype()->$name_l }}
                <h5>@lang('petition.Language of further education')</h5>
                {{ $petition->getLanguagetype()->$name_l }}
                <h5>@lang('petition.Disability status')</h5>
                {{ $petition->getDisability()->$name_l }}
                
                <h5>@lang('petition.Disability description')</h5>
                {{ $petition->disability_description }}
            </div>
            <hr>
            <div class="col-md-12">
                <hr class="w-100">
            </div>
            <div class="col-md-5 ml-auto mr-auto">
                <h5 class="text-center">@lang('petition.Passport image')</h5>
                <img  src="{{ asset('users/documents/passport_images') }}/{{ $petition->passport_image }}" class="img-thumbnail " style="width: 100%; height: auto;" >
            </div>
            <div class="col-md-5 ml-auto mr-auto">
                <h5 class="text-center">@lang('petition.Diplom image')</h5>
                <img  src="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image }}" class="img-thumbnail " style="width: 100%; height: auto;" >
            </div>
            <div class="col-md-12">
                <hr class="w-100">
            </div>
            <div class="col-md-5 ml-auto mr-auto">
                <h5 class="text-center">@lang('petition.Test report image')</h5>
                <img  src="{{ asset('users/documents/english_images') }}/{{ $petition->english_image }}" class="img-thumbnail " style="width: 100%; height: auto;" >
            </div>
        </div>
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('js')
<script type="text/javascript">
</script>
@endsection