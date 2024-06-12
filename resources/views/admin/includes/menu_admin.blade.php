@if(Auth::user()->role == 3)
    <a href="{{ route('admin.index') }}" class="@if(url()->current() == route('admin.index')) menu_active @endif">
        <i class="fa fa-graduation-cap"></i>
        @lang('menu.Applications')
    </a>
    {{--                <a href="{{ route('admin.statistics') }}" class="@if(url()->current() == route('admin.statistics')) menu_active @endif">--}}
    {{--                    <i class="fa fa-pie-chart"></i>--}}
    {{--                    @lang('menu.Statistics')--}}
    {{--                </a>--}}

    <a href="{{ route('admin.messages') }}" class="@if(url()->current() == route('admin.messages')) menu_active @endif">
        <i class="fa fa-envelope"></i>
        @lang('menu.Messages')
    </a>
    <a href="{{ route('admins.index') }}" class="@if(url()->current() == route('admins.index')) menu_active @endif">
        <i class="fa fa-users" aria-hidden="true"></i>
        @lang('menu.Admins')
    </a>
    <a href="{{ route('superadmin.high.school.admin.index') }}"
       class="@if(url()->current() == route('superadmin.high.school.admin.index')) menu_active @endif">
        <i class="fa fa-users" aria-hidden="true"></i>
        @lang('menu.Tashkilot adminlari')
    </a>
    <a href="{{ route('superadmin.countries') }}"
       class="@if(url()->current() == route('superadmin.countries')) menu_active @endif">
        <i class="fa fa-globe" aria-hidden="true"></i>
        @lang('menu.Countries')
    </a>
    <a href="{{ route('superadmin.regions') }}"
       class="@if(url()->current() == route('superadmin.regions')) menu_active @endif">
        <i class="fa fa-map-pin" aria-hidden="true"></i>
        @lang('menu.Regions')
    </a>
    <a href="{{ route('superadmin.areas') }}"
       class="@if(url()->current() == route('superadmin.areas')) menu_active @endif">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        @lang('menu.Areas')
    </a>
    <a href="{{ route('superadmin.faculties') }}"
       class="@if(url()->current() == route('superadmin.faculties')) menu_active @endif">
        <i class="fa fa-tasks" aria-hidden="true"></i>
        @lang('menu.Faculties')
    </a>
    <a href="{{ route('superadmin.edutypes') }}"
       class="@if(url()->current() == route('superadmin.edutypes')) menu_active @endif">
        <i class="fa fa-university"></i>
        @lang('menu.Edu types')
    </a>
    <a href="{{ route('superadmin.langtypes') }}"
       class="@if(url()->current() == route('superadmin.langtypes')) menu_active @endif">
        <i class="fa fa-language" aria-hidden="true"></i>
        @lang('menu.Language types')
    </a>
    <a href="{{ route('superadmin.high_schools') }}"
       class="@if(url()->current() == route('superadmin.langtypes')) menu_active @endif">
        <i class="fa fa-language" aria-hidden="true"></i>
        @lang('menu.Talim tashkilotlari')
    </a>
    @php
        $high_schools = 'App\HighSchool'::all();
    @endphp
    @foreach($high_schools as $high_school)
        <a href="{{ route('admin.statistics_by_high_schools' , ['id' => $high_school->id]) }}" class="">
            <i class="fa fa-pie-chart"></i>
            @lang('menu.Statistika '.$high_school->short_name)
        </a>
    @endforeach

@endif

@if(Auth::user()->role == 2)

    <span class="title_menu">
                    <b>@lang('menu.Applications menu')</b>
                </span>
    <a href="{{ route('admin.index') }}" class="@if(url()->current() == route('admin.index')) menu_active @endif">
        <i class="fa fa-graduation-cap"></i>
        @lang('menu.Applications')
    </a>
    <span class="title_menu">
                <b>@lang('menu.Additional options')</b>
                </span>
    <a href="{{ route('admin.statistics') }}"
       class="@if(url()->current() == route('admin.statistics')) menu_active @endif">
        <i class="fa fa-pie-chart"></i>
        @lang('menu.Statistics')
    </a>
    <a href="{{ route('admin.messages') }}" class="@if(url()->current() == route('admin.messages')) menu_active @endif">
        <i class="fa fa-envelope"></i>
        @lang('menu.Messages')
    </a>

@endif


@if(Auth::user()->role == 1)

    <span class="title_menu">
                    <b>@lang('menu.Applications menu')</b>
                </span>
    <a href="{{ route('admin.index') }}" class="@if(url()->current() == route('admin.index')) menu_active @endif">
        <i class="fa fa-graduation-cap"></i>
        @lang('menu.Applications')
    </a>
    <span class="title_menu">
                <b>@lang('menu.Additional options')</b>
                </span>
    <a href="{{ route('admin.statistics') }}"
       class="@if(url()->current() == route('admin.statistics')) menu_active @endif">
        <i class="fa fa-pie-chart"></i>
        @lang('menu.Statistics')
    </a>
    {{-- <a href="{{ route('admin.messages') }}" class="@if(url()->current() == route('admin.messages')) menu_active @endif">
        <i class="fa fa-envelope"></i>
        @lang('menu.Messages')
    </a> --}}

@endif
@if(Auth::user()->role == 4)
    <a href="{{ route('admin.index') }}" class="@if(url()->current() == route('admin.index')) menu_active @endif">
        <i class="fa fa-graduation-cap"></i>
        @lang('menu.Applications')
    </a>
    @php
    $admin = \App\HighSchoolAdmin::where('user_id' , \Illuminate\Support\Facades\Auth::user()->id)->first();
        $high_schools = 'App\HighSchool'::where('id' , $admin->high_school_id)->get();
    @endphp
    @foreach($high_schools as $high_school)
        <a href="{{ route('admin.statistics_by_high_schools' , ['id' => $high_school->id]) }}" class="">
            <i class="fa fa-pie-chart"></i>
            @lang('menu.Statistika '.$high_school->short_name)
        </a>
    @endforeach
@endif
