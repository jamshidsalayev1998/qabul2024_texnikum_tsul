<table>
@php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp
	
	<thead>
		<tr>
			<td>
				Abiturient full name
			</td>
			<td>
				Email/Phone
			</td>
			<td>
				Gender
			</td>
			<td>
				Birth date
			</td>
			<td>
				Country
			</td>
			<td>
				Region
			</td>
			<td>
				Area
			</td>
			<td>
				Address
			</td>
			<td>
				Citizenship
			</td>
			<td>
				Nationality
			</td>

			<td>
				Passport number
			</td>
			<td>
				Home phone
			</td>
			<td>
				Mother phone
			</td>
			<td>
				Father phone
			</td>
			<td>
				Mobile phone
			</td>
			<td>
				Name of school
			</td>
			<td>
				Type of school
			</td>
			<td>
				Graduation date
			</td>
			<td>
				Diplom number
			</td>
			<td>
				English degree
			</td>
			<td>
				Band
			</td>
			<td>
				Number(Certificate Number)
			</td>
			<td>
				Faculty
			</td>
			<td>
				Type of education 
			</td>
			<td>
				Language of education 
			</td>
			<td>
				Disability 
			</td>
			<td>
				Disability info 
			</td>
			<td>
				Univer
			</td>

		</tr>
	</thead>
	<tbody>
		@foreach($petitions as $item)
		<tr>
			<td>
				{{ $item->last_name }} {{ $item->first_name }} {{ $item->middle_name }}
			</td>
			<td>
				 tel: {{ $item->user->email }}
			</td>
			<td>
				@if($item->gender == 0)
				Female
				@else
				Male
				@endif
			</td>
			<td>
				{{ $item->birth_date }}
			</td>
			<td>
				{{ $item->country->$name_l ?? ''}}
			</td>
			<td>
				{{ $item->region->$name_l ?? '' }}
			</td>
			<td>
				{{ $item->area->$name_l ?? '' }}
			</td>
			<td>
				{{ $item->address }}
			</td>
			<td>
				{{ $item->citizenship }}
			</td>
			<td>
				{{ $item->nationality }}
			</td>
			<td>
				{{ $item->passport_seria }}
			</td>
			<td>
				tel: {!!  $item->home_phone !!}
				
				
			</td>
			<td>
				tel: {!! $item->mother_phone !!}
			</td>
			<td>
				tel: {!!  $item->father_phone !!}
			</td>
			<td>
				tel: {!! $item->mobile_phone !!}
			</td>
			<td>
				{{ $item->school }}
			</td>
			<td>
                @if($item->type_school_student)
				{{ $item->type_school_student->$name_l }}
                    @endif
			</td>
			<td>
				{{ $item->graduation_date }}
			</td>
			<td>
				'{{ $item->diplom_number }}'
			</td>
			<td>
				{{ $item->english_degree_student->$name_l }}
			</td>
			<td>
				{{ $item->overall_score_english }}
			</td>
			<td>
				{{ $item->ilts_number }}
			</td>
			<td>
                @if($item->faculty)
				{{ $item->faculty->$name_l}}
                    @endif
			</td>
			<td>
				{{ $item->type_education->$name_l }}
			</td>
			<td>
				{{ $item->type_language->$name_l }}
			</td>
			<td>
				{{ $item->disability_status->$name_l ?? ''}}
			</td>
			<td>
				{{ $item->disability_description }}
			</td>
			<td>
				{{ $item->high_school->$name_l }}
			</td>
			
		</tr>
		@endforeach
	</tbody>
</table>