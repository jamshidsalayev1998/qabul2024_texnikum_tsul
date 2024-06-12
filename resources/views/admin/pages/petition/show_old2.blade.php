@extends('admin.layouts.master')
@section('title')

Applications
@endsection
@section('content')
@php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp
<style type="text/css">
  .jm_txt{
    display: none;
    width: 300px !important;
    position: absolute !important;
    z-index: 1000;
    -webkit-box-shadow: 0px 0px 31px 2px rgba(0,123,255,1) !important;
    -moz-box-shadow: 0px 0px 31px 2px rgba(0,123,255,1) !important;
    box-shadow: 0px 0px 31px 2px rgba(0,123,255,1) !important;
  }
  .jj{
    padding: 2px;
    cursor: pointer;
  }
</style>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="row">
             {{--  Modal --}}
             <div class="modal fade" id="myModal">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header bg-info">
                    <h4 class="modal-title"> <span style="border-radius: 10px; padding: 5px;"><i class="fa fa-user"></i></span> {{ $petition->last_name }} {{ $petition->first_name }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body " id="lala" style="max-height: 400px; min-height: 200px; overflow-y: scroll;">
                    <div id="sms_box"  class="row ">
                     
                      
                    </div>
                  </div>
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">

                          <input type="text" id="text_sms" class="form-control" name="">
                          <button class="btn btn-info" id="send_button"><i class="fab fa-telegram-plane"></i></button>
                       
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                  </div>
                  
                </div>
              </div>
            </div>
             <!-- {{-- endmodal --}} -->
            <!-- /.card -->
            <div class="help row p-3 m-1 border bg-white" style="border-radius: 7px;">
              <div class="col-md-12">
                <!-- <p class="w-100">
                  <button class="btn btn-default float-right close_help"><i class="fas fa-times"></i></button>
                </p> -->
                <p>
                  @if(App::getLocale() == 'uz')
                  Ariza ma`lumotlarini xatosini tog`irlash maqsadida qaytarish uchun aynan o`sha ma`lumot belgilanadi <i class="fa fa-check"></i> va izoh qoldirish tugmasi <i class="fa fa-comment"></i> bosilib kerakli tavfsiyalar yozilgandan keyin  <span style="color: red;"> Qaytarish </span> tugmasi bosiladi
                  @endif
                </p>
              </div>
            </div>
            <div class="card  card-outline w-100">
              
              <div class="card-body">
              <span style="display: flex; justify-content: space-between;">
                <ul class="nav nav-tabs  " id="custom-content-below-tab" role="tablist" >
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-personal" role="tab" aria-controls="custom-content-below-home" aria-selected="true"><i class="fas fa-user-shield"></i> @lang('petition.Personal')</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-education" role="tab" aria-controls="custom-content-below-profile" aria-selected="false"><i class="fas fa-university"></i> @lang('petition.Education')</a>
                  </li>
                 
                 
                  
                  <li class="nav-item mr-1">
                    <a class="btn btn-default" id="modalsc" data-toggle="modal" data-target="#myModal" ><i class="fa fa-comment"></i> @lang('petition.Comment') <span id="new_mess">{{-- <sup style="padding: 2px; background-color: #28A745 ; border-radius: 5px; color: white; font-weight: bold; ">+3 new</sup> --}}</span></a>
                  </li>
                  <li class="nav-item mr-2" style=" ">
                    <a href="{{ route('admin.petition.pdf' , ['id' => $petition->id]) }}" class="btn btn-default" ><i class="fa fa-file-pdf"></i> @lang('petition.Print')</a>
                  </li>
               
                 
                   
                   
               
               </ul>
               <ul>
                 <a href="{{ route('admin.accept' , ['id' => $petition->id]) }}" onclick="return confirm('Arizani qabul qilasizmi?')" class="btn btn-success float-left " ><i style="color: white !important" class="fa fa-check"></i> @lang('petition.Accept')</a>
                
                 

                   <a href="#"  class=" return btn btn-danger ml-2" ><i style="color: white !important" class="fas fa-times"></i> @lang('petition.Return')</a>
               </ul>
             </span>
             
            
               <form class="form_check" method="post" action="{{ route('admin.return') }}">
                @csrf
                <input type="text" hidden name="petition_id" value="{{ $petition->id }}">
                <div class="tab-content" id="custom-content-below-tabContent">
                  <div class="tab-pane fade show active" id="custom-content-below-personal" role="tabpanel" aria-labelledby="custom-content-below-home-tab">

                        <div class="row mt-4">
                          
                          
                             <div class="col-md-3"> 
                              <h5>@lang('petition.Last name') 
                                <i id="last_name" class="jj fa fa-comment"></i> 
                                <input type="checkbox" @if(in_array("last_name", $edits)) checked @endif  name="edit[last_name]">
                              </h5> {{ $petition->last_name }}
                               <textarea class="jm_txt form-control" name="last_name"> @if(isset($com_mes['last_name'])) {{ $com_mes['last_name'] }} @endif </textarea> 
                            </div>
                             <div class="col-md-3">
                              <h5>@lang('petition.First name') 
                                <i id="first_name" class="jj fa fa-comment"></i> 
                                <input type="checkbox" @if(in_array("first_name", $edits)) checked @endif  name="edit[first_name]">
                              </h5> 
                              {{ $petition->first_name }} 
                               <textarea class="jm_txt form-control" name="first_name"> @if(isset($com_mes['first_name'])) {{ $com_mes['first_name'] }} @endif </textarea> 
                            </div>
                             <div class="col-md-3"> <h5>@lang('petition.Father`s name') <i id="middle_name" class="jj fa fa-comment"></i> <input type="checkbox"  @if(in_array("middle_name" , $edits)) checked @endif  name="edit[middle_name]"></h5> {{ $petition->middle_name }} <textarea class="jm_txt form-control" name="middle_name"> @if(isset($com_mes['middle_name'])) {{ $com_mes['middle_name'] }} @endif </textarea></div>
                             <div class="col-md-3"> <h5>@lang('petition.Passport seria and number') <i id="passport_seria" class="jj fa fa-comment"></i> <input type="checkbox"  @if(in_array("passport_seria" , $edits)) checked @endif  name="edit[passport_seria]"></h5> {{ $petition->passport_seria }} <textarea class="jm_txt form-control" name="passport_seria"> @if(isset($com_mes['passport_seria'])) {{ $com_mes['passport_seria'] }} @endif </textarea> </div>
                             
                             <div class="col-md-12">
                                 <hr class="w-100">
                             </div>
                             <div class="col-md-3"> <h5>@lang('petition.Gender') <i id="gender" class="jj fa fa-comment"></i>  <input type="checkbox"  @if(in_array("gender" , $edits)) checked @endif  name="edit[gender]"></h5> {{ $petition->getGender() }} <textarea class="jm_txt form-control" name="gender"> @if(isset($com_mes['gender'])) {{ $com_mes['gender'] }} @endif </textarea> </div>
                             <div class="col-md-3">
                              <h5>@lang('petition.Country') <i id="country_id" class="jj fa fa-comment"></i>  <input type="checkbox"  @if(in_array("country_id" , $edits)) checked @endif  name="edit[country_id]"></h5> {{ $petition->getCountry()->$name_l }} <textarea class="jm_txt form-control" name="country_id"> @if(isset($com_mes['country_id'])) {{ $com_mes['country_id'] }} @endif </textarea> </div>
                             <div class="col-md-3"> <h5>@lang('petition.Region Of Permanent Residence') <i id="region_id" class="jj fa fa-comment"></i>  <input type="checkbox"  @if(in_array("region_id" , $edits)) checked @endif  name="edit[region_id]"></h5> {{ $petition->getRegion()->$name_l }} <textarea class="jm_txt form-control" name="region_id"> @if(isset($com_mes['region_id'])) {{ $com_mes['region_id'] }} @endif </textarea> </div>
                             <div class="col-md-3"> <h5>@lang('petition.City Of Permanent Residence') <i id="area_id" class="jj fa fa-comment"></i>  <input type="checkbox"  @if(in_array("area_id" , $edits)) checked @endif  name="edit[area_id]"></h5> {{ $petition->getArea()->$name_l }} <textarea class="jm_txt form-control" name="area_id"> @if(isset($com_mes['area_id'])) {{ $com_mes['area_id'] }} @endif </textarea> </div>
                            
                             <div class="col-md-12">
                                 <hr class="w-100">
                             </div>
                              <div class="col-md-3"> <h5>@lang('petition.Address') <i id="address" class="jj fa fa-comment"></i>  <input type="checkbox"  @if(in_array("address" , $edits)) checked @endif  name="edit[address]"></h5> {{ $petition->address }} <textarea class="jm_txt form-control" name="address"> @if(isset($com_mes['address'])) {{ $com_mes['address'] }} @endif </textarea> </div>
                             <div class="col-md-3"> <h5>@lang('petition.Citizenship') <i id="citizenship" class="jj fa fa-comment"></i>  <input type="checkbox"  @if(in_array("citizenship" , $edits)) checked @endif  name="edit[citizenship]"></h5> {{ $petition->citizenship }} <textarea class="jm_txt form-control" name="citizenship"> @if(isset($com_mes['citizenship'])) {{ $com_mes['citizenship'] }} @endif </textarea> </div>
                             <div class="col-md-3"> <h5>@lang('petition.Nationality') <i id="nationality" class="jj fa fa-comment"></i>  <input type="checkbox"  @if(in_array("nationality" , $edits)) checked @endif  name="edit[nationality]"></h5> {{ $petition->nationality }} <textarea class="jm_txt form-control" name="nationality"> @if(isset($com_mes['nationality'])) {{ $com_mes['nationality'] }} @endif </textarea> </div>
                             <div class="col-md-3"> <h5>@lang('petition.Disability status') <i id="disability_status_id" class="jj fa fa-comment"></i>  <input type="checkbox"  @if(in_array("disability_status_id" , $edits)) checked @endif  name="edit[disability_status_id]"></h5> {{ $petition->getDisability()->$name_l }} <textarea class="jm_txt form-control" name="disability_status_id"> @if(isset($com_mes['disability_status_id'])) {{ $com_mes['disability_status_id'] }} @endif </textarea> </div>
                             
                             <div class="col-md-12">
                                 <hr class="w-100">
                             </div>
                             <div class="col-md-4"> <h5>@lang('petition.Disability description') <i id="disability_description" class="jj fa fa-comment"></i>  <input type="checkbox"  @if(in_array("disability_description" , $edits)) checked @endif  name="edit[disability_description]"></h5> {{ $petition->disability_description }} <textarea class="jm_txt form-control" name="disability_description"> @if(isset($com_mes['disability_description'])) {{ $com_mes['disability_description'] }} @endif </textarea> </div>
                             <div class="col-md-2"> <h5>@lang('petition.Home phone number')  <i id="home_phone" class="jj fa fa-comment"></i> <input type="checkbox"  @if(in_array("home_phone" , $edits)) checked @endif  name="edit[home_phone]"></h5> {{ $petition->home_phone }} <textarea class="jm_txt form-control" name="home_phone"> @if(isset($com_mes['home_phone'])) {{ $com_mes['home_phone'] }} @endif </textarea> </div>
                             <div class="col-md-2"> <h5>@lang('petition.Mobile phone number')  <i id="mobile_phone" class="jj fa fa-comment"></i> <input type="checkbox"  @if(in_array("mobile_phone" , $edits)) checked @endif  name="edit[mobile_phone]"></h5> {{ $petition->mobile_phone }} <textarea class="jm_txt form-control" name="mobile_phone"> @if(isset($com_mes['mobile_phone'])) {{ $com_mes['mobile_phone'] }} @endif </textarea> </div>
                             <div class="col-md-2"> <h5>@lang('petition.Father`s phone number') <i id="father_phone" class="jj fa fa-comment"></i>  <input type="checkbox"  @if(in_array("father_phone" , $edits)) checked @endif  name="edit[father_phone]"></h5> {{ $petition->father_phone }} <textarea class="jm_txt form-control" name="father_phone"> @if(isset($com_mes['father_phone'])) {{ $com_mes['father_phone'] }} @endif </textarea> </div>
                             <div class="col-md-2"> <h5>@lang('petition.Mother`s phone number') <i id="mother_phone" class="jj fa fa-comment"></i>  <input type="checkbox"  @if(in_array("mother_phone" , $edits)) checked @endif  name="edit[mother_phone]"></h5> {{ $petition->mother_phone }} <textarea class="jm_txt form-control" name="mother_phone"> @if(isset($com_mes['mother_phone'])) {{ $com_mes['mother_phone'] }} @endif </textarea> </div>
                              <div class="col-md-12">
                                 <hr class="w-100">
                             </div>
                             <div class="col-md-6"><h5>@lang('petition.Image') <i id="image" class="jj fa fa-comment"></i>  <input type="checkbox"    @if(in_array("image" , $edits)) checked @endif name="edit[image]"></h5><textarea class="jm_txt form-control" name="image"> @if(isset($com_mes['image'])) {{ $com_mes['image'] }} @endif </textarea><img class="img-thumbnail w-100 " style="height: auto;" src="{{ asset('users/documents/image') }}/{{ $petition->image }}">  </div>
                             <div class="col-md-6"><h5>@lang('petition.Passport image') <i id="passport_image" class="jj fa fa-comment"></i>  <input type="checkbox"    @if(in_array("passport_image" , $edits)) checked @endif name="edit[passport_image]"></h5> <textarea class="jm_txt form-control" name="passport_image"> @if(isset($com_mes['passport_image'])) {{ $com_mes['passport_image'] }} @endif </textarea><img class="img-thumbnail w-100 " style="height: auto;" src="{{ asset('users/documents/passport_images') }}/{{ $petition->passport_image }}"> </div>
                        </div>
                        
                  </div>
                  <div class="tab-pane fade" id="custom-content-below-education" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                    <div class="row mt-2">

                        <div class="col-md-5"> <h5>@lang('petition.Faculty') <i id="faculty_id" class="jj fa fa-comment"></i>  <input type="checkbox"    @if(in_array("faculty_id" , $edits)) checked @endif name="edit[faculty_id]"></h5> {{ $petition->getFaculty()->$name_l  }} <textarea class="jm_txt form-control" name="faculty_id"> @if(isset($com_mes['faculty_id'])) {{ $com_mes['faculty_id'] }} @endif </textarea></div>
                         <div class="col-md-4"> <h5>@lang('petition.Type of Education') <i id="type_education_id" class="jj fa fa-comment"></i>  <input type="checkbox"    @if(in_array("type_education_id" , $edits)) checked @endif name="edit[type_education_id]"></h5> {{ $petition->getEdutype()->$name_l  }} <textarea class="jm_txt form-control" name="type_education_id"> @if(isset($com_mes['type_education_id'])) {{ $com_mes['type_education_id'] }} @endif </textarea></div>
                         <div class="col-md-3"> <h5>@lang('petition.Language of further education') <i id="type_language_id" class="jj fa fa-comment"></i>  <input type="checkbox"    @if(in_array("type_language_id" , $edits)) checked @endif name="edit[type_language_id]"></h5> {{ $petition->getLanguagetype()->$name_l }} <textarea class="jm_txt form-control" name="type_language_id"> @if(isset($com_mes['type_language_id'])) {{ $com_mes['type_language_id'] }} @endif </textarea></div>
                         
                         <div class="col-md-12">
                             <hr class="w-100">
                         </div>
                        <div class="col-md-3"> <h5>@lang('petition.Name of school or number') <i id="school" class="jj fa fa-comment"></i>  <input type="checkbox"    @if(in_array("school" , $edits)) checked @endif name="edit[school]"></h5> {{ $petition->school }} <textarea class="jm_txt form-control" name="school"> @if(isset($com_mes['school'])) {{ $com_mes['school'] }} @endif </textarea></div>
                         <div class="col-md-3"> <h5>@lang('petition.Type school') <i id="type_school" class="jj fa fa-comment"></i>  <input type="checkbox"    @if(in_array("type_school" , $edits)) checked @endif name="edit[type_school]"></h5> {{ $petition->getTypeschool()->$name_l }} <textarea class="jm_txt form-control" name="type_school"> @if(isset($com_mes['type_school'])) {{ $com_mes['type_school'] }} @endif </textarea></div>
                         <div class="col-md-3"> <h5>@lang('petition.Graduation date') <i id="graduation_date" class="jj fa fa-comment"></i>  <input type="checkbox"    @if(in_array("graduation_date" , $edits)) checked @endif name="edit[graduation_date]"></h5> {{ $petition->graduation_date }} <textarea class="jm_txt form-control" name="graduation_date"> @if(isset($com_mes['graduation_date'])) {{ $com_mes['graduation_date'] }} @endif </textarea></div>
                         <div class="col-md-3"> <h5>@lang('petition.Diploma number') <i id="diplom_number" class="jj fa fa-comment"></i>  <input type="checkbox"   @if(in_array("diplom_number" , $edits)) checked @endif  name="edit[diplom_number]"></h5> {{ $petition->diplom_number }} <textarea class="jm_txt form-control" name="diplom_number"> @if(isset($com_mes['diplom_number'])) {{ $com_mes['diplom_number'] }} @endif </textarea></div>
                         <div class="col-md-12">
                             <hr class="w-100">
                         </div>
                         <div class="col-md-3"> <h5>@lang('petition.English degree') <i id="english_degree" class="jj fa fa-comment"></i>  <input type="checkbox"   @if(in_array("english_degree" , $edits)) checked @endif  name="edit[english_degree]"></h5> {{ $petition->getEndegree()->$name_l }} <textarea class="jm_txt form-control" name="english_degree"> @if(isset($com_mes['english_degree'])) {{ $com_mes['english_degree'] }} @endif </textarea></div>
                         <div class="col-md-3"> <h5>@lang('petition.Overall band score')  <i id="overall_score_english" class="jj fa fa-comment"></i> <input type="checkbox"   @if(in_array("overall_score_english" , $edits)) checked @endif  name="edit[overall_score_english]"></h5> {{ $petition->overall_score_english }} <textarea class="jm_txt form-control" name="overall_score_english"> @if(isset($com_mes['overall_score_english'])) {{ $com_mes['overall_score_english'] }} @endif </textarea></div>
                         <div class="col-md-6"> <h5>@lang('petition.IELTS Test Report Form Number (only if IELTS)') <i id="ilts_number" class="jj fa fa-comment"></i>  <input type="checkbox"   @if(in_array("ilts_number" , $edits)) checked @endif  name="edit[ilts_number]"></h5> {{ $petition->ilts_number }} <textarea class="jm_txt form-control" name="ilts_number"> @if(isset($com_mes['ilts_number'])) {{ $com_mes['ilts_number'] }} @endif </textarea></div>
                         
                         <div class="col-md-12">
                             <hr class="w-100">
                         </div>

                         <div class="col-md-6">
                            <h5>@lang('petition.Diplom image')  <i id="diplom_image" class="jj fa fa-comment"></i> <input type="checkbox"   @if(in_array("diplom_image" , $edits)) checked @endif  name="edit[diplom_image]"></h5>
                            <textarea class="jm_txt form-control" name="diplom_image"> @if(isset($com_mes['diplom_image'])) {{ $com_mes['diplom_image'] }} @endif </textarea>
                            <img class="img-thumbnail w-100 " style="height: auto;" src="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image }}"> 

                        </div>
                         <div class="col-md-6">
                            <h5>@lang('petition.English image')  <i id="english_image" class="jj fa fa-comment"></i> <input type="checkbox"   @if(in_array("english_image" , $edits)) checked @endif  name="edit[english_image]"></h5>
                            <textarea class="jm_txt form-control" name="english_image"> @if(isset($com_mes['english_image'])) {{ $com_mes['english_image'] }} @endif </textarea>
                            @if($petition->english_image)

                            <img class="img-thumbnail w-100 " style="height: auto;" src="{{ asset('users/documents/english_images') }}/{{ $petition->english_image }}"> 

                            @endif
                        </div>
                    </div>
                  </div>

                  
                  {{-- <div class="tab-pane fade" id="custom-content-below-documents" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <h5>@lang('petition.Image')</h5>
                            <img class="img-thumbnail w-100 " style="height: auto;" src="{{ asset('users/documents/image') }}/{{ $petition->image }}">
                        </div>
                        <div class="col-md-6">
                            <h5>@lang('petition.Passport image')</h5>
                            <img class="img-thumbnail w-100 " style="height: auto;" src="{{ asset('users/documents/passport_images') }}/{{ $petition->passport_image }}">

                        </div>
                        <div class="col-md-12">
                            <hr class="w-100">

                        </div>
                        <div class="col-md-6">
                            <h5>@lang('petition.Diplom image')</h5>
                            <img class="img-thumbnail w-100 " style="height: auto;" src="{{ asset('users/documents/diplom_images') }}/{{ $petition->diplom_image }}">

                        </div>
                        <div class="col-md-6">
                            <h5>@lang('petition.English image')</h5>
                            @if($petition->english_image)
                            <img class="img-thumbnail w-100 " style="height: auto;" src="{{ asset('users/documents/english_images') }}/{{ $petition->english_image }}">

                            @endif
                        </div>
                    </div>
                  </div> --}}
                </div>
              </form>
               
                
                
              </div>
              <!-- /.card -->
            </div>
            <!-- /.card -->
           {{--  <div class="col-md-12">
              <div class="col-md-4 ml-auto mr-auto">
                @if($petition->status != 2)
                 <a href="{{ route('admin.accept' , ['id' => $petition->id]) }}" onclick="return confirm('Arizani qabul qilasizmi?')" class="btn btn-success float-left pl-5 pr-5 pt-2 pb-2" ><i style="color: white !important" class="fa fa-check"></i> @lang('petition.Accept')</a>
                 @endif
                 @if($petition->status != 1)
                 <a href="{{ route('admin.return' , ['id' => $petition->id]) }}" onclick="return confirm('Arizani qaytarasizmi?')" class="btn btn-danger pl-5 pr-5 pt-2 pb-2" ><i style="color: white !important" class="fas fa-times"></i> @lang('petition.Return')</a>
                 @endif
              </div>
            </div> --}}
          </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('js')

<script type="text/javascript">

  var self = {{ Auth::user()->id }};
  var pet_id = {{ $petition->id }};
  $('.return').click(function(){
    var t = confirm("Arizani qaytarasizmi?");
    if (t == true) {
      $('.form_check').submit();
    }
  });
  $('#send_button').click(function(){
      var p = pet_id;
      var sms = $('#text_sms').val();
      var url = '{{ route('send_messages') }}';
      if (sms != '') {
         $.ajax({
                      url: url,
                      type: "post",
                      dataType: "json",
                      data: {

                          id:p , sms:sms , _token: '{{ csrf_token() }}'
                      },
                      success: function(result) {
                         get_messages(p);
                         $('#text_sms').val('')
                          $('#lala').scrollTop(1000000000000);

                      }
                  });
      }
    });
    $(document).ready(function(){

     get_noreads();
    
  });
  $('#modalsc').click(function(){
     get_messages(pet_id);
     $('#new_mess').html('');
    $('#lala').scrollTop(1000000000000);
  });
  function get_noreads(){
      url = '{{ route('get_noread_messages' , ['id' => $petition->id]) }}';
      $.ajax({
        url: url,
        type: 'GET',
        success:function(result){
          if (result > 0) {
            htt = '<sup style="padding: 2px; background-color: #28A745 ; border-radius: 5px; color: white; font-weight: bold; ">+'+result+' new</sup>';
            $('#new_mess').html(htt);
          }
          else{
             $('#new_mess').html('');
          }
        }
      });
  }
  function get_messages(pet){
    var url = '{{ route('get_messages' , ['id' => $petition->id]) }}';
    $.ajax({
      url: url,
      type: 'GET',
      success:function(result){
        var messages = JSON.parse(result);
        var html = '';
        $.each(messages , function(key , value){
            if (value['from_id'] == 1) {
              html += '<div class=" p-2 bg-success ml-auto mr-3 mt-3" style="border-radius:5px; width: 80% "><h6 class="sms_h">'+ value['body'] +'</h6></div>';
            }
            else{
                      
              html+= '<div class=" p-2 bg-light mr-auto ml-3 mt-3" style="border-radius:5px; width: 80% "><h6>'+value['body']+'</h6></div>';
            }
        });
        $('#sms_box').html(html);
        
        $('#lala').scrollTop(1000000000000);
      }
    });
  }
  function send_message(p_id){
    var p = p_id;
    var sms = $('#text_sms').val();
    var url = '{{ route('send_messages') }}';
    // alert(sms);
    if (sms != '') {
       $.post(url , 
       {
        id:p,sms:sms
       },
       function(result){
        alert("ura");
       });
    }
  }

</script>

<script type="text/javascript">
  
  $('.jj').click(function(){
    
    $('.jm_txt').css({
      'display' : 'none',
    });
    var id = $(this).attr('id');
    $('textarea[name="'+id+'"]').css({
      'display' : 'block',
    });
  });
  $(window).click(function(){
    $('.jm_txt').css({
      'display' : 'none',
    });
  });
  $('.jj').click(function(event){
    event.stopPropagation();
});
   $('.jm_txt').click(function(event){
    event.stopPropagation();
});
   // $('.close_help').click(function(event) {
   //   $('.help').css({
   //    'display' : 'none',
   //   });
   // });
  
</script>
@endsection