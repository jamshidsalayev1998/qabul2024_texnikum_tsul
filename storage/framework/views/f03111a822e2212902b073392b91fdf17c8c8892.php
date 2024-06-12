<!DOCTYPE html>
<html lang="en">

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QABUL2022</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(asset('newdesign/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo e(asset('newdesign/css/mdb.min.css')); ?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="<?php echo e(asset('newdesign/css/style.css')); ?>">
  <!-- <link rel="stylesheet" href="css/style.scss"> -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('newdesign/css/media.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('newdesign/css/font-awesome.css')); ?>">


  <?php echo $__env->yieldContent('style'); ?>


</head>
<body>

	<div class="fixback"></div>

	<header>
		<span class="left">

			<div class="content_bars none_bars">
				<div class="top">
					<h2> <?php echo e(Auth::user()->email); ?></h2>
				</div>
				<div class="bottom">
					<ul>
						<?php echo $__env->make('admin.includes.menu_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</ul>
				</div>
			</div>
		</span>
		<h1 style="max-height: 100px; overflow: hidden"><?php echo app('translator')->get('petition.Мазкур сайт алоҳида тоифадаги абитуриентларни ТДЮУ магистратурасига кириш учун рўйхатдан ўтиши учун мўлжалланган.'); ?></h1>
		<div class="header_right">
			 <div class="lan">
                            <div  class="" id="dd">
                                <span class="iii">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                                <span class="holder"> <?php echo app('translator')->get('other.'.App::getLocale()); ?> </span>
                                <ul class="dropdown">
                                   <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>  <a   hreflang="<?php echo e($localeCode); ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>" class="dropdown-item dropdown-footer"><?php echo e($properties['native']); ?></a></li>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </div>
                        </div>
			<div class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				<b><?php echo app('translator')->get('other.LOG OUT'); ?></b>
				<span><img src="<?php echo e(asset('newdesign/img/logout.png')); ?>" alt=""></span>
			</div>
      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
		</div>
	</header>
	<div class="test_one"></div>

	<div class="form_all">
		<?php echo $__env->yieldContent('content'); ?>
	</div>




	<!-- SCRIPTS -->

    <!-- JQuery -->
    <script src="<?php echo e(asset('admin/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('admin/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js')); ?>"></script>

	
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="<?php echo e(asset('newdesign/js/popper.min.js')); ?>"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="<?php echo e(asset('newdesign/js/bootstrap.min.js')); ?>"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="<?php echo e(asset('newdesign/js/mdb.min.js')); ?>"></script>
	<script src = "<?php echo e(asset('newdesign/js/main.js')); ?>"></script>
  <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>


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
          var locale = '<?php echo e(App::getLocale()); ?>';
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
          var locale = '<?php echo e(App::getLocale()); ?>';
          var name_l = 'name_'+locale;
          $.each(regions , function(key, value) {
            html += '<option value="'+value['id']+'">'+value[name_l]+'</option>';
          });
          $('#faculty_type_lang').html(html);
        }
      });
  }
  function get_faculties(id){
     var c_id = id;
      var url = '/get-faculties/' + c_id;
      $.ajax({
        url: url,
        type: 'GET',
        success:function(result){
          var regions = $.parseJSON(result);
          var html = '<option>-------</option>';
          var locale = '<?php echo e(App::getLocale()); ?>';
          var name_l = 'name_'+locale;
          $.each(regions , function(key, value) {
            html += '<option value="'+value['id']+'">'+value[name_l]+'</option>';
          });
          $('#faculty').html(html);
        }
      });
  }
</script>

<script type="text/javascript">


  $(document).ready(function(){
    $('#faculty').change(function() {
      var f_id = $(this).val();
      // alert(f_id);
      get_type_edu(f_id);
      get_type_lang(f_id);
    });
    $('#high_school').change(function() {
      var f_id = $(this).val();
      // alert(f_id);
      get_faculties(f_id);
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
          var locale = '<?php echo e(App::getLocale()); ?>';
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
        var locale = '<?php echo e(App::getLocale()); ?>';
        var name_l = 'name_'+locale;
        $.each(areas , function(key, value) {
          html += '<option value="'+value['id']+'">'+value[name_l]+'</option>';
        });
        $('#country_region_area').html(html);
      }
    });
  });
   $('#passport_seria').inputmask({
        regex: "[a-zA-Z0-9]*"
      });
   // $('#passport_seria').inputmask({
   //      regex: "[a-zA-Z]{2} [0-9]{7}"
   //    });
   // $('#passport_seria').keydown(function(){
   //      var valu = $(this).val().toUpperCase();
   //      $(this).val(valu);
   //    });
   // $('.datatable-enable').DataTable();
  });
  $('.latyn').inputmask( {
      regex: "[a-zA-Z \' ` \"]*"
  });
  // $('.new_lat').keypress(function(){
  //   var st = $(this).val();
  //   // var re = new RegExp("^([a-zA-Z \' ` \"])$");
  //   if (/[a-zA-Z]*/.test(st.substring(st,length -1))) {

  //     console.log("bowqa");
  //   }
  //   else{
  //     var jj = st.substring(0 , st.length-1);
  //     $(this).val(jj);
  //   }
  // });
  $('#number').inputmask( {
      regex: "[0-9]*"
  });
  $('#latyn_address').inputmask( {
      regex: "[a-zA-Z0-9 \' ` \"-_=+()%$#!]*"
  });
  $('.latyn_address').inputmask( {
      regex: "[a-zA-Z0-9 \' ` \"-_=+()%$#!]*"
  });
  $('#birth_date').inputmask({
     mask: "9999-99-99",

  });
  $('.phone_mask').inputmask({
    regex: "[0-9 +-]*",
  });
  $('.phn').inputmask(
      "+\\9\\98999999999"
    );






</script>

<script type="text/javascript">

  // function get_all_noread_messages(){
  //     url = '<?php echo e(route('get_all_noread_messages')); ?>';
  //     $.ajax({
  //       url: url,
  //       type: 'GET',
  //       success:function(result){
  //         if (result > 0) {
  //           htt = '<span class="menu_sup">'+result+'</span>';
  //           console.log(htt);
  //           $('.menu_sup2').html(htt);
  //         }
  //         else{
  //            $('.menu_sup2').html('');
  //         }
  //       }
  //     });
  // }
</script>
	<?php echo $__env->yieldContent('js'); ?>
</body>

</html>
<?php /**PATH D:\myProject\OSPanel\domains\qabul_tsul_texnikum\resources\views/admin/layouts/master_new.blade.php ENDPATH**/ ?>