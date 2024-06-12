@extends('admin.layouts.master_admin')
@section('style')
@endsection
@section('content')
<div class="endi_done">
@php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp

                <div class="test_done"></div>
                <div class="applicants">
                    <div class="row_app one">
                        <h3>@lang('menu.All aplicants')</h3>
                        <div class="bottom">
                            <h4 class="all_count">0</h4>
                        </div>
                    </div>
                    <div class="row_app two">
                        <h3>@lang('menu.Accepted')</h3>
                        <div class="bottom">
                            <h4 class="accepted_count">0</h4>
                        </div>
                    </div>
                    <div class="row_app three">
                        <h3>@lang('menu.Rejected')</h3>
                        <div class="bottom">
                            <h4 class="return_count">0</h4>
                        </div>
                    </div>
                    <div class="row_app four">
                        <h3>@lang('menu.Waiting')</h3>
                        <div class="bottom">
                            <h4 class="wait_count">0</h4>
                        </div>
                    </div>
                </div>

                <div class="back_div">
                    <div>
                        <div class="tab_index">
                            <ul>
                                <li pdf-url="{{ route('export_all_excel') }}" class="act_li all_pet f_tab" >@lang('menu.All applications')</li>
                                <li pdf-url="{{ route('export_wait_excel') }}" class="wait_pet f_tab">@lang('menu.New applications')</li>
                                <li pdf-url="{{ route('export_return_excel') }}" class="return_pet f_tab">@lang('menu.Returned applications')</li>
                                <li pdf-url="{{  route('export_acc_excel') }}" class="acc_pet f_tab">@lang('menu.Accepted applications')</li>
                            </ul>
                            <a href="{{ route('export_all_excel') }}" class="export_pdf">EXCEL EXPORT</a>
                        </div>
                        <div class="tab_content">
                            <aside class="active">
                                <table id="myTable1" class="tb">
                                    <thead>
                                        <th>#</th>
                                        <th>FULL NAME</th>
                                        <th>REGISTRATION DATE</th>
                                        <th>FACULTY</th>
                                        @if(Auth::user()->role == 3)
                                        <th>
                                        	
                                        </th>
                                        @endif
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </aside>
                            <aside>
                                <table id="myTable2" class="tb">
                                    <thead>
                                        <th>#</th>
                                        <th>FULL NAME</th>
                                        <th>REGISTRATION DATE</th>
                                        <th>FACULTY</th>
                                        @if(Auth::user()->role == 3)
                                        <th>
                                        	
                                        </th>
                                        @endif
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </aside>
                            <aside>
                                <table id="myTable3" class="tb">
                                    <thead>
                                        <th>#</th>
                                        <th>FULL NAME</th>
                                        <th>REGISTRATION DATE</th>
                                        <th>FACULTY</th>
                                        @if(Auth::user()->role == 3)
                                        <th>
                                        	
                                        </th>
                                        @endif
                                    </thead>
                                    <tbody>
    
                                        
                                    </tbody>
                                </table>
                            </aside>
                            <aside>
                                <table id="myTable4" class="tb">
                                    <thead>
                                        <th>#</th>
                                        <th>FULL NAME</th>
                                        <th>REGISTRATION DATE</th>
                                        <th>FACULTY</th>
                                        @if(Auth::user()->role == 3)
                                        <th>
                                        	
                                        </th>
                                        @endif
                                    </thead>
                                    <tbody>
    
                                     
                                    </tbody>
                                </table>
                            </aside>
                        </div>
                    </div>
                </div>    

            </div>
@endsection
@section('js')
  <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

