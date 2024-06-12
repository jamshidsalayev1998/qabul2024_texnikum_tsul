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
                            	<div class="form-group col-md-3 pt-2 float-right">
                            		<input type="" name="all" class="form-control search">
                            	</div>
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
                                <div class="pgg myTable1_pag mt-3 " id="pagination-container">
                                	
                                </div>
                                {{-- <ul class="pgg myTable1_pag mt-3 " id="pagination-demo1" > --}}
								    {{-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> --}}
								    {{-- <li class="page-item"><a onclick="return alert('dsdsds')" class="page-link" href="#">1</a></li> --}}
								    {{-- <li class="page-item"><a class="page-link" href="#">2</a></li> --}}
								    {{-- <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
								    {{-- <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
								  {{-- </ul> --}}


                            </aside>
                            <aside>
                            	<div class="form-group col-md-3 pt-2 float-right">
                            		<input type="" name="wait" class="form-control search">
                            	</div>
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
                                 <ul class="pgg myTable2_pag mt-3 " id="pagination-demo2" >
								    {{-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> --}}
								    {{-- <li class="page-item"><a onclick="return alert('dsdsds')" class="page-link" href="#">1</a></li> --}}
								    {{-- <li class="page-item"><a class="page-link" href="#">2</a></li> --}}
								    {{-- <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
								    {{-- <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
								  </ul>
                            </aside>
                            <aside>
                            	<div class="form-group col-md-3 pt-2 float-right">
                            		<input type="" name="return" class="form-control search">
                            	</div>
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
                                 <ul class="pgg myTable3_pag mt-3 " id="pagination-demo3" >
								    {{-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> --}}
								    {{-- <li class="page-item"><a onclick="return alert('dsdsds')" class="page-link" href="#">1</a></li> --}}
								    {{-- <li class="page-item"><a class="page-link" href="#">2</a></li> --}}
								    {{-- <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
								    {{-- <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
								  </ul>
                            </aside>
                            <aside>
                            	<div class="form-group col-md-3 pt-2 float-right">
                            		<input type="" name="acc" class="form-control search">
                            	</div>
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
                                 <ul class="pgg myTable4_pag mt-3 " id="pagination-demo4" >
								    {{-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> --}}
								    {{-- <li class="page-item"><a onclick="return alert('dsdsds')" class="page-link" href="#">1</a></li> --}}
								    {{-- <li class="page-item"><a class="page-link" href="#">2</a></li> --}}
								    {{-- <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
								    {{-- <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
								  </ul>
                            </aside>
                        </div>
                    </div>
                </div>    

            </div>
@endsection
@section('js')
  <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

  <script type="text/javascript">
  	$('.search').on('keypress', function(e) {
	    var code = e.keyCode || e.which;
	    if(code==13){
	        var data = $(this).val();
	        if ($(this).attr('name') == 'all') {
	        	var url = '/search-all/'+data;
	        	var table = '#myTable1';
	        	var pag = '#pagination-demo1';
	        	if ($(this).val() == '') {
	        		get_all_totable('{{ route('get_all_totable') }}');
	        	}
	        }
	        if ($(this).attr('name') == 'acc') {
	        	var url = '/search-acc/'+data;
	        	var table = '#myTable4';
	        	var pag = '#pagination-demo4';
	        	if ($(this).val() == '') {
	        		get_acc_totable( '{{ route('get_acc_totable') }}');
	        	}
	        }
	        if ($(this).attr('name') == 'wait') {
	        	var url = '/search-wait/'+data;
	        	var table = '#myTable2';
	        	var pag = '#pagination-demo2';
	        	if ($(this).val() == '') {
	        		get_wait_totable( '{{ route('get_wait_totable') }}');
	        	}
	        }
	        if ($(this).attr('name') == 'return') {
	        	var url = '/search-return/'+data;
	        	var table = '#myTable3';
	        	var pag = '#pagination-demo3';
	        	if ($(this).val() == '') {
	        		get_return_totable( '{{ route('get_return_totable') }}');
	        	}
	        }
	        $.ajax({
				url: url,
				type: 'GET',
				success:function(result){
					var pets = JSON.parse(result);
					console.log(pets);
					var tbody = '';
					var name_l = 'name_'+'{{ App::getLocale() }}';
					var i = 1;
					$.each(pets.data, function(key , value){
						@if(Auth::user()->role == 3)
						tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td><td>'+value['email']+'</td></tr>';
						@else
						tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td></tr>';
						@endif
						$newtab = '<td><button></button></td>';
						i++;

					});
					var page = '<li class="page-item"><a class="page-link" href="#">Previous</a></li>';
					for (var i = 1; i <= pets.last_page; i++) {
						page = page + '<li class="page-item"><a onclick="return chichi('+i+')" class="page-link">'+i+'</a></li>';
					}
					page = page + '<li class="page-item"><a class="page-link" href="#">Next</a></li>';
					// $('.myTable1_pag').html(page);
					$(table+' tbody').html(tbody);
					  $(pag).twbsPagination({
					        totalPages: pets.last_page,
					        visiblePages: 10,
					        onPageClick: function (event, page) {
					        	chichi(page);
					        	// alert(page);
					            // $('#page-content').text('Page ' + page);
					        }
					    });
				}
			});
	    }
	});
  </script>

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
	function get_all_totable(url){
		// var url = '{{ route('get_all_totable') }}';
		$.ajax({
			url: url,
			type: 'GET',
			success:function(result){
				var pets = JSON.parse(result);
				console.log(pets);
				var tbody = '';
				var name_l = 'name_'+'{{ App::getLocale() }}';
				var i = 1;
				$.each(pets.data, function(key , value){
					@if(Auth::user()->role == 3)
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td><td>'+value['email']+'</td></tr>';
					@else
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td></tr>';
					@endif
					$newtab = '<td><button></button></td>';
					i++;

				});
				var page = '<li class="page-item"><a class="page-link" href="#">Previous</a></li>';
				for (var i = 1; i <= pets.last_page; i++) {
					page = page + '<li class="page-item"><a onclick="return chichi('+i+')" class="page-link">'+i+'</a></li>';
				}
				page = page + '<li class="page-item"><a class="page-link" href="#">Next</a></li>';
				// $('.myTable1_pag').html(page);
				$('#myTable1 tbody').html(tbody);
				  // $('#pagination-demo1').twbsPagination({
				  //       totalPages: pets.last_page,
				  //       visiblePages: 10,
				  //       onPageClick: function (event, page) {
				  //       	chichi(page);
				  //       	// alert(page);
				  //           // $('#page-content').text('Page ' + page);
				  //       }
				  //   });
				  var tt = [];
				  for (var i = 1; i <= pets.total; i++) {
				  	tt[i] = i;
				  }
				   $('#pagination-container').pagination({
				        dataSource: tt,
				         callback: function(data, pagination) {
				         	console.log(pagination);
				         	// chichi(pagination.pageNumber);
					        // template method of yourself
					        // var html = template(data);
					        // dataContainer.html(html);
					    }
				    });
				// $('#myTable1').DataTable().destroy();
				//  $('#myTable1').DataTable();
				

			}
		});
	}
	function get_acc_totable(url){
		// var url = '{{ route('get_acc_totable') }}';
		$.ajax({
			url: url,
			type: 'GET',
			success:function(result){
				var pets = JSON.parse(result);
				var tbody = '';
				var name_l = 'name_'+'{{ App::getLocale() }}';
				var i = 1;
				$.each(pets.data, function(key , value){
					@if(Auth::user()->role == 3)
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td><td>'+value['email']+'</td></tr>';
					@else
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td></tr>';
					@endif
					i++;
				});
				var page = '<li class="page-item"><a class="page-link" href="#">Previous</a></li>';
				for (var i = 1; i <= pets.last_page; i++) {
					page = page + '<li class="page-item"><a onclick="return chichi('+i+')" class="page-link">'+i+'</a></li>';
				}
				page = page + '<li class="page-item"><a class="page-link" href="#">Next</a></li>';
				$('#myTable4 tbody').html(tbody);
				$('#myTable4 tbody').html(tbody);
				  $('#pagination-demo4').twbsPagination({
				        totalPages: pets.last_page,
				        visiblePages: 10,
				        onPageClick: function (event, page) {
				        	chichi4(page);
				        	// alert(page);
				            // $('#page-content').text('Page ' + page);
				        }
				    });
				// $('#myTable4').DataTable().destroy();
				//  $('#myTable4').DataTable();
				

			}
		});
	}
	function get_return_totable(url){
		// var url = '{{ route('get_return_totable') }}';
		$.ajax({
			url: url,
			type: 'GET',
			success:function(result){
				var pets = JSON.parse(result);
				var tbody = '';
				var name_l = 'name_'+'{{ App::getLocale() }}';
				var i = 1;
				$.each(pets.data, function(key , value){
					@if(Auth::user()->role == 3)
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td><td>'+value['email']+'</td></tr>';
					@else
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td></tr>';
					@endif
					i++;
				});
				var page = '<li class="page-item"><a class="page-link" href="#">Previous</a></li>';
				for (var i = 1; i <= pets.last_page; i++) {
					page = page + '<li class="page-item"><a onclick="return chichi('+i+')" class="page-link">'+i+'</a></li>';
				}
				page = page + '<li class="page-item"><a class="page-link" href="#">Next</a></li>';
				$('#myTable3 tbody').html(tbody);
				 $('#pagination-demo3').twbsPagination({
				        totalPages: pets.last_page,
				        visiblePages: 10,
				        onPageClick: function (event, page) {
				        	chichi3(page);
				        	// alert(page);
				            // $('#page-content').text('Page ' + page);
				        }
				    });
				// $('#myTable3').DataTable().destroy();

				//  $('#myTable3').DataTable();
				

			}
		});
	}
	function get_wait_totable(url){
		// var url = '{{ route('get_wait_totable') }}';
		$.ajax({
			url: url,
			type: 'GET',
			success:function(result){
				var pets = JSON.parse(result);
				var tbody = '';
				var name_l = 'name_'+'{{ App::getLocale() }}';
				var i = 1;
				$.each(pets.data, function(key , value){
					@if(Auth::user()->role == 3)
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td><td>'+value['email']+'</td></tr>';
					@else
					tbody = tbody +'<tr class="href_tr" href="/applications-show/'+value['id']+'"><td>'+i+'</td><td>'+value['last_name']+' '+value['first_name']+' '+value['middle_name'] + '</td><td>'+value['created_at']+'</td><td>'+value[name_l]+'</td></tr>';
					@endif
					i++;
				});
				var page = '<li class="page-item"><a class="page-link" href="#">Previous</a></li>';
				for (var i = 1; i <= pets.last_page; i++) {
					page = page + '<li class="page-item"><a onclick="return chichi('+i+')" class="page-link">'+i+'</a></li>';
				}
				page = page + '<li class="page-item"><a class="page-link" href="#">Next</a></li>';
				$('#myTable2 tbody').html(tbody);
				 $('#pagination-demo2').twbsPagination({
				        totalPages: pets.last_page,
				        visiblePages: 10,
				        onPageClick: function (event, page) {
				        	chichi2(page);
				        	// alert(page);
				            // $('#page-content').text('Page ' + page);
				        }
				    });
				// $('#myTable2').DataTable().destroy();
				//  $('#myTable2').DataTable();
				

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
	function chichi(id){
		// alert(id);
		var url = '/get_all_totable?page='+id;
		get_all_totable(url);
	}
	function chichi4(id){
		// alert(id);
		var url = '/get_acc_totable?page='+id;
		get_acc_totable(url);
	}
	function chichi2(id){
		// alert(id);
		var url = '/get_wait_totable?page='+id;
		get_wait_totable(url);
	}
	function chichi3(id){
		// alert(id);
		var url = '/get_return_totable?page='+id;
		get_return_totable(url);
	}
</script>

<script type="text/javascript">
	all_app_count();
	acc_app_count();
	return_app_count();
	wait_app_count();
	get_all_totable('{{ route('get_all_totable') }}');
		// get_all_totable('{{ route('get_all_totable') }}');

		get_wait_totable('{{ route('get_wait_totable') }}');

		get_return_totable('{{ route('get_return_totable') }}');

		get_acc_totable( '{{ route('get_acc_totable') }}');
	
    // $('#pagination-demo').pagination({
    //     items: 518,
    //     itemOnPage: 10,
    //     currentPage: 1,
    //     cssStyle: '',
    //     prevText: '<span aria-hidden="true">&laquo;</span>',
    //     nextText: '<span aria-hidden="true">&raquo;</span>',
    //     onInit: function () {
    //         // fire first page loading

    //     },
    //     onPageClick: function (page, evt) {
    //         // some code
    //         chichi(page);
    //     }
    // });
	// $('.page-link').click(function(){
	// 	// var url = $(this).attr('dd-href');
	// 	alert("sdsdsd");
	// 	// get_all_totable(url);
	// });
	$('.all_pet').click(function(event) {
		// get_all_totable('{{ route('get_all_totable') }}');
		var pdf = $(this).attr('pdf-url');
		$('.export_pdf').attr('href' , pdf);
	});
	$('.wait_pet').click(function(event) {
		// get_wait_totable('{{ route('get_wait_totable') }}');
		var pdf = $(this).attr('pdf-url');
		$('.export_pdf').attr('href' , pdf);
	});
	$('.return_pet').click(function(event) {
		// get_return_totable('{{ route('get_return_totable') }}');
		var pdf = $(this).attr('pdf-url');
		$('.export_pdf').attr('href' , pdf);
	});
	$('.acc_pet').click(function(event) {
		// get_acc_totable( '{{ route('get_acc_totable') }}');
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