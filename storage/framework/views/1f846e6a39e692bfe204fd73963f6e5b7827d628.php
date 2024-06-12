
<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $locale = App::getLocale(); $name_l = 'name_'.$locale; ?>
<div class="endi_done">
                <div class="test_done"></div>

                <div class="all_padd">
                    <div class="charts">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div id="big_chart" style="min-width: 310px; height: 400px; width: 100%; margin: 0 auto"></div>
                            </div>
                            <div class="col-md-6">
                                <div id="pie" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="map_uzb">
                                    <h2>STATISTICS BY REGION</h2>
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion">

                        <table id="acc_table">
                            <thead>
                                <tr>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $faculty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr class="click_tr">
                                    <td>
                                        <div class="one_tr">
                                            <h1><?php echo e($f->$name_l); ?></h1>
                                            <div class="right">
                                                
                                                <?php $g = 'App\Petition'::where('faculty_id' , $f->id)->where(function($q){$user = \Illuminate\Support\Facades\Auth::user(); if($user->role == 4){$admin = \App\HighSchoolAdmin::where('user_id' , $user->id)->first(); $q->where('high_school_id' , $admin->high_school_id);}})->count(); ?>
                                                <h2><?php echo e($g); ?></h2>
                                                <span>
                                                    <i class="fa fa-angle-down"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="content_tr">
                                    <td>
                                        <div class="two_tr">
                                            <div class="two_left">
                                                 <?php $boyss = 'App\Petition'::where('faculty_id' , $f->id)->where('gender' , 1)->where(function($q){$user = \Illuminate\Support\Facades\Auth::user(); if($user->role == 4){$admin = \App\HighSchoolAdmin::where('user_id' , $user->id)->first(); $q->where('high_school_id' , $admin->high_school_id);}})->count(); ?>
                                                 <?php $girlss = 'App\Petition'::where('faculty_id' , $f->id)->where('gender' , 0)->where(function($q){$user = \Illuminate\Support\Facades\Auth::user(); if($user->role == 4){$admin = \App\HighSchoolAdmin::where('user_id' , $user->id)->first(); $q->where('high_school_id' , $admin->high_school_id);}})->count(); ?>
                                                <h4 class="boy">BOYS: <?php echo e($boyss); ?></h4>
                                                <h4 class="girl">GIRLS: <?php echo e($girlss); ?></h4>
                                            </div>
                                            <div class="two_left " style="display: flex !important; justify-content: space-between !important;">
                                                <h4></h4><h4 class="boy"><i class="fa fa-sun-o" aria-hidden="true"></i> </h4>
                                                <?php $day = 'App\Petition'::where('faculty_id' , $f->id)->where('type_education_id' , 1)->where(function($q){$user = \Illuminate\Support\Facades\Auth::user(); if($user->role == 4){$admin = \App\HighSchoolAdmin::where('user_id' , $user->id)->first(); $q->where('high_school_id' , $admin->high_school_id);}})->count(); ?>
                                                <h4>
                                                    <?php echo e($day); ?>

                                                </h4>
                                                <h4></h4>
                                            </div>
                                            <div class="two_left" style="display: flex !important; justify-content: space-between !important;">
                                                <h4></h4><h4 class="boy"><i class="fa fa-moon-o" aria-hidden="true"></i> </h4>
                                                <?php $night = 'App\Petition'::where('faculty_id' , $f->id)->where('type_education_id' , 2)->where(function($q){$user = \Illuminate\Support\Facades\Auth::user(); if($user->role == 4){$admin = \App\HighSchoolAdmin::where('user_id' , $user->id)->first(); $q->where('high_school_id' , $admin->high_school_id);}})->count(); ?>

                                                <h4>
                                                    <?php echo e($night); ?>

                                                </h4>
                                                <h4></h4>
                                            </div>
                                            <div class="two_left" style="display: flex !important; justify-content: space-between !important;">
                                                <h4></h4><h4 class="boy"><i class="fa fa-network-wired"></i> </h4>
                                                <?php $dis = 'App\Petition'::where('faculty_id' , $f->id)->where('type_education_id' , 3)->where(function($q){$user = \Illuminate\Support\Facades\Auth::user(); if($user->role == 4){$admin = \App\HighSchoolAdmin::where('user_id' , $user->id)->first(); $q->where('high_school_id' , $admin->high_school_id);}})->count(); ?>

                                                <h4>
                                                    <?php echo e($dis); ?>

                                                </h4>
                                                <h4></h4>

                                            </div>
                                            <?php $rf = 'App\Petition'::where('faculty_id' , $f->id)->where('status' , 2)->where(function($q){$user = \Illuminate\Support\Facades\Auth::user(); if($user->role == 4){$admin = \App\HighSchoolAdmin::where('user_id' , $user->id)->first(); $q->where('high_school_id' , $admin->high_school_id);}})->count(); ?>
                                            <h3>ACCEPTED: <?php echo e($rf); ?></h3>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('before_main_js'); ?>
   <script src="<?php echo e(asset('newadmin/js/highcharts.js')); ?>"></script>
    <script src="<?php echo e(asset('newadmin/js/exporting.js')); ?>"></script>
    <script src="<?php echo e(asset('newadmin/js/export-data.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
