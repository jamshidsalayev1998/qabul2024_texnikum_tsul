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
    <link rel="stylesheet" href="{{ asset('newdesign/css/style.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('newdesign/css/media.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('newadmin/css/media.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('newadmin/css/font-awesome.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('newadmin/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('newadmin/css/datatables.min.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  @yield('style')
</head>
<body>



    <div class="fixn"></div>



    <div class="all_page">
        <nav class="nav_nav">
            <div class="log">
                <div class="nomer">
                    <span>
                        <i class="fa fa-user"></i>
                    </span>
                    <h2>{{ Auth::user()->email }}</h2>
                </div>


                <span class="close_nav"><i class="fa fa-close"></i></span>
            </div>

        </nav>
        <div class="right_content right_nav">

           <header>
    <span class="left">

      <div class="content_bars none_bars">
        <div class="top">
          <h2> {{ Auth::user()->email }}</h2>
        </div>
        <div class="bottom">
          <ul>
            @include('admin.includes.menu_new')
          </ul>
        </div>
      </div>
    </span>
    <h1>
{{--        adminka tepa univer nomi--}}
    </h1>
    <div class="header_right">
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
      <div class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <b>@lang('other.LOG OUT')</b>
        <span><img src="{{ asset('newdesign/img/logout.png') }}" alt=""></span>
      </div>
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
  <script type="text/javascript" src = "{{ asset('newadmin/js/main.js') }}"></script>

  @yield('js')

</body>
</html>
