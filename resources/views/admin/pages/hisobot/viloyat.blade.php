@extends('admin.layouts.master')
@section('title')

Applications
@endsection
@section('content')
@php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp
<style type="text/css">
    .a_href{
        cursor: pointer;
    }
</style>
 <div class="content-wrapper">
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        	<div class="col-md-12 bg-white font-weight-bold p-2 mb-3" style="border-radius: 5px;">
        		
        			
        		
        			<a href="{{ route('admin.reports.pdf') }}" class="btn_pdf btn btn-default"> <i class="fas fa-file-pdf"></i> @lang('admin_index.PDF Export') </a>
        		
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
                <div class="table_pdf">
        		<table class="table  table-bordered datatable-enable table-hover  bg-white " >
        			<thead>
        				<tr>
        					<th>#</th>
        					<th>@lang('petition.Region')</th>
        					<th >@lang('petition.Ayollar')</th>
                            <th >@lang('petition.Erkaklar')</th>
        					<th >@lang('petition.Umumiy')</th>
        					
        					
        				</tr>
        			</thead>
        			<tbody>
        				@php $i=1; $um_ay = 0; $um_er = 0; $umumiy = 0;@endphp
        				@foreach($data as $item)
                    
                            <tr data-href = "{{ route('admin.reports.area' , ['id' => $item->id]) }}" class="a_href">
                                <td>{{ $i }}@php $i++; @endphp</td>
                                <td>{{ $item->$name_l }}</td>
                                <td >{{ $item->ayollar }}</td>
                                <td >{{ $item->erkaklar }}</td>
                                <td>@php $um = $item->ayollar + $item->erkaklar; $um_ay += $item->ayollar; $um_er += $item->erkaklar; $umumiy += $um; @endphp {{ $um }}</td>
                            </tr>
                        
                        @endforeach

        				
        			</tbody>
                    <tfoot>
                        <tr>
                            <td>
                                
                            </td>
                            <td>
                                @lang('petition.Umumiy')
                            </td>
                            <td>
                                {{ $um_ay }}
                            </td>
                            <td>
                                {{ $um_er }}
                            </td>
                            <td>
                                {{ $umumiy }}
                            </td>
                        </tr>
                    </tfoot>
        		</table>
            </div>
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
    $('.a_href').click(function(){
        var url = $(this).attr('data-href');
        location.href = url;
    });
   
</script>
@endsection