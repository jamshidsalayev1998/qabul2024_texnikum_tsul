@extends('admin.layouts.master')
@section('title')

Applications
@endsection
@section('content')
@php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp
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
             {{-- endmodal --}}
            <!-- /.card -->
            <div class="card  card-outline w-100">
              
              <div class="card-body">
                <ul class="nav nav-tabs w-100" id="custom-content-below-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-personal" role="tab" aria-controls="custom-content-below-home" aria-selected="true"><i class="fas fa-user-shield"></i>  @lang('petition.Personal')</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-education" role="tab" aria-controls="custom-content-below-profile" aria-selected="false"><i class="fas fa-university"></i> @lang('petition.Education')</a>
                  </li>
                 
                  {{-- <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-documents" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">@lang('petition.Documents')</a>
                  </li> --}}
                  
                  <li class="nav-item mr-1">
                    <a class="btn btn-default" id="modalsc" data-toggle="modal" data-target="#myModal" ><i class="fa fa-comment"></i> @lang('petition.Comment')<span id="new_mess">{{-- <sup style="padding: 2px; background-color: #28A745 ; border-radius: 5px; color: white; font-weight: bold; ">+3 new</sup> --}}</span></a>
                  </li>
                  @if($petition->status != 2)
                  <li class="nav-item">
                    <a href="{{ route('petition.edit' , ['id' => $petition->id]) }}" class="btn btn-default" ><i class="fa fa-edit"></i> @lang('petition.Edit')</a>
                  </li>
                  @endif
                  <li class="nav-item ml-1">
                    <a  class="btn btn-default" ><i class="fa fa-file-pdf"></i> @lang('petition.Print')</a>
                    
                  </li>
                   <li class="nav-item ml-5">
                    <h5 style="color: @if($petition->status == 1) #FF6469 @elseif($petition->status == 2) #86FF64  @endif">
                      @lang('petition.Status') : {{ $petition->getStatus() }}
                    </h5>
                    
                  </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                  <div class="tab-pane fade show active" id="custom-content-below-personal" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                        <div class="row mt-4">
                          
                          
                             <div class="col-md-3"> <h5>@lang('petition.Last name')</h5> {{ $petition->last_name }}</div>
                             <div class="col-md-3"> <h5>@lang('petition.First name')</h5> {{ $petition->first_name }}</div>
                             <div class="col-md-3"> <h5>@lang('petition.Father`s name')</h5> {{ $petition->first_name }}</div>
                             <div class="col-md-3"> <h5>@lang('petition.Passport seria and number')</h5> {{ $petition->passport_seria }}</div>
                             
                             <div class="col-md-12">
                                 <hr class="w-100">
                             </div>
                             <div class="col-md-3"> <h5>@lang('petition.Gender')</h5> {{ $petition->getGender() }}</div>
                             <div class="col-md-3"> <h5>@lang('petition.Country')</h5> {{ $petition->getCountry()->$name_l }}</div>
                             <div class="col-md-3"> <h5>@lang('petition.Region Of Permanent Residence')</h5> {{ $petition->getRegion()->$name_l }}</div>
                             <div class="col-md-3"> <h5>@lang('petition.City Of Permanent Residence')</h5> {{ $petition->getArea()->$name_l }}</div>
                            
                             <div class="col-md-12">
                                 <hr class="w-100">
                             </div>
                              <div class="col-md-3"> <h5>@lang('petition.Address')</h5> {{ $petition->address }}</div>
                             <div class="col-md-3"> <h5>@lang('petition.Citizenship')</h5> {{ $petition->citizenship }}</div>
                             <div class="col-md-3"> <h5>@lang('petition.Nationality')</h5> {{ $petition->nationality }}</div>
                             <div class="col-md-3"> <h5>@lang('petition.Disability status')</h5> {{ $petition->getDisability()->$name_l }}</div>
                             
                             <div class="col-md-12">
                                 <hr class="w-100">
                             </div>
                             <div class="col-md-4"> <h5>@lang('petition.Disability description')</h5> {{ $petition->disability_description }}</div>
                             <div class="col-md-2"> <h5>@lang('petition.Home phone number')</h5> {{ $petition->home_phone }}</div>
                             <div class="col-md-2"> <h5>@lang('petition.Mobile phone number')</h5> {{ $petition->mobile_phone }}</div>
                             <div class="col-md-2"> <h5>@lang('petition.Father`s phone number')</h5> {{ $petition->father_phone }}</div>
                             <div class="col-md-2"> <h5>@lang('petition.Mother`s phone number')</h5> {{ $petition->mother_phone }}</div>
                              <div class="col-md-12">
                                 <hr class="w-100">
                             </div>
                             <div class="col-md-6"><h5>@lang('petition.Image')</h5><img class="img-thumbnail w-100 " style="height: auto;" src="{{ asset('users/documents/image') }}/{{ $petition->image }}"></div>
                             <div class="col-md-6"><h5>@lang('petition.Passport image')</h5><img class="img-thumbnail w-100 " style="height: auto;" src="{{ asset('users/documents/passport_images') }}/{{ $petition->passport_image }}"></div>
                        </div>
                        
                  </div>
                  <div class="tab-pane fade" id="custom-content-below-education" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                    <div class="row mt-2">

                        <div class="col-md-5"> <h5>@lang('petition.Faculty')</h5> {{ $petition->getFaculty()->$name_l  }}</div>
                         <div class="col-md-4"> <h5>@lang('petition.Type of Education')</h5> {{ $petition->getEdutype()->$name_l  }}</div>
                         <div class="col-md-3"> <h5>@lang('petition.Language of further education')</h5> {{ $petition->getLanguagetype()->$name_l }}</div>
                         
                         <div class="col-md-12">
                             <hr class="w-100">
                         </div>
                        <div class="col-md-3"> <h5>@lang('petition.Name of school or number')</h5> {{ $petition->school }}</div>
                         <div class="col-md-3"> <h5>@lang('petition.Type school')</h5> {{ $petition->getTypeschool()->$name_l }}</div>
                         <div class="col-md-3"> <h5>@lang('petition.Graduation date')</h5> {{ $petition->graduation_date }}</div>
                         <div class="col-md-3"> <h5>@lang('petition.Diploma number')</h5> {{ $petition->diplom_number }}</div>
                         <div class="col-md-12">
                             <hr class="w-100">
                         </div>
                         <div class="col-md-3"> <h5>@lang('petition.English degree')</h5> {{ $petition->getEndegree()->$name_l }}</div>
                         <div class="col-md-3"> <h5>@lang('petition.Overall band score')</h5> {{ $petition->overall_score_english }}</div>
                         <div class="col-md-6"> <h5>@lang('petition.IELTS Test Report Form Number (only if IELTS)')</h5> {{ $petition->ilts_number }}</div>
                         
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
               
                
                
              </div>
              <!-- /.card -->
            </div>
            <!-- /.card -->
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

  function get_messages(pet){
    var url = '{{ route('get_messages' , ['id' => $petition->id]) }}';
    $.ajax({
      url: url,
      type: 'GET',
      success:function(result){
        var messages = JSON.parse(result);
        var html = '';
        $.each(messages , function(key , value){
            if (value['from_id'] == 0) {
              html += '<div class="p-2 bg-success ml-auto mr-3 mt-3" style="border-radius:5px; width:80%"><h6 class="sms_h">'+ value['body'] +'</h6></div>';
            }
            else{
                      
              html+= '<div class=" p-2 bg-light mr-auto ml-3 mt-3" style="border-radius:5px;width:80% "><h6 class="sms_h">'+value['body']+'</h6></div>';
            }
        });
        $('#sms_box').html(html);
        
        $('#lala').scrollTop(1000000000000);
      }
    });
  }
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
  
</script>
@endsection