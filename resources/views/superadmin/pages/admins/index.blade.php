@extends('admin.layouts.master_admin')
@section('style')
@endsection
@section('content')
<div class="endi_done">
@php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp

                <div class="test_done"></div>
                <div class="applicants" style="background-color: transparent !important;">
                	<div class="row">
                		<a href="#" class="btn btn-default" data-toggle="modal" data-target="#createModal" style="color: white !important;"> <i class="fa fa-plus"></i> Qo`shish </a>
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
                	</div>
        	@include('superadmin.pages.admins.create')

               	</div>
                <div class="back_div">
                    <div>
                        <div class="tab_content">
                            <aside class="active">
                                <table id="myTable1" class="tb">
                                    <thead>
                                        <th>#</th>
                                        <th>F.I.O</th>
                                        <th>Vazifasi</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
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
                                <a class="btn btn-default" data-toggle="modal" data-target="#new_password{{ $item->id }}"><i class="fa fa-key"></i></a>
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
                            </aside>
                        </div>
                    </div>
                </div>    

            </div>
@endsection
@section('js')
<script type="text/javascript">
$('#myTable1').DataTable();
    
</script>
@endsection