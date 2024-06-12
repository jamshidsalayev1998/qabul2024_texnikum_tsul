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
                
            </div>
            <div class="col-md-12">
                <hr class="w-100">
            </div>
            <div class="col-md-6">
                <div>
                    <h5 class="float-left mr-3">@lang('petition.Last name')</h5>
                    <span>{{ $petition->last_name }}</span>
                </div>
                
                
                <hr>
                <div>
                    <h5 class="float-left mr-3">@lang('petition.First name')</h5>
                <span> {{ $petition->first_name }} </span>
                </div>
                
                <hr>
                <div>
                     <h5 class="float-left mr-3">@lang('petition.Father`s name')</h5>
                <span> {{ $petition->middle_name }} </span>
                </div>
                <hr>
               
                <div>
                    <h5 class="float-left mr-3">@lang('petition.Gender')</h5>
               <span>  {{ $petition->getGender() }} </span>
                </div> 
                <hr>
                
                <div>
                     <h5 class="float-left mr-3">@lang('petition.Country')</h5>
               <span>  {{ $petition->getCountry()->$name_l }} </span>
                </div>
                <hr>
               
                <div>
                    <h5 class="float-left mr-3">@lang('petition.Region Of Permanent Residence')</h5>
               <span>  {{ $petition->getRegion()->$name_l }} </span>
                </div>
               
                <hr>
                
                <div>
                    <h5 class="float-left mr-3">@lang('petition.City Of Permanent Residence')</h5>
               <span>  {{ $petition->getArea()->$name_l }} </span>
                </div>
                <hr>
                
                <div>
                    <h5 class="float-left mr-3">@lang('petition.Address')</h5>
               <span>  {{ $petition->address }} </span>
                </div>
                <hr>
                
                <div>
                    <h5 class="float-left mr-3">@lang('petition.Citizenship')</h5>
               <span>  {{ $petition->citizenship }} </span>
                </div>
                <hr>
                
                <div>
                     <h5 class="float-left mr-3">@lang('petition.Nationality')</h5>
               <span>  {{ $petition->nationality }} </span>
                </div>
                <hr>
               
                <div>
                    <h5 class="float-left mr-3">@lang('petition.Passport seria and number')</h5>
               <span>  {{ $petition->passport_seria }} </span>
                </div>
                <hr>
                
                <div>
                     <h5 class="float-left mr-3">@lang('petition.Home phone number')</h5>
              <span>   {{ $petition->home_phone }} </span>
                </div>
                <hr>
               
                <div>
                     <h5 class="float-left mr-3">@lang('petition.Mobile phone number')</h5>
                <span> {{ $petition->mobile_phone }} </span>
                </div>
                <hr>
               
                <div>
                    <h5 class="float-left mr-3">@lang('petition.Father`s phone number')</h5>
               <span>  {{ $petition->father_phone }} </span>
                </div>

                
                
                
            </div>
            <div class="col-md-6">
               
                <div>
                     <h5 class="float-left mr-3">@lang('petition.Mother`s phone number')</h5>
               <span>  {{ $petition->mother_phone }} </span>
                </div>
                <hr>
                
                <div>
                    <h5 class="">@lang('petition.Name of school or number')</h5>
                <br><span> {{ $petition->school }} </span>
                </div>
                <hr>
               
                <div>
                     <h5 class="float-left mr-3">@lang('petition.Type school')</h5>
               <span>  {{ $petition->getTypeschool()->$name_l }} </span>
                </div>
                <hr>
              
                <div>
                      <h5 class="float-left mr-3">@lang('petition.Graduation date')</h5>
               <span> {{ $petition->graduation_date }} </span>
                </div>
                <hr>
              
                <div>
                      <h5 class="float-left mr-3">@lang('petition.Diploma number')</h5>
                <span> {{ $petition->diplom_number }} </span>
                </div>
                <hr>
               
                <div>
                   <h5 class="float-left mr-3">@lang('petition.English degree')</h5>
                <span> {{ $petition->getEndegree()->$name_l }}  </span> 
                </div>
                <hr>
                 @if($petition->overall_score_english)
                <div>
                    <h5 class="float-left mr-3">@lang('petition.Overall band score')</h5>
                <span> {{ $petition->overall_score_english }} </span>
                </div>
                <hr>
                @endif
               @if($petition->ilts_number)
                <div>
                     <h5 class="float-left mr-3">@lang('petition.IELTS Test Report Form Number (only if IELTS)')</h5>
                <span> {{ $petition->ilts_number }} </span>
                </div>
                <hr>
                @endif
                
               
                <div>
                    <h5 class="float-left mr-3">@lang('petition.Faculty')</h5>
                <span> {{ $petition->getFaculty()->$name_l }}  </span>
                </div>
                <hr>
                
                <div>
                    <h5 class="float-left mr-3">@lang('petition.Type of Education')</h5>
                <span> {{ $petition->getEdutype()->$name_l }} </span>
                </div>
                <hr>
               
                <div>
                     <h5 class="float-left mr-3">@lang('petition.Language of further education')</h5>
                <span> {{ $petition->getLanguagetype()->$name_l }} </span>
                </div>
                <hr>
               
                <div>
                     <h5 class="float-left mr-3">@lang('petition.Disability status')</h5>
                <span> {{ $petition->getDisability()->$name_l }} </span>
                </div>
                <hr>
                
                
                <div>
                    <h5 class="float-left mr-3">@lang('petition.Disability description')</h5>
                <span> {{ $petition->disability_description }} </span>
                </div>
            </div>
            <hr>
            <div class="col-md-12">
                <hr class="w-100">
            </div>
            <div class="col-md-12">
                <div class="col-md-6 ">
                <h5 class="w-100">@lang('petition.Passport image')</h5>

                    <img src="{{ asset('users/documents/image') }}/{{ $petition->image }}" class="img-thumbnail" style="width: 100%; height: auto;">
                </div>
            <div class="col-md-6 ">
                <h5 class="">@lang('petition.Passport image')</h5>
                <img  src="{{ asset('users/documents/passport_images') }}/{{ $petition->passport_image }}" class="img-thumbnail " style="width: 100%; height: auto;" >
            </div>
            </div>
            
            
            <div class="col-md-6 ml-auto mr-auto">
                <h5 class="text-center">@lang('petition.Diplom image')</h5>
                <img  src="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image }}" class="img-thumbnail " style="width: 100%; height: auto;" >
            </div>
            <div class="col-md-12">
                <hr class="w-100">
            </div>
            <div class="col-md-6 ml-auto mr-auto">
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