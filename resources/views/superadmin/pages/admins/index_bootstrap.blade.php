@extends('admin.layouts.master')
@section('title')

Admins
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
        		
        			
        		
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#createModal" style="color: white !important;"> <i class="fas fa-plus"></i> Qo`shish </a>
        			<a href="#" class="btn btn-default"> <i class="fas fa-file-pdf"></i> @lang('admin_index.PDF Export') </a>
        		
        			<a href="#" class="btn btn-default"> <i class="fas fa-file-excel"></i> @lang('admin_index.EXCEL Export') </a>
        		
        		
        	</div>
        	@include('superadmin.pages.admins.create')
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
        		<table class="table table-bordered datatable-enable  bg-white " >
        			<thead>
        				<tr>
        					<th>
                                    #               
                            </th>
                            <th>
                                F.I.O
                            </th>
                            <th>
                                Vazifasi
                            </th>
                            <th>
                                
                            </th>
                            <th>
                                
                            </th>
                            <th>
                                
                            </th>
        					
        				</tr>
        			</thead>
        			<tbody>
        				@php $i=1; @endphp
        				@foreach($data as $item)
                        <tr>
                            <td style="width: 1px;">{{ $i }}@php $i++; @endphp</td>
                            <td>
                                {{ $item->fio() }}
                            </td>
                            <td>
                                @if($item->getRole() == 1)
                                Kuzatuvchi
                                @endif
                                @if($item->getRole() == 2)
                                Tekshiruvchi
                                @endif
                            </td>
                            <td class="text-center" style="width: 1px;">
                                <a class="btn btn-default" data-toggle="modal" data-target="#new_password{{ $item->id }}"><i class="fas fa-key"></i></a>
                                @include('superadmin.pages.admins.new_password')

                            </td>
                            <td class="text-center" style="width: 1px;">
                                <a class="btn btn-default" data-toggle="modal" data-target="#edit_modal{{ $item->id }}"><i style="color: blue" class="fa fa-edit"></i></a>
                                @include('superadmin.pages.admins.edit')

                            </td>
                            <td class="text-center" style="width: 1px;">
                                <form action="{{ route('admins.delete' , ['id' => $item->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('Ma`lumotni o`chirasizmi')"> <i class="fa fa-trash"></i> </button>
                                    
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