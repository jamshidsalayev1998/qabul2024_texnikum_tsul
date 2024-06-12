@extends('admin.layouts.master')
@section('title')

Applications
@endsection
@section('content')
@php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp
 <div class="content-wrapper">
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        	<div class="col-md-12 bg-white font-weight-bold p-2 mb-3" style="border-radius: 5px;">
        		
        			
        		
        			<a href="{{ route('admin.petitions.pdf') }}" class="btn btn-default"> <i class="fas fa-file-pdf"></i> @lang('admin_index.PDF Export') </a>
        		
        			{{-- <a href="#" class="btn btn-default"> <i class="fas fa-file-excel"></i> @lang('admin_index.EXCEL Export') </a> --}}
        		
        		
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
        		<table class="table table-bordered  table-hover bg-white " >
        			<thead>
        				<tr>
        					<th>#</th>
        					<th class="media_none">@lang('admin_index.Region')</th>
        					<th class="media_none">@lang('admin_index.Area')</th>
                            <th>Adress</th>
        					<th></th>
        					
        				</tr>
        			</thead>
        			<tbody>
        				@php $i=1; @endphp
        				@foreach($petitions as $item)
                        <form method="post" action="{{ route('super_update' , ['id' => $item->id]) }}">
                            @csrf
                            @method('put')
                            <tr>
                                <td>{{ $i }}@php $i++; @endphp</td>
                                <td class="media_none">
                                    <select class="form-control select2" name="region_id">
                                        <option>-------</option>
                                        @foreach($regions as $region)
                                        <option @if($item->region_id == $region->id) selected @endif value="{{ $region->id }}">{{ $region->$name_l }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="media_none">
                                    <select name="area_id" class="form-control select2">
                                    <option>-------</option>
                                        @foreach($area as $a)
                                        <option @if($item->area_id == $a->id) selected @endif value="{{ $a->id }}">{{ $a->$name_l }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    {{ $item->address }}
                                </td>
                                <td><button class="btn btn-default"><i class="fa fa-check"></i></button></td>

                            </tr>
                        </form>
                        @endforeach
        				{{ $petitions->links() }}
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