@extends('admin.layouts.master')
@section('title')

Applications
@endsection
@section('content')
@php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp
 <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="row mt-5 p-5">
             {{--  Modal --}}
             
            <!-- /.card -->
            <div class="col-md-12">
              <h1>@lang('petition.Region')</h1>
            </div>
            <!-- /.card -->
          </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('js')


<script type="text/javascript">
  
</script>
@endsection