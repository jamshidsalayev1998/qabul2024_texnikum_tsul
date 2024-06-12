@if(Auth::user()->role == 0)
<footer class="main-footer bg-success" style="padding: 0px !important;">
       <div class="row " >
        <div class="col-md-12 one_one w-100 ">
          <a class="ml-auto mr-auto" href="{{ route('petition.create') }}">
            <div class="one">
              <i class="nav-icon fas fa-file-alt"></i><br>
              @lang('menu.Registration')   
              
            </div>
          </a>
          <a href="{{ route('petition.status') }}" class="ml-auto mr-auto">

            <div class="one">
                <i class="nav-icon fas fa-question"></i><sup ><span class="menu_sup2">{{-- <span class="menu_sup">5</span> --}}</span></sup>
                <br>
                @lang('menu.Application status')   
                    
            </div>
          </a>
         
        </div>
      </div>
  </footer>
  @endif