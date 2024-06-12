@extends('admin.layouts.master')
@section('title')

Applications
@endsection
@section('content')
@php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp
 <div class="content-wrapper bg-white">
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid bg-white">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        	<div class="col-md-12 bg-white font-weight-bold p-2 mb-3" style="border-radius: 5px;">
        		
        			
        		
        			
        		
        		
        		
        	</div>
        	{{-- @include('admin.pages.patient.create') --}}
        	<div class="col-md-12 bg-white p-3 " style="border-radius: 5px; overflow-x: scroll;">
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
        		<table class="table table-bordered  datatable-enable bg-white " >
        			<thead>
        				<tr>
        					<th>#</th>
        					<th>@lang('admin_index.S.N.M')</th>
        					<th class="media_none">@lang('admin_index.Region')</th>
        					<th class="media_none">@lang('admin_index.Status')</th>
        					<th></th>
                            <th></th>
        					
        				</tr>
        			</thead>
        			<tbody>
        				@php $i=1; @endphp
        				@foreach($petitions as $item)
                        @php
                        if ('App\Comment'::where('pet_id' , $item->id)->where('from_id' , 1)->where('status' , 0)->exists()) {
                            $noreads = count('App\Comment'::where('pet_id' , $item->id)->where('from_id' , 1)->where('status' , 0)->get());
                        }
                         else{
                            $noreads = 0;
                         }
                         @endphp;
                        <tr style="background-color: @if($item->status == 1) #FF6469 @elseif($item->status == 2) #86FF64  @endif">
                            <td>{{ $i }}@php $i++; @endphp</td>
                            <td>{{ $item->last_name }} {{ $item->first_name }} {{ $item->middle_name }}</td>
                            <td class="media_none">{{ $item->getRegion()->$name_l }}</td>
                            <td class="media_none">{{ $item->getStatus() }}</td>
                            <td>
                                <a href="{{ route('petition.show' , ['id' => $item->id]) }}" class="btn btn-default">
                                    <i class="fa fa-eye"></i>
                                    @if($noreads > 0)
                                     <sup>
                                        <i class="fa fa-comment">({{ $noreads }})</i>
                                    </sup> 
                                    @endif
                                </a>
                            </td>
                            <td><a class="btn btn-default"><i class="fas fa-file-pdf"></i></a></td>

                        </tr>
                        @endforeach
        				
        			</tbody>
        		</table>
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