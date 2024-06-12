<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <!-- Font Awesome -->
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('newadmin/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('newadmin/css/mdb.min.css') }}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ asset('newadmin/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('newadmin/css/media.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('newadmin/css/font-awesome.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('newadmin/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('newadmin/css/datatables.min.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

  @yield('style')
</head>
<body>

   @if(Auth::user()->role == 3 && url()->current() != route('admin.index'))
   <style type="text/css">
     .btn{
      margin: 0px !important;
     }
     table tbody tr td{
      padding-left: 4px !important;
      padding-top: 2px !important;
      padding-bottom: 2px !important;
     }
   </style>
   @endif

    <div class="fixn"></div>



    <div class="all_page">
        <nav>
            <div class="log">
                <div class="nomer">
                    <span>
                        <i class="fa fa-user"></i>
                    </span>
                    <h2>{{ Auth::user()->email }}</h2>
                </div>


                <span class="close_nav"><i class="fa fa-close"></i></span>
            </div>
            <div class="menu" style="overflow: hidden; height: 95vh !important; overflow-y: scroll">
                @include('admin.includes.menu_admin')
            </div>
        </nav>
        <div class="right_content">

            <header class="site">

                    <span class="bars_nav"><i class="fa fa-bars"></i></span>
                    <span class="bars_mobile"><i class="fa fa-bars"></i></span>
                    <h1>
{{--                        admin top univer--}}
                    </h1>
                    <div class="logout">
                      <div class="lan">
                            <div  class="" id="dd">
                                <span class="iii">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                                <span class="holder">  @lang('other.'.App::getLocale()) </span>
                                <ul class="dropdown">
                                   @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>  <a   hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item dropdown-footer">{{ $properties['native'] }}</a></li>
                                  @endforeach

                                </ul>
                            </div>
                        </div>
                        {{-- <span class="globus" data-toggle="dropdown">
                          {{ App::getLocale() }}

                            <img src="{{ asset('newadmin/img/globus.png') }}" alt="">

                        </span> --}}
                       {{--  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <a  rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item dropdown-footer">{{ $properties['native'] }}</a>
                                <div class="dropdown-divider"></div>

                            @endforeach

                          </div> --}}
                        <a class="logout" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span>
                                <b >@lang('other.LOG OUT')</b>
                                <img src="{{ asset('newadmin/img/logout.png') }}" alt="">
                            </span>
                        </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </div>

            </header>
           <div class="site_all_content">
            @yield('content')
           </div>
        </div>
    </div>

    <!-- SCRIPTS -->

	<!-- JQuery -->
	<script type="text/javascript" src="{{ asset('newadmin/js/jquery-3.3.1.min.js') }}"></script>
  <!-- Bootstrap tooltips -->
  <script src="{{ asset('newadmin/js/datatables.min.js') }}"></script>
  <script src="{{ asset('newadmin/js/dataTables.checkboxes.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('newadmin/js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('newadmin/js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('newadmin/js/mdb.min.js') }}"></script>
  <script type="text/javascript" src = "{{ asset('newadmin/js/owl.carousel.min.js') }}"></script>
  @yield('before_main_js')
  <script type="text/javascript" src = "{{ asset('newadmin/js/main.js') }}"></script>
<script src="{{ asset('admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <script type="text/javascript">
    $('.phn').inputmask(
      "+\\9\\98999999999"
    );
  </script>

  @yield('js')

</body>
</html>
