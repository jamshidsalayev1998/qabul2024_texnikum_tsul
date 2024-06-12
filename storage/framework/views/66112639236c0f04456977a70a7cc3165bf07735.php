<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <!-- Font Awesome -->
  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(asset('newadmin/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo e(asset('newadmin/css/mdb.min.css')); ?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?php echo e(asset('newadmin/css/style.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('newadmin/css/media.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('newadmin/css/font-awesome.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('newadmin/css/owl.carousel.min.css')); ?>">
  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
  <style type="text/css">
    .item_form i{
      float: right;
      position: absolute;
      cursor: pointer;
    }
    .item_form .fa-eye-slash{
      display: none;
    }
  </style>
<?php


  date_default_timezone_set('Asia/Tashkent');
  $date = date('Y-m-d h:i:s', time());
  $date1 = strtotime($date);
  $dd =  DB::table('date_admission as d')->select('d.date_end')->where('status' , 1)->first();
  $date2 = strtotime($dd->date_end);
  $diff = abs($date2 - $date1);
  $years = floor($diff / (365*60*60*24));
  $months = floor(($diff - $years * 365*60*60*24)/ (30*60*60*24));
  $days = floor(($diff - $years * 365*60*60*24 -  $months*30*60*60*24)/ (60*60*24));
  $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
  $minutes = floor(($diff - $years * 365*60*60*24  - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
  $seconds = floor(($diff - $years * 365*60*60*24   - $months*30*60*60*24 - $days*60*60*24  - $hours*60*60 - $minutes*60));
 ?>
  <style type="text/css">
    .error{
      color: red;
      font-size: 11px;
    }
    .forgot{
      font-size: 13px;
      float: right;
      color: #39B8D3;
    }
  </style>



<?php echo $__env->yieldContent('content'); ?>
    <!-- SCRIPTS -->

  <!-- JQuery -->
  <script type="text/javascript" src="<?php echo e(asset('newadmin/js/jquery-3.3.1.min.js')); ?>"></script>
  <!-- Bootstrap tooltips -->
  
  
    <script type="text/javascript" src="<?php echo e(asset('newadmin/js/popper.min.js')); ?> "></script>
 <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo e(asset('newadmin/js/bootstrap.min.js')); ?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo e(asset('newadmin/js/mdb.min.js')); ?>"></script>
  <script type="text/javascript" src = "<?php echo e(asset('newadmin/js/owl.carousel.min.js')); ?>"></script>
  <script type="text/javascript" src = "<?php echo e(asset('newadmin/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js')); ?>"></script>
  <script type="text/javascript">
    $(document).on('keypress',function(e) {
    if(e.which == 13) {
        $('form').submit();
    }
});
  </script>
<script type="text/javascript">
  $('.top h1').css({
    'color':'#FF5F5F'
  });
    $('.phn').inputmask(
      "+\\9\\98999999999"
    );
    // $('.phn').click(function(){
    //  $(this).val('998');
    // });
    // $('.phn').attr('placeholder' , )
      var months = <?php echo $months ?>;
      var days = <?php echo $days ?>;
      var hours = <?php echo $hours ?>;
      var minutes = <?php echo $minutes ?>;
      var seconds = <?php echo $seconds ?>;
      $('.months').html(months);
      $('.days').html(days);
      $('.hours').html(hours);
      $('.minutes').html(minutes);
      $('.seconds').html(seconds);
      var timestamp = hours*3600+minutes*60+seconds;
       // setInterval(function(){
       //  timestamp = timestamp-1;
       //     var hours = Math.floor(timestamp / 60 / 60);

       //    // 37
       //    var minutes = Math.floor(timestamp / 60) - (hours * 60);

       //    // 42
       //    var seconds = timestamp % 60;
       //    $('.hours').html(hours);
       //  $('.minutes').html(minutes);
       //  $('.seconds').html(seconds);
       // }, 1000);


  </script>
  <script>

        function time() {
              timestamp = timestamp-1;
               var hours = Math.floor(timestamp / 60 / 60);

              // 37
              var minutes = Math.floor(timestamp / 60) - (hours * 60);

              // 42
              var seconds = timestamp % 60;
              $('.hours').html(hours);
              $('.minutes').html(minutes);
              $('.seconds').html(seconds);
        }
        setInterval(time, 1000);


    </script>
    <script type="text/javascript">
      $('.item_form .eye').click(function() {
       $('.item_form .eye_slash').css({
        'display':'inline-block',
        'position' : 'absolute',
        'float' : 'right',
       });
       $(this).css({
        'display':'none',

       });
       $('input[name="password"]').attr('type', 'text');
      });
       $('.item_form .eye_slash').click(function() {
       $('.item_form .eye').css({
        'display':'inline-block',
        'position' : 'absolute',
        'float' : 'right',
       });
       $(this).css({
        'display':'none',
       });
       $('input[name="password"]').attr('type', 'password');
      });

       $('.item_form .eye').click(function() {
       $('.item_form .eye_slash').css({
        'display':'inline-block',
        'position' : 'absolute',
        'float' : 'right',
       });
       $(this).css({
        'display':'none',

       });
       $('input[name="code"]').attr('type', 'text');
      });
       $('.item_form .eye_slash').click(function() {
       $('.item_form .eye').css({
        'display':'inline-block',
        'position' : 'absolute',
        'float' : 'right',
       });
       $(this).css({
        'display':'none',
       });
       $('input[name="code"]').attr('type', 'password');
      });
    </script>
  <?php echo $__env->yieldContent('js'); ?>

</body>
</html>
<?php /**PATH D:\myProject\OSPanel\domains\qabul_tsul_texnikum\resources\views/admin/layouts/login_layout.blade.php ENDPATH**/ ?>