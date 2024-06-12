<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">


  <!-- Tempusdominus Bbootstrap 4 -->
  <!-- <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> -->

    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- iCheck -->

  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}"> -->
  {{-- Bootstrap --}}
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  {{-- my css --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/my_style/my_css.css') }}">
</head>

<style type="text/css">
  @media only screen and (max-width: 991px) {
    .one_one{
      display: block;

    }
    body{
      padding-bottom: 40px;
    }
    .media_none{
      display: none !important;
    }
  }
  @media only screen and (max-width: 400px) {
    .one_one{
      font-size: 11px !important;
    }
    body{
      font-size: 11px !important;
    }
  }
  @media only screen and (min-width: 992px) {
    .one_one{
      display: none;
    }
  }
  .one{
    width: 50%;
    float: left;
    text-align: center;
    background-color: white;
    padding-top: 5px;
    padding-bottom: 5px;
    color: #28A745;


  }
  .one_one{
    position: fixed;
    bottom: 0px;
    padding: 0px !important;
    border-top: 2px solid #737B80;
  }
  .error{
    font-size: 12px;
    color: red;

  }
</style>
<body class="sidebar-mini layout-fixed  layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav" style="color: white !important">
      <li class="nav-item">
        <a style="color: white !important" class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      @if(url()->previous() != route('login'))
      <li class="nav-item">
        <a style="color: white !important" class="nav-link"  href="{{ url()->previous() }}" style="cursor: pointer;" ><i class="fas fa-arrow-alt-circle-left"></i> @lang('login.back')  </a>
      </li>
      @endif

    </ul>

    <!-- SEARCH FORM -->


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" style="color: white !important">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
       <li class="nav-item ">
          <a class="nav-link" style="color: white !important" >
             {{ Auth::user()->email }}
          </a>

       </li>
       <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#"  style="color: white !important" >

            {{-- <i  class="fa fa-language" ></i> --}}<i class="fas fa-globe"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a  rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item dropdown-footer">{{ $properties['native'] }}</a>
                <div class="dropdown-divider"></div>

            @endforeach

          </div>
        </li>
        <li class="nav-item ">
          <a  style="color: white !important"  class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        </li>


    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-primary text-center">
      {{-- <img src="{{ asset('admin/dist/img/YTIT.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 ml-auto mr-auto" style="width: 75px; height: auto;"> --}}
      <p>
        <span class="brand-text font-weight-light"></span>
      </p>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block">

          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="" style="margin-top: 50px;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @include('admin.includes.menu')



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


@yield('content')

@include('admin.includes.footer')

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<script src="{{ asset('admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>


<!-- ChartJS -->
<!-- <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script> -->
<!-- Sparkline -->
<!-- <script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script> -->
<!-- JQVMap -->
<!-- <script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script> -->
<!-- <script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script> -->
<!-- daterangepicker -->
<!-- <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script> -->
<!-- <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> -->
<!-- Summernote -->
<!-- {{-- <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script> --}} -->
<!-- overlayScrollbars -->
<!-- {{-- <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script> --}} -->
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>


<script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(window).click(function(event) {
    $('.alert .close').click();
  });

</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    // $('.my-colorpicker1').colorpicker()
    //color picker with addon
    // $('.my-colorpicker2').colorpicker()

    // $('.my-colorpicker2').on('colorpickerChange', function(event) {
    //   $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    // });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>

@if(old('country_id'))
<script type="text/javascript">
  function get_region(c_id){
      var url = '/get-regions/' + c_id;
      $.ajax({
        url: url,
        type: 'GET',
        success:function(result){
          var regions = $.parseJSON(result);
          var html = '<option>----------</option>';
          var locale = '{{ App::getLocale() }}';
          var name_l = 'name_'+locale;
          var old = {{ old('region_id') }};
          $.each(regions , function(key, value) {
            if (value['id'] == old) {
              html += '<option selected  value="'+value['id']+'">'+value[name_l]+'</option>';

            }
            else{
              html += '<option  value="'+value['id']+'">'+value[name_l]+'</option>';

            }
          });
          $('#country_region').html(html);
          get_area(old);
        }
      });
    }
    function get_area(r_id){
      var url = '/get-areas/' + r_id;
      $.ajax({
        url: url,
        type: 'GET',
        success:function(result){
          var areas = $.parseJSON(result);
          var html = '<option>----------</option>';
          var locale = '{{ App::getLocale() }}';
          var name_l = 'name_'+locale;
          var old = {{ old('area_id') }};
          $.each(areas , function(key, value) {
            if (value['id'] == old) {
            html += '<option selected value="'+value['id']+'">'+value[name_l]+'</option>';

            }
            else{
            html += '<option value="'+value['id']+'">'+value[name_l]+'</option>';

            }
          });
          $('#country_region_area').html(html);
        }
      });
    }
</script>
@endif

<script type="text/javascript">
  function get_type_edu(id){
     var c_id = id;
      var url = '/get-type-edu/' + c_id;
      $.ajax({
        url: url,
        type: 'GET',
        success:function(result){
          var regions = $.parseJSON(result);
          var html = '';
          var locale = '{{ App::getLocale() }}';
          var name_l = 'name_'+locale;
          $.each(regions , function(key, value) {
            html += '<option value="'+value['id']+'">'+value[name_l]+'</option>';
          });
          $('#faculty_type_edu').html(html);
        }
      });
  }
   function get_type_lang(id){
     var c_id = id;
      var url = '/get-type-lang/' + c_id;
      $.ajax({
        url: url,
        type: 'GET',
        success:function(result){
          var regions = $.parseJSON(result);
          var html = '';
          var locale = '{{ App::getLocale() }}';
          var name_l = 'name_'+locale;
          $.each(regions , function(key, value) {
            html += '<option value="'+value['id']+'">'+value[name_l]+'</option>';
          });
          $('#faculty_type_lang').html(html);
        }
      });
  }
</script>

<script type="text/javascript">


  $(document).ready(function(){
    get_all_noread_messages();
    // get_all_noreads();
    @if(old('country_id'))
     var tt = $( "#country option:selected" ).val();
    get_region(tt);
    @endif

    $('#faculty').change(function() {
      var f_id = $(this).val();
      // alert(f_id);
      get_type_edu(f_id);
      get_type_lang(f_id);
    });

    $('#country').change(function(){
      var c_id = $(this).val();
      var url = '/get-regions/' + c_id;
      $.ajax({
        url: url,
        type: 'GET',
        success:function(result){
          var regions = $.parseJSON(result);
          var html = '<option selected disabled value="">-----</option>';
          var locale = '{{ App::getLocale() }}';
          var name_l = 'name_'+locale;
          $.each(regions , function(key, value) {
            html += '<option value="'+value['id']+'">'+value[name_l]+'</option>';
          });
          $('#country_region').html(html);
        }
      });
    });

   $('#country_region').change(function(){
    var r_id = $(this).val();
    var url = '/get-areas/' + r_id;
    $.ajax({
      url: url,
      type: 'GET',
      success:function(result){
        var areas = $.parseJSON(result);
        var html = '';
        var locale = '{{ App::getLocale() }}';
        var name_l = 'name_'+locale;
        $.each(areas , function(key, value) {
          html += '<option value="'+value['id']+'">'+value[name_l]+'</option>';
        });
        $('#country_region_area').html(html);
      }
    });
  });
   $('#passport_seria').inputmask({
        regex: "[A-Z]{2}[0-9]{7}"
      });
   $('.datatable-enable').DataTable();
  });
  $('#latyn').inputmask( {
      regex: "[a-zA-Z \' ` \"‘]*"
  });
  $('#number').inputmask( {
      regex: "[0-9]*"
  });
  $('#latyn_address').inputmask( {
      regex: "[a-zA-Z0-9 \' ` \"-_=+()%$#!]*"
  });
  $('#birth_date').inputmask({
     mask: "9999-99-99",

  });
  $('.phn').inputmask(
      "+\\9\\98999999999"
    );

  // $('#birth_date').keypress(function(){
  //   var rr = $(this).val();
  //   console.log($.isNumeric(rr.slice(0 , 4)));
  //   if ($.isNumeric(rr.slice(0 , 4))) {
  //     if (parseInt(rr.slice(0,4)) > 2005 || parseInt(rr.slice(0,4)) < 1985) {
  //       alert("Bu yosh oralig`ida hujjatlar qabul qilinmaydi");
  //       var yosh = rr.slice(0 , 3);
  //       $(this).val(yosh);
  //     }
  //   }
  //   if ($.isNumeric(rr.slice(5, 7))) {
  //     if (parseInt(rr.slice(5, 7)) >12) {
  //       var gg = (rr.slice(5, 7));
  //       var ff = '0' + gg;
  //       var ee = rr.slice(0,4);
  //       ff =ee + ff;
  //       $(this).val(ff);


  //     }
  //     if (parseInt(rr.slice(5, 7)) == 0) {
  //      var bb = rr.slice(0, 4) + '01';
  //      $(this).val(bb);


  //     }
  //   }
  //   if ($.isNumeric(rr.slice(8, 10))) {
  //     if (parseInt(rr.slice(8, 10)) > 31) {
  //       var dd = rr.slice(0 , 7) + '31';
  //       $(this).val(dd);
  //     }
  //     if (parseInt(rr.slice(8, 10)) == 0) {
  //      var bb = rr.slice(0, 4) + '01';
  //      $(this).val(bb);


  //     }
  //   }
  // });




</script>

<script type="text/javascript">

  function get_all_noread_messages(){
      url = '{{ route('get_all_noread_messages') }}';
      $.ajax({
        url: url,
        type: 'GET',
        success:function(result){
          if (result > 0) {
            htt = '<span class="menu_sup">'+result+'</span>';
            console.log(htt);
            $('.menu_sup2').html(htt);
          }
          else{
             $('.menu_sup2').html('');
          }
        }
      });
  }
</script>
{{-- bootstrap --}}
@yield('js')
</body>
</html>