<script type="text/javascript">
	function all_app_count(){
		var url = '{{ route('all_app_count') }}';
		$.ajax({
			url: url,
			type: 'GET',
			success:function(result){
				$('.all_count').html(result);
			}
		});
	}
	function acc_app_count(){
		var url = '{{ route('acc_app_count') }}';
		$.ajax({
			url: url,
			type: 'GET',
			success:function(result){
				$('.accepted_count').html(result);
			}
		});
	}
	function return_app_count(){
		var url = '{{ route('return_app_count') }}';
		$.ajax({
			url: url,
			type: 'GET',
			success:function(result){
				$('.return_count').html(result);
			}
		});
	}
	function wait_app_count(){
		var url = '{{ route('wait_app_count') }}';
		$.ajax({
			url: url,
			type: 'GET',
			success:function(result){
				$('.wait_count').html(result);
			}
		});
	}
	function get_all_totable(){
		var url = '{{ route('get_all_totable') }}';
		$.ajax({
			url: url,
			type: 'GET',
			success:function(result){
				var pets = JSON.parse(result);
				var tbody = '';
				var name_l = 'name_'+'{{ App::getLocale() }}';
				var i = 1;
				$.each(pets, function(key , value){
					@if(Auth::user()->role == 3)
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td><td>'+value['email']+'</td></tr>';
					@else
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td></tr>';
					@endif
					$newtab = '<td><button></button></td>';
					i++;

				});
				$('#myTable1 tbody').html(tbody);
				$('#myTable1').DataTable().destroy();
				 $('#myTable1').DataTable();
				

			}
		});
	}
	function get_acc_totable(){
		var url = '{{ route('get_acc_totable') }}';
		$.ajax({
			url: url,
			type: 'GET',
			success:function(result){
				var pets = JSON.parse(result);
				var tbody = '';
				var name_l = 'name_'+'{{ App::getLocale() }}';
				var i = 1;
				$.each(pets, function(key , value){
					@if(Auth::user()->role == 3)
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td><td>'+value['email']+'</td></tr>';
					@else
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td></tr>';
					@endif
					i++;
				});
				$('#myTable4 tbody').html(tbody);
				$('#myTable4').DataTable().destroy();
				 $('#myTable4').DataTable();
				

			}
		});
	}
	function get_return_totable(){
		var url = '{{ route('get_return_totable') }}';
		$.ajax({
			url: url,
			type: 'GET',
			success:function(result){
				var pets = JSON.parse(result);
				var tbody = '';
				var name_l = 'name_'+'{{ App::getLocale() }}';
				var i = 1;
				$.each(pets, function(key , value){
					@if(Auth::user()->role == 3)
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td><td>'+value['email']+'</td></tr>';
					@else
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td></tr>';
					@endif
					i++;
				});
				$('#myTable3 tbody').html(tbody);
				$('#myTable3').DataTable().destroy();

				 $('#myTable3').DataTable();
				

			}
		});
	}
	function get_wait_totable(){
		var url = '{{ route('get_wait_totable') }}';
		$.ajax({
			url: url,
			type: 'GET',
			success:function(result){
				var pets = JSON.parse(result);
				var tbody = '';
				var name_l = 'name_'+'{{ App::getLocale() }}';
				var i = 1;
				$.each(pets, function(key , value){
					@if(Auth::user()->role == 3)
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td><td>'+value['email']+'</td></tr>';
					@else
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td></tr>';
					@endif
					i++;
				});
				$('#myTable2 tbody').html(tbody);
				$('#myTable2').DataTable().destroy();
				 $('#myTable2').DataTable();
				

			}
		});
	}
	function downloadURI(uri, name) {
	  var link = document.createElement("a");
	  link.download = name;
	  link.href = uri;
	  document.body.appendChild(link);
	  link.click();
	  document.body.removeChild(link);
	  delete link;
	}
</script>

<script type="text/javascript">
	all_app_count();
	acc_app_count();
	return_app_count();
	wait_app_count();
	get_all_totable();
	$('.all_pet').click(function(event) {
		get_all_totable();
		var pdf = $(this).attr('pdf-url');
		$('.export_pdf').attr('href' , pdf);
	});
	$('.wait_pet').click(function(event) {
		get_wait_totable();
		var pdf = $(this).attr('pdf-url');
		$('.export_pdf').attr('href' , pdf);
	});
	$('.return_pet').click(function(event) {
		get_return_totable();
		var pdf = $(this).attr('pdf-url');
		$('.export_pdf').attr('href' , pdf);
	});
	$('.acc_pet').click(function(event) {
		get_acc_totable();
		var pdf = $(this).attr('pdf-url');
		$('.export_pdf').attr('href' , pdf);
	});

	

	$('.tb').on('click', 'tbody tr', function () {
		  var url = $(this).attr('href');
		  window.open(url , '_blank');
		});

	// $('.export_pdf').click(function(){
	// 	window.location.href = $(this).attr('dhref');
	// 	// var url = $(this).attr('dhref');
	// 	// $.ajax({
	// 	// 	url: url,
	// 	// 	type: 'GET',
	// 	// 	success:function(result){
	// 	// 		var kkk = '/kkk/'+result;
	// 	// 		window.location.href = kkk;
	// 	// 	}
	// 	// });
	// });

	
	
</script>

@endsection