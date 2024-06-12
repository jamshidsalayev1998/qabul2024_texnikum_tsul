@extends('admin.layouts.master_admin')
@section('style')
<style type="text/css">
    ul{
        list-style-type: none;
    }
    hr{
        margin: 0px !important;
    }
</style>
@endsection
@section('content')
<div class="endi_done">
@php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp

                <div class="test_done"></div>
                <div class="applicants" style="background-color: transparent !important;">
                	<div class="row">
                		<a href="#" class="btn btn-default" data-toggle="modal" data-target="#create_modal" style="color: white !important;"> <i class="fa fa-plus"></i> Qo`shish </a>
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
                    <style>
                        table tbody td{
                            font-size: 13px !important;
                            padding: 8px !important;
                        }

                    </style>
        	@include('superadmin.pages.datas.faculty.create')

               	</div>
                <div class="back_div">
                    <div>
                        <div class="tab_content">
                            <aside class="active">
                                <table id="myTable1" class="tb">
                                    <thead>
                                        <th>Uz</th>
        					<th>En</th>
        					<th>RU</th>
        					<th>Talim tashkiloti</th>
                            <th>Talim turlari</th>
                            <th>Talim tillari</th>
        					<th style="width: 1px;"></th>
                            {{-- <th style="width: 1px;"></th> --}}
                            <th style="width: 1px;"></th>
                                    </thead>
                                    <tbody>
                                    	@php $i=1; @endphp
        				@foreach($faculties as $item)
                        <tr>
                            <td >{{ $item->name_uz }}</td>
                            <td >{{ $item->name_en  }}</td>
                            <td >{{ $item->name_ru  }}</td>
                            <td >@if($item->high_school) {{$item->high_school->name_uz}} @endif</td>
                            <td>
                                <ul>
                                    @php $tt = count($item->getEduTypes()); $i = 0;@endphp
                                    @foreach($item->getEduTypes() as $etyp)
                                    <li>
                                        {{ $etyp->$name_l }}
                                    </li>
                                    @if(++$i != $tt)
                                    <hr>
                                    @endif
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @php $tt = count($item->getLangTypes()); $i = 0;@endphp
                                    @foreach($item->getLangTypes() as $ltyp)
                                    <li>
                                        {{ $ltyp->$name_l }}
                                    </li>
                                     @if(++$i != $tt)
                                    <hr>
                                    @endif
                                    @endforeach
                                </ul>
                            </td>

                            <td class="text-left">
                                {{-- <a href="#" data-toggle="modal" data-target="#edit_modal{{ $item->id }}"><i class="fa fa-edit"></i></a> --}}
                                <button class="btn btn-default"  data-toggle="modal" data-target="#edit_modal{{ $item->id }}"><i class="fa fa-edit"></i></button>
                                @include('superadmin.pages.datas.faculty.edit')

                            </td>

                            {{-- <td>
                                <form action="{{ route('faculty.delete' , ['id' => $item->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('Ma`lumotni o`chirasizmi')"> <i class="fa fa-trash"></i> </button>

                                </form>
                            </td> --}}
                            <td style="padding: 0px !important; width: 1px !important;">
                                <input type="checkbox" data-id="{{ $item->id }}" class="faculty_switcher" @if($item->status == 1) checked @endif data-toggle="toggle">
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
$('.faculty_switcher').change(function(){
    var value = 1;
    if($(this).is(':checked')){
        value = 1;
    }
    else{
        value = 0;
    }
    var id = $(this).attr('data-id');
    var tt = confirm('Fakultet holatini o`zgartirasizmi ?');
    if(tt){
        var url = '/change-faculty-status/'+id+'/'+value;
        window.location.href = url;
    }
    else{
        if(value == 0){
            var $this = $(this);
            var state = $this.prop('checked');
            //on error
            $this.prop('checked', !state).bootstrapToggle('destroy').bootstrapToggle();
        }
        if(value == 1){
            var $this = $(this);
            var state = $this.prop('checked');
            //on error
            $this.prop('checked', !state).bootstrapToggle('destroy').bootstrapToggle();

        }
    }
});
$(document).ready(function(){
    $('#myTable1').DataTable();

});

</script>
@endsection