var girls = <?php echo $girls ?>;
var boys = <?php echo $boys ?>;

 Highcharts.chart('pie', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
	},
	colors: ['#FF5555', '#41AEEA'],
    title: {
        text: 'STATISTICS BY GENDER'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: false,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: '',
        colorByPoint: true,
        data: [{
            name: 'GIRLS',
            y: girls,

        }, {
            name: 'BOYS',
            y: boys
        }]
    }]
});
var i=0 , j=0;
let month_acc = [];
let month_return = [];
let month_wait = [];
let kunlar = [];
<?php $__currentLoopData = $month_acc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t => $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 kunlar[j] = '<?php echo e($t); ?>';
j++;
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $month_acc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 month_acc[i] = <?php echo e($t); ?>;
i++;
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
i=0;
<?php $__currentLoopData = $month_return; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 month_return[i] = <?php echo e($t); ?>;
i++;
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
i=0;
<?php $__currentLoopData = $month_wait; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 month_wait[i] = <?php echo e($t); ?>;
i++;
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 Highcharts.chart('big_chart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'STATISTICS BY DAY'
	},
	colors: ['#3CD839', '#FF3030', '#3083FF'],
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: kunlar.reverse()
    },
    yAxis: {
        title: {
            text: ''
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },
    series: [{
        name: 'ACCEPTED',
        data: month_acc.reverse()
    }, {
        name: 'REJECTED',
        data: month_return.reverse()
	},
	{
        name: 'TO BE REVIEW',
        data: month_wait.reverse()
    }
]
});


var simplemaps_countrymap_mapdata={
  main_settings: {
    width: "responsive",
    background_color: "#FFFFFF",
    background_transparent: "yes",
    border_color: "black",

    //State defaults
    state_description: "State description",
    state_color: "#fff",
    state_hover_color: "#A6D2EA",
    state_url: "",
    border_size: 1.5,
    all_states_inactive: "no",
    all_states_zoomable: "no",

    //Location defaults
    location_description: "Location description",
    location_url: "",
    location_color: "#FF0067",
    location_opacity: 0.8,
    location_hover_opacity: 1,
    location_size: 25,
    location_type: "square",
    location_image_source: "frog.png",
    location_border_color: "#FFFFFF",
    location_border: 2,
    location_hover_border: 2.5,
    all_locations_inactive: "no",
    all_locations_hidden: "no",

    //Label defaults
    label_color: "#d5ddec",
    label_hover_color: "#d5ddec",
    label_size: 22,
    label_font: "Arial",
    hide_labels: "no",
    hide_eastern_labels: "no",

    //Zoom settings
    zoom: "no",
    manual_zoom: "no",
    back_image: "no",
    initial_back: "no",
    initial_zoom: "-1",
    initial_zoom_solo: "no",
    region_opacity: 1,
    region_hover_opacity: 0.6,
    zoom_out_incrementally: "no",
    zoom_percentage: 0.99,
    zoom_time: 0.5,

    //Popup settings
    popup_color: "white",
    popup_opacity: 0.9,
    popup_shadow: 1,
    popup_corners: 5,
    popup_font: "12px/1.5 Verdana, Arial, Helvetica, sans-serif",
    popup_nocss: "no",

    //Advanced settings
    div: "map",
    auto_load: "yes",
    url_new_tab: "no",
    images_directory: "default",
    fade_time: 0.1,
    link_text: "View Website",
    popups: "detect",
    state_image_url: "",
    state_image_position: "",
    location_image_url: ""
  },
  state_specific: {
    UZB354: {
      name: "Bukhoro",
      description: <?php echo e($region['5']); ?>

    },
    UZB355: {
      name: "Khorezm",
      description: <?php echo e($region['6']); ?>


    },
    UZB356: {
      name: "Karakalpakstan",
      description: <?php echo e($region['1']); ?>


    },
    UZB357: {
      name: "Navoi",
      description: <?php echo e($region['10']); ?>


    },
    UZB358: {
      name: "Samarkand",
      description: <?php echo e($region['11']); ?>


    },
    UZB361: {
      name: "Kashkadarya",
      description: <?php echo e($region['8']); ?>


    },
    UZB362: {
      name: "Surkhandarya",
      description: <?php echo e($region['5']); ?>


    },
    UZB363: {
      name: "Andijon",
      description: <?php echo e($region['2']); ?>


    },
    UZB364: {
      name: "Ferghana",
      description: <?php echo e($region['4']); ?>


    },
    UZB365: {
      name: "Namangan",
      description: <?php echo e($region['3']); ?>


    },
    UZB370: {
      name: "Jizzakh",
      description: <?php echo e($region['9']); ?>


    },
    UZB371: {
      name: "Sirdaryo",
      description: <?php echo e($region['12']); ?>


    },
    UZB372: {
      name: "Tashkent",
      <?php $rr = $region['14']+$region['13']; ?>
      description: <?php echo e($region['13']); ?>


    },
    UZB4828: {
      name: "Tashkent",
      description: <?php echo e($region['14']); ?>


    }
  },
  locations: {},
  labels: {},
  regions: {}
};
</script>
    <script src="<?php echo e(asset('newadmin/js/mapdata.js')); ?>"></script>
    <script src="<?php echo e(asset('newadmin/js/countrymap.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\myProject\OSPanel\domains\qabul_tsul\resources\views/admin/pages/petition/statistics.blade.php ENDPATH**/ ?>