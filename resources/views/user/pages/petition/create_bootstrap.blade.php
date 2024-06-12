@extends('admin.layouts.master')
@section('content')
@php   $locale = App::getLocale(); $name_l = 'name_'.$locale;@endphp
 <div class="content-wrapper">
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid bg-white">
		<form method="post" action="{{ route('petition.store') }}" enctype="multipart/form-data">
			@csrf

	<div class="row p-3" style="margin-top: 30px;">
			<div class="col-md-12  p-2 ml-auto mr-auto" style="border-radius: 5px;">
				<div class="col-md-12">
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
				</div>
				<div class="border p-3 box_shadow" >
					<div class="form-group">
						<label for="last_name" >@lang('petition.Last name')</label> <label id="last_name_error" class="error">@error('last_name')! {{ $message }} @enderror</label>
						<input  id="lastname" required="tt" type="text" id="latyn" name="last_name" value="{{ old('last_name') }}" class="form-control">
					</div>
					<div class="form-group">
						<label>@lang('petition.First name')</label><label id="first_name_error" class="error">@error('first_name')! {{ $message }} @enderror</label>
						<input required="tt" id="first_name"  type="text" id="latyn"  name="first_name" value="{{ old('first_name') }}" class="form-control">
					</div>
					<div class="form-group">
						<label>@lang('petition.Father`s name')</label><label id="middle_name_error" class="error">@error('middle_name')! {{ $message }} @enderror</label>
						<input required="tt" id="middle_name"  type="text" id="latyn"  name="middle_name" value="{{ old('middle_name') }}" class="form-control">
					</div>
					<div class="form-group">
						<label>@lang('petition.Gender')</label><br>
						<div class="icheck-success d-inline">
	                        <input type="radio" name="gender" @if(!old('gender') || old('gender') == 1) checked @endif  value="1" id="radioSuccess1">
	                        <label for="radioSuccess1">@lang('petition.Male')
	                        </label>
	                      </div>
	                      <div class="icheck-success d-inline">
	                        <input type="radio" name="gender" @if(old('gender') == 0) checked="" @endif value="0" id="radioSuccess2">
	                        <label for="radioSuccess2">@lang('petition.Female')
	                        </label>
	                      </div>
					</div><label>@lang('petition.Date of birth')</label><label id="birth_date_error" class="error">@error('birth_date')! {{ $message }} @enderror</label><br>
					<div class="input-group">

						<div class="input-group-prepend">
	                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
	                    </div>
	                    <input  type="date" required="tt" class="form-control"  id="birth_date" name="birth_date" value="{{ old('birth_date') }}" value="{{ old('birth_date') }}" >
					</div>
					<br>
					<div class="form-group">
						<label>@lang('petition.Upload photo 3x4')</label><label class="error">@error('image')! {{ $message }} @enderror</label>
						<input type="file"  id="image_doc" accept="image/x-png,image/gif,image/jpeg"   name="image" class="form-control">
					</div>
				</div>
				<div class="border p-3 box_shadow" >

				
				<h3>@lang('petition.Permanent Residence Information')</h3>
				<div class="form-group">
					<label>@lang('petition.Country')</label><label id="country_error" class="error">@error('country')! {{ $message }} @enderror</label>
					<select class="form-control select2" id="country"  name="country_id" style="width: 100%;">
						<option   value="">--------</option>
	                    @foreach($country as $item)
	                    <option @if(old('country_id') == $item->id )   selected @endif value="{{ $item->id }}" >{{ $item->$name_l }}</option>
	                    @endforeach
	                  </select>
				</div>
				<div class="form-group">
					<label>@lang('petition.Region Of Permanent Residence')</label><label id="country_region_error" class="error">@error('region_id')! {{ $message }} @enderror</label>
					<select class="form-control select2"  name="region_id" id="country_region" style="width: 100%;">
	                   
	                  </select>
				</div>
				<div class="form-group">
					<label>@lang('petition.City Of Permanent Residence')</label><label id="country_region_area_error" class="error">@error('region_id')! {{ $message }} @enderror</label>
					<select class="form-control select2"  name="area_id" id="country_region_area" style="width: 100%;">
	                    
	                  </select>
				</div>
				
				<div class="form-group">
					<label>@lang('petition.Address')</label><label id="address_error" class="error">@error('address')! {{ $message }} @enderror</label>
					<input type="text"  id="latyn_address" name="address" value="{{ old('address') }}" class=" address form-control">
				</div>
				<div class="form-group">
					<label>@lang('petition.Citizenship')</label><label class="error">@error('citizenship')! {{ $message }} @enderror</label>
					<input type="text" id="latyn"  name="citizenship" value="{{ old('citizenship') }}" class="citizenship form-control">
				</div>
				<div class="form-group">
					<label>@lang('petition.Nationality')</label><label class="error">@error('nationality')! {{ $message }} @enderror</label>
					<input type="text"  id="latyn" name="nationality" value="{{ old('nationality') }}" class="form-control">
				</div>
			</div>
				<div class="border p-3 box_shadow" >
				
				<h3>@lang('petition.Passport Information')</h3>
				<div class="form-group">
					<label>@lang('petition.Passport seria and number')</label><label class="error">@error('passport_seria')! {{ $message }} @enderror</label>
					<input type="text" name="passport_seria" value="{{ old('passport_seria') }}" placeholder="AA1234567" id="passport_seria" class="form-control">
				</div>
				<div class="form-group">
					<label>@lang('petition.Upload passport copy (Upload only the main page)')</label><label class="error">@error('passport_image')! {{ $message }} @enderror</label>
					<input type="file" id="image_pass" accept="image/x-png,image/gif,image/jpeg" name="passport_image" class="form-control">
				</div>
				</div>
				<div class="border p-3 box_shadow" >

				<h3>@lang('petition.Contact Information')</h3>
				<div class="form-group">
					<label>@lang('petition.Home phone number')</label><label class="error">@error('home_phone')! {{ $message }} @enderror</label>
					<input type="text" name="home_phone" value="{{ old('home_phone') }}" class="form-control">
				</div>
				<div class="form-group">
					<label>@lang('petition.Mobile phone number')</label><label class="error">@error('mobile_phone')! {{ $message }} @enderror</label>
					<input type="text" name="mobile_phone" value="{{ old('mobile_phone') }}" class="form-control">
				</div>
				<div class="form-group">
					<label>@lang('petition.Father`s phone number')</label><label class="error">@error('father_phone')! {{ $message }} @enderror</label>
					<input type="text" name="father_phone" value="{{ old('father_phone') }}" class="form-control">
				</div>
				<div class="form-group">
					<label>@lang('petition.Mother`s phone number')</label><label class="error">@error('mother_phone')! {{ $message }} @enderror</label>
					<input type="text" name="mother_phone" value="{{ old('mother_phone') }}" class="form-control">
				</div>
				</div>
				<div class="border p-3 box_shadow" >

				<h3>@lang('petition.High School (College Information)')</h3>
				<div class="form-group">
					<label>@lang('petition.Name of school or number')</label><label class="error">@error('school')! {{ $message }} @enderror</label>
					<input type="text" id="latyn_address" name="school" value="{{ old('school') }}" class="form-control">
				</div>
				<div class="form-group">
					<label>@lang('petition.Type school')</label><label class="error">@error('type_school')! {{ $message }} @enderror</label>
					<select class="form-control select2" style="width: 100%;" name="type_school">
	                    @foreach($typeschool as $item)
	                    <option @if(old('type_school') == $item->id) selected @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
	                    @endforeach
	                  </select>
				</div>
				<div class="form-group">
					<label>@lang('petition.Select graduation date')</label><label class="error">@error('graduation_date')! {{ $message }} @enderror</label>
					<select class="form-control select2" name="graduation_date" style="width: 100%;">
						@for($i = date('Y'); $i > date('Y')-21 ; $i--)
						<option @if(old('graduation_date') == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
						@endfor
	                    
	                  </select>
				</div>
				<div class="form-group">
					<label> @lang('petition.Diploma number')</label><label class="error">@error('diplom_number')! {{ $message }} @enderror</label>
					<input type="text" id="latyn_address" name="diplom_number" value="{{ old('diplom_number') }}" class="form-control">
				</div>
				<div class="form-group">
					<label> @lang('petition.Upload Diploma (Upload only diploma)')</label><label class="error">@error('diplom_image')! {{ $message }} @enderror</label>
					<input type="file" id="image_dip" accept="image/x-png,image/gif,image/jpeg" name="diplom_image" class="form-control">
				</div>
				</div>
				<div class="border p-3 box_shadow" >

				<h3> @lang('petition.English Proficiency Information')</h3>
				<div class="form-group">
					<label> @lang('petition.English degree')</label><label class="error">@error('english_degree')! {{ $message }} @enderror</label>
					<select class="form-control select2" name="english_degree" style="width: 100%;">
	                    @foreach($endegree as $item)
	                    <option @if(old('endegree') == $item) selected @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
	                    @endforeach
	                  </select>
				</div>
				<div class="form-group">
					<label> @lang('petition.Overall band score')</label>
					<input type="text" id="latyn_address" name="overall_score_english" value="{{ old('overall_score_english') }}" class="form-control">
				</div>
				<div class="form-group">
					<label> @lang('petition.IELTS Test Report Form Number (only if IELTS)')</label>
					<input type="text" id="latyn_address" name="ilts_number" value="{{ old('ilts_number') }}" class="form-control">
				</div>
				<div class="form-group">
					<label> @lang('petition.Upload test report copy') </label>
					<input type="file" id="image_eng" accept="image/x-png,image/gif,image/jpeg" name="english_image" class="form-control">
				</div>
				</div>
				<div class="border p-3 box_shadow" >

				<h3>
					 @lang('petition.Faculty Selection')
				</h3>
				<div class="form-group">
					<label> @lang('petition.Select faculty')</label><label class="error">@error('faculty_id')! {{ $message }} @enderror</label>
					<select class="form-control select2" id="faculty" name="faculty_id" style="width: 100%;">
	                    @foreach($faculties as $item)
	                    <option @if(old('faculty_id') == $item) selected @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
	                    @endforeach
	                  </select>
				</div>
				<div class="form-group">
					<label>@lang('petition.Type of Education')</label><label class="error">@error('type_education_id')! {{ $message }} @enderror</label>
					<select class="form-control select2" id="faculty_type_edu" name="type_education_id" style="width: 100%;">
	                   {{--   @foreach($edutypes as $item)
	                    <option @if(old('type_education_id') == $item) selected @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
	                    @endforeach --}}
	                  </select>
				</div>
				<div class="form-group">
					<label>@lang('petition.Language of further education')</label><label class="error">@error('type_language_id')! {{ $message }} @enderror</label>
					<select class="form-control select2" id="faculty_type_lang" name="type_language_id" style="width: 100%;">
	                    {{-- @foreach($languagetype as $item)
	                    <option  @if(old('type_language_id') == $item) selected @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
	                    @endforeach --}}
	                  </select>
				</div>
				<div class="form-group">
					<label>@lang('petition.Disability status')</label><label class="error">@error('disability_status_id') ! {{ @message }} @enderror</label>
					<select class="form-control select2" name="disability_status_id" style="width: 100%;">
	                    @foreach($disability as $item)

	                    <option @if(old('disability_status_id') == $item) selected @endif @if($item->name_en == 'No') selected @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
	                    @endforeach
	                  </select>
				</div>
				<div class="form-group">
					<label>@lang('petition.Disability description')</label><label class="error">@error('disability_description') ! {{ @message }} @enderror</label>
					<textarea class="form-control" id="latyn_address"  name="disability_description">{{ old('disability_description') }}</textarea>
				</div>
				<div class="form-group text-right">
					<button class="jonatish btn btn-success">@lang('petition.Send')</button>
				</div>
			</div>
			</div>
			
	</div>
		</form>

</div>
</section>
</div>
@endsection

@section('js')
<script type="text/javascript">
	
var notf = '@lang('petition.Please select file size smaller from 4Mb')';
 $(document).ready(function() {       
    $('#image_doc').bind('change', function() {
        var a=(this.files[0].size);
        // alert(a);
        if(a > 4000000) {
            alert(notf);
            $(this).val('');
        };
    });
    $('#image_pass').bind('change', function() {
        var a=(this.files[0].size);
        // alert(a);
        if(a > 4000000) {
            alert(notf);
            $(this).val('');
        };
    });
    $('#image_dip').bind('change', function() {
        var a=(this.files[0].size);
        // alert(a);
        if(a > 4000000) {
            alert(notf);
            $(this).val('');
        };
    });
    $('#image_eng').bind('change', function() {
        var a=(this.files[0].size);
        // alert(a);
        if(a > 4000000) {
            alert(notf);
            $(this).val('');
        };
    });
    $('.jonatish').click(function(){
    	var ad = $('.address').val();
    	var bd = $('#birth_date').val();
    	var c = $('#country').val();
    	var mn = $('#middle_name').val();
    	var ln = $('#last_name').val();
    	var fn = $('#first_name').val();
    	var r = $('#country_region').val();
    	var a = $('#country_region_area').val();
    	var xatoc = '@lang('petition.Davlatlardan birini tanlang')';
    	var xatoa = '@lang('petition.Tumanlardan  birini tanlang')';
    	var xator = '@lang('petition.Viloyatlardan birini tanlang')';
    	var xatot = '@lang('petition.Malumotlarni kiriting')';
    	// alert(r);
    	if (c == "" || c == null) {
    		$('#country_error').html(xatoc);
    	}
    	if (r == "" || r == null) {
    		$('#country_region_error').html(xator);
    	}
    	if (a == "" || a == null) {
    		$('#country_region_area_error').html(xatoa);
    	}
    	if (ln == "" || ln == null) {
    		$('#last_name_error').html(xatot);
    		
    	}
    	if (mn == "" || mn == null) {
    		$('#middle_name_error').html(xatot);
    		
    	}
    	if (fn == "" || fn == null) {
    		$('#first_name_error').html(xatot);
    		
    	}
    	if (bd == "" || bd == null) {
    		$('#birth_date_error').html(xatot);
    		
    	}
    	// if (ad == "" || ad == null) {
    	// 	$('#address_error').html(xatot);
    		
    	// }
    });
});


</script>
@endsection



