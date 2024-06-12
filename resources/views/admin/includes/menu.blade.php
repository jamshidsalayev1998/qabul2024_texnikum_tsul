



@if(Auth::user()->role == 0)
<li class="nav-item">
    <a href="{{ route('petition.create') }}" class="nav-link ">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>
            @lang('menu.Registration')   
        </p>
    </a>      
</li>
<li class="nav-item">
    <a href="{{ route('petition.status') }}" class="nav-link ">
        <i class="nav-icon fas fa-question"></i><sup ><span class="menu_sup2">{{-- <span class="menu_sup">5</span> --}}</span></sup>
        <p>
            @lang('menu.Application status')   
        </p>

    </a>      
</li>
@endif
@if(Auth::user()->role == 2)
<li class="nav-item">
    <a href="{{ route('admin.index') }}" class="nav-link @if(url()->current() == route('admin.index')) active @endif">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>
            @lang('menu.All applications')  
        </p>
    </a>      
</li>
<li class="nav-item">
    <a href="{{ route('admin.news') }}" class="nav-link @if(url()->current() == route('admin.news')) active @endif">
       <i class=" nav-icon fas fa-envelope-open-text"></i>
        <p>
            @lang('menu.New applications')
        </p>
    </a>      
</li>

<li class="nav-item">
    <a href="{{ route('admin.returneds') }}" class="nav-link @if(url()->current() == route('admin.returneds')) active @endif">
        <i class="nav-icon fas fa-times"></i>
        <p>
            @lang('menu.Returned applications')
        </p>
    </a>      
</li>
<li class="nav-item">
    <a href="{{ route('admin.accepteds') }}" class="nav-link @if(url()->current() == route('admin.accepteds')) active @endif">
        <i class="nav-icon fas fa-check"></i>
        <p>
            @lang('menu.Accepted applications')
        </p>
    </a>      
</li>
{{-- <li class="nav-item">
    <a href="{{ route('admin.reports') }}" class="nav-link @if(url()->current() == route('admin.reports')) active @endif">
        <i class="nav-icon fas fa-file-signature"></i>
        <p>
            @lang('menu.Reports')
        </p>
    </a>      
</li> --}}
<li class="nav-item has-treeview @if(url()->current() == route('admin.reports') || url()->current() == route('admin.reports.faculty')) menu-open @endif">
            <a href="#" class="nav-link @if(url()->current() == route('admin.reports') || url()->current() == route('admin.reports.faculty')) active @endif">
               <i class="nav-icon fas fa-file-signature"></i>
              <p>
                @lang('menu.Reports')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.reports') }}" class="nav-link @if(url()->current() == route('admin.reports')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('menu.By region')</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('admin.reports.faculty') }}" class="nav-link @if(url()->current() == route('admin.reports.faculty')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('menu.By faculty')</p>
                </a>
              </li>
              
            </ul>
          </li>
<li class="nav-item">
    <a href="{{ route('admin.messages') }}" class="nav-link @if(url()->current() == route('admin.messages')) active @endif">
        @php $cc = 'App\Comment'::where('status' , 0)->where('from_id' , 0)->count(); @endphp

        <i class="nav-icon fas fa-envelope"></i>@if($cc > 0)<sup><span class=" bg-success" style="border-radius: 6px; padding: 1px; font-size: 9px;">{{ $cc }}</span></sup>@endif
        <p>
            @lang('menu.Messages') 
        </p>
    </a>      
</li>

@endif
@if(Auth::user()->role == 3)
<li class="nav-item">
    <a href="{{ route('admins.index') }}" class="nav-link ">
       <i class="nav-icon fa fa-user"></i>
        <p>
            @lang('menu.Admins')
        </p>
    </a>      
</li>
<li class="nav-item has-treeview @if(url()->current() == route('superadmin.regions') || url()->current() == route('superadmin.areas') || url()->current() == route('superadmin.faculties') || url()->current() == route('superadmin.langtypes') || url()->current() == route('superadmin.edutypes')) menu-open @endif">
            <a href="#" class="nav-link @if(url()->current() == route('superadmin.regions') || url()->current() == route('admin.reports.faculty')) active @endif">
               <i class="nav-icon fas fa-file-signature"></i>
              <p>
                @lang('menu.Application datas')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="{{ route('superadmin.regions') }}" class="nav-link @if(url()->current() == route('superadmin.regions')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('menu.Regions')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('superadmin.areas') }}" class="nav-link @if(url()->current() == route('superadmin.areas')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('menu.Areas')</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('superadmin.faculties') }}" class="nav-link @if(url()->current() == route('superadmin.faculties')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('menu.Faculties')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('superadmin.edutypes') }}" class="nav-link @if(url()->current() == route('superadmin.edutypes')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('menu.Edu types')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('superadmin.langtypes') }}" class="nav-link @if(url()->current() == route('superadmin.langtypes')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('menu.Language types')</p>
                </a>
              </li>
              
            </ul>
          </li>
<li class="nav-item">
{{-- <li class="nav-item">
    <a href="{{ route('petition_datas') }}" class="nav-link ">
       <i class="nav-icon fas fa-digital-tachograph"></i>
        <p>
            @lang('menu.Application datas')
        </p>
    </a>      
</li> --}}
{{-- <li class="nav-item">
    <a href="{{ route('petition_edit') }}" class="nav-link ">
       <i class="nav-icon fas fa-digital-tachograph"></i>
        <p>
            PEtition edit
        </p>
    </a>      
</li> --}}
@endif
