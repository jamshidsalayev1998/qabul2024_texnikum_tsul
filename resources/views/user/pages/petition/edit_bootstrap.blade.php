@extends('admin.layouts.master')
@section('content')
@php   $locale = App::getLocale(); $name_l = 'name_'.$locale;@endphp

<style type="text/css">
	.form-group{
		display: none;
	}
	.hhr{
		display: none;
	}
</style>
 <div class="content-wrapper">
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid bg-white">
		<form method="post" action="{{ route('petition.update' , ['id' => $petition->id]) }}" enctype="multipart/form-data">
			@csrf
			@method('put')

	<div class="row p-5">
			<div class="col-md-9 border p-3 ml-auto mr-auto" style="border-radius: 5px;">
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
				<div class="form-group last_name">
					<label for="last_name" >@lang('petition.Last name')</label> <label class="error">@error('last_name')! {{ $message }} @enderror</label>
					<input type="text" name="last_name"   value="{{ $petition->last_name }}" class="form-control">
				</div>
				<div class="form-group first_name">
					<label>@lang('petition.First name')</label><label class="error">@error('first_name')! {{ $message }} @enderror</label>
					<input type="text" name="first_name"   value="{{ $petition->first_name }}" class="form-control">
				</div>
				<div class="form-group middle_name">
					<label>@lang('petition.Father`s name')</label><label class="error">@error('middle_name')! {{ $message }} @enderror</label>
					<input type="text" name="middle_name"   value="{{ $petition->middle_name }}" class="form-control">
				</div>
				<div class="form-group gender">
					<label>@lang('petition.Gender')</label><br>
					<div class="icheck-success d-inline">
                        <input type="radio" name="gender"   @if( $petition->gender == 1 ) checked="" @endif  value="1" id="radioSuccess1">
                        <label for="radioSuccess1">@lang('petition.Male')
                        </label>
                      </div>
                      <div class="icheck-success d-inline">
                        <input type="radio" name="gender"   @if($petition->gender == 0) checked="" @endif value="0" id="radioSuccess2">
                        <label for="radioSuccess2">@lang('petition.Female')
                        </label>
                      </div>
				</div>
				<div class="form-group birth_date">
				<label>@lang('petition.Date of birth')</label><label class="error">@error('birth_date')! {{ $message }} @enderror</label><br>
				<div class="input-group">

					<div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control" name="birth_date"    value="{{ $petition->birth_date }}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
				</div>
			</div>
				<br>
				<div class="form-group image">
					<label>@lang('petition.Upload photo 3x4')</label><label class="error">@error('image')! {{ $message }} @enderror</label>
					<input type="file" name="image"   class="form-control">
				</div>
				<hr class="hhr image birth_date gender middle_name first_name last_name">
				<h3 class="hhr country_id region_id area_id address citizenship nationality">@lang('petition.Permanent Residence Information')</h3>
				<div class="form-group country_id">
					<label>@lang('petition.Country')</label><label class="error">@error('country')! {{ $message }} @enderror</label>
					<select class="form-control select2" id="country"    name="country_id" style="width: 100%;">
						<option selected="">----------</option>
	                    @foreach($country as $item)
	                    <option @if($petition->country_id == $item->id )  selected @endif value="{{ $item->id }}" >{{ $item->$name_l }}</option>
	                    @endforeach
	                  </select>
				</div>
				<div class="form-group region_id">
					<label>@lang('petition.Region Of Permanent Residence')</label><label class="error">@error('region_id')! {{ $message }} @enderror</label>
					<select class="form-control select2" name="region_id"   id="country_region" style="width: 100%;">
	                   @foreach($regions as $item)
	                   <option @if($petition->region_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
	                   @endforeach
	                  </select>
				</div>
				<div class="form-group area_id">
					<label>@lang('petition.City Of Permanent Residence')</label>
					<select class="form-control select2" name="area_id"   id="country_region_area" style="width: 100%;">
	                    @foreach($areas as $item)
	                   <option @if($petition->area_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
	                   @endforeach
	                  </select>
				</div>
				
				<div class="form-group address">
					<label>@lang('petition.Address')</label><label class="error">@error('address')! {{ $message }} @enderror</label>
					<input type="text" name="address"   value="{{ $petition->address }}" class="form-control">
				</div>
				<div class="form-group citizenship">
					<label>@lang('petition.Citizenship')</label><label class="error">@error('citizenship')! {{ $message }} @enderror</label>
					<input type="text" name="citizenship"   value="{{ $petition->citizenship }}" class="form-control">
				</div>
				<div class="form-group nationality">
					<label>@lang('petition.Nationality')</label><label class="error">@error('nationality')! {{ $message }} @enderror</label>
					<input type="text" name="nationality"   value="{{ $petition->nationality }}" class="form-control">
				</div>
				<hr class="hhr country_id region_id area_id address citizenship nationality">
				<h3 class="hhr passport_seria passport_image">@lang('petition.Passport Information')</h3>
				<div class="form-group passport_seria">
					<label>@lang('petition.Passport seria and number')</label><label class="error">@error('passport_seria')! {{ $message }} @enderror</label>
					<input type="text" name="passport_seria" value="{{ $petition->passport_seria }}" placeholder="AA1234567" id="passport_seria"   class="form-control">
				</div>
				<div class="form-group passport_image">
					<label>@lang('petition.Upload passport copy (Upload only the main page)')</label><label class="error">@error('passport_image')! {{ $message }} @enderror</label>
					<input type="file" name="passport_image"   class="form-control">
				</div>
				<hr  class=" hhr passport_seria passport_image">
				<h3 class="hhr home_phone mother_phone father_phone mobile_phone">@lang('petition.Contact Information')</h3>
				<div class="form-group home_phone">
					<label>@lang('petition.Home phone number')</label><label class="error">@error('home_phone')! {{ $message }} @enderror</label>
					<input type="text" name="home_phone"   value="{{ $petition->home_phone }}" class="form-control">
				</div>
				<div class="form-group mobile_phone">
					<label>@lang('petition.Mobile phone number')</label><label class="error">@error('mobile_phone')! {{ $message }} @enderror</label>
					<input type="text" name="mobile_phone"   value="{{ $petition->mobile_phone }}" class="form-control">
				</div>
				<div class="form-group father_phone">
					<label>@lang('petition.Father`s phone number')</label><label class="error">@error('father_phone')! {{ $message }} @enderror</label>
					<input type="text" name="father_phone"   value="{{ $petition->father_phone }}" class="form-control">
				</div>
				<div class="form-group mother_phone">
					<label>@lang('petition.Mother`s phone number')</label><label class="error">@error('mother_phone')! {{ $message }} @enderror</label>
					<input type="text" name="mother_phone"   value="{{ $petition->mother_phone }}" class="form-control">
				</div>
				<hr class="hhr home_phone mother_phone father_phone mobile_phone">
				<h3 class="hhr school type_school graduation_date diplom_number diplom_image">@lang('petition.High School (College Information)')</h3>
				<div class="form-group school">
					<label>@lang('petition.Name of school or number')</label><label class="error">@error('school')! {{ $message }} @enderror</label>
					<input type="text" name="school"   value="{{ $petition->school }}" class="form-control">
				</div>
				<div class="form-group type_school">
					<label>@lang('petition.Select type')</label><label class="error">@error('type_school')! {{ $message }} @enderror</label>
					<select class="form-control select2" style="width: 100%;" name="type_school"  >
	                    @foreach($typeschool as $item)
	                    <option @if($petition->type_school == $item->id) selected @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
	                    @endforeach
	                  </select>
				</div>
				<div class="form-group graduation_date">
					<label>@lang('petition.Select graduation date')</label><label class="error">@error('graduation_date')! {{ $message }} @enderror</label>
					<select class="form-control select2" name="graduation_date"   style="width: 100%;">
						@for($i = date('Y'); $i > date('Y')-21 ; $i--)
						<option @if($petition->graduation_date == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
						@endfor
	                    
	                  </select>
				</div>
				<div class="form-group diplom_number">
					<label> @lang('petition.Diploma number')</label><label class="error">@error('diplom_number')! {{ $message }} @enderror</label>
					<input type="text" name="diplom_number"   value="{{ $petition->diplom_number }}" class="form-control">
				</div>
				<div class="form-group diplom_image">
					<label> @lang('petition.Upload Diploma (Upload only diploma)')</label><label class="error">@error('diplom_image')! {{ $message }} @enderror</label>
					<input type="file" name="diplom_image"   class="form-control">
				</div>
				<hr class="hhr school type_school graduation_date diplom_number diplom_image">
				<h3 class="hhr english_degree english_image overall_score_english ilts_number"> @lang('petition.English Proficiency Information')</h3>
				<div class="form-group english_degree">
					<label> @lang('petition.Select type')</label><label class="error">@error('english_degree')! {{ $message }} @enderror</label>
					<select class="form-control select2" name="english_degree"   style="width: 100%;">
	                    @foreach($endegree as $item)
	                    <option @if($petition->english_degree == $item->id) selected @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
	                    @endforeach
	                  </select>
				</div>
				<div class="form-group overall_score_english">
					<label> @lang('petition.Overall band score')</label>
					<input type="text" name="overall_score_english"   value="{{ $petition->overall_score_english }}" class="form-control">
				</div>
				<div class="form-group ilts_number">
					<label> @lang('petition.IELTS Test Report Form Number (only if IELTS)')</label>
					<input type="text" name="ilts_number"   value="{{ $petition->ilts_number }}" class="form-control">
				</div>
				<div class="form-group english_image">
					<label> @lang('petition.Upload test report copy') </label>
					<input type="file" name="english_image"   class="form-control">
				</div>
				<hr class="hhr english_degree english_image overall_score_english ilts_number">
				<h3 class="hhr faculty_id type_education_id type_language_id">
					 @lang('petition.Faculty Selection')
				</h3>
				<div class="form-group faculty_id">
					<label> @lang('petition.Select faculty')</label><label class="error">@error('faculty_id')! {{ $message }} @enderror</label>
					<select class="form-control select2" name="faculty_id"   style="width: 100%;">
	                    @foreach($faculties as $item)
	                    <option @if($petition->faculty_id == $item->id) selected="" @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
	                    @endforeach
	                  </select>
				</div>
				<div class="form-group type_education_id">
					<label>@lang('petition.Type of Education')</label><label class="error">@error('type_education_id')! {{ $message }} @enderror</label>
					<select class="form-control select2" name="type_education_id"   style="width: 100%;">
	                     @foreach($edutypes as $item)
	                    <option @if($petition->type_education_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
	                    @endforeach
	                  </select>
				</div>
				<div class="form-group type_language_id">
					<label>@lang('petition.Language of further education')</label><label class="error">@error('type_language_id')! {{ $message }} @enderror</label>
					<select class="form-control select2" name="type_language_id"   style="width: 100%;">
	                    @foreach($languagetype as $item)
	                    <option  @if($petition->type_language_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
	                    @endforeach
	                  </select>
				</div>
				<div class="form-group disability_status_id">
					<label>@lang('petition.Disability status')</label><label class="error">@error('disability_status_id') ! {{ @message }} @enderror</label>
					<select class="form-control select2" name="disability_status_id"   style="width: 100%;">
	                    @foreach($disability as $item)

	                    <option @if($petition->disability_status_id == $item->id) selected @endif @if($item->name_en == 'No') selected @endif value="{{ $item->id }}">{{ $item->$name_l }}</option>
	                    @endforeach
	                  </select>
				</div>
				<div class="form-group disability_description">
					<label>@lang('petition.Disability description')</label><label class="error">@error('disability_description') ! {{ @message }} @enderror</label>
					<textarea class="form-control"  name="disability_description"  >{{ $petition->disability_description }}</textarea>
				</div>
				<div class="w-100 text-right">
					<button class="btn btn-success">@lang('petition.Send')</button>
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
	function get_edits(id){
		var c_id = id;
      var url = '/get-edits/' + c_id;
      $.ajax({
        url: url,
        type: 'GET',
        success:function(result){
          var regions = $.parseJSON(result);
          $.each(regions , function(key, value) {
            $('.'+value['column']).css({
            	'display' : 'block',
            });
            var comment = value['comment'];
            $('.'+value['column']+' .error').html(comment);
          });
          
        }
      });
	}
	
		$('.form-group').css({
			'display': 'none',
		});
		$('.hhr').css({
			'display': 'none',
		});
		get_edits({{ $petition->id }});
	


	
</script>
@endsection

