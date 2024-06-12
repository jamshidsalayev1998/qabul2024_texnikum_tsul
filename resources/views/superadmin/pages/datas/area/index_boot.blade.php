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
        <div class="row mt-2">
        	<div class="col-md-12 bg-white font-weight-bold p-2 mb-3" style="border-radius: 5px;">
        		
        			
        		
        			<a href="#" class="btn btn-default" data-toggle="modal" data-target="#create_modal"> <i class="fa fa-plus"></i> Qo`shish </a>
        		
        			{{-- <a href="#" class="btn btn-default"> <i class="fas fa-file-excel"></i> @lang('admin_index.EXCEL Export') </a> --}}
        		@include('superadmin.pages.datas.area.create')
        		
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
        		<table class="table table-bordered datatable-enable table-hover bg-white " >
        			<thead>
        				<tr>
        					<th>#</th>
                            <th>@lang('petition.Region')</th>
        					<th>Uz</th>
        					<th>En</th>
        					<th>RU</th>
        					<th></th>
                            <th></th>
        					
        				</tr>
        			</thead>
        			<tbody>
        				@php $i=1; @endphp
        				@foreach($areas as $item)
                        <tr>
                            <td>{{ $i }}@php $i++; @endphp</td>
                            <td>{{ $item->getRegion()->$name_l }}</td>
                            <td>{{ $item->name_uz }}</td>
                            <td >{{ $item->name_en  }}</td>
                            <td >{{ $item->name_ru  }}</td>
                            
                            <td>
                                <button class="btn btn-default"  data-toggle="modal" data-target="#edit_modal{{ $item->id }}"><i class="fa fa-edit"></i></button>
                                @include('superadmin.pages.datas.area.edit')
                            </td>
                            <td>
                                <form action="{{ route('area.delete' , ['id' => $item->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-default" onclick="return confirm('Ma`lumotni o`chirasizmi')"> <i class="fa fa-trash"></i> </button>
                                    
                                </form>
                            </td>

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