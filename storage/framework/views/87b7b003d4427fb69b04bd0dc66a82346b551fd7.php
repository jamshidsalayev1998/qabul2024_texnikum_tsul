<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('users/petition_pdf_styles/style.css')); ?>">
</head>
<body>
<div class="row text-center">
    <p>Toshkent davlat yuridik universiteti qoshidagi akademik litseyning bitiruvchilarini Toshkent davlat yuridik
        universitetiga yakka tartibda suhbat o‘tkazish orqali o‘qishga qabul qilish tartibi to‘g‘risida nizomga <br>
        2-ILOVA
    </p>
</div>
<div class="row">
    <div class="w-50"></div>
    <div class="w-50 text-right">
        Toshkent davlat yuridik universiteti rektori vazifasini vaqtincha bajaruvchi <br>Rustambekov Islombek Rustambekovich ga
        <br> <?php echo e($petition->last_name); ?> <?php echo e($petition->first_name); ?> <?php echo e($petition->middle_name); ?> dan
    </div>
</div>
<div class="row text-center">
    <h3><b>Ariza</b></h3>
</div>
<div class="row text-center">
    <h4><b>Toshkent davlat yuridik universiteti bakalavriatiga qabul to‘g‘risida </b></h4>
</div>
<div class="row">
    <p>
        Men <b><?php echo e($petition->getFaculty()->name_uz); ?></b> yo‘nalishida ta’lim olish uchun suhbatdan o‘tishimga ruxsat
        berishingizni so‘rayman.
    </p>
    <p>
        Ma'lumotim <b><?php echo e($petition->getTypeschool()->malumoti); ?></b> <b><?php echo e($petition->school); ?></b> ni
        <b><?php echo e($petition->graduation_date); ?></b> yilda tugatganman.
    </p>
    <p>
        Ta’lim to‘g‘risidagi hujjat  (diplom) seriasi va raqami : <b><?php echo e($petition->diplom_number); ?></b>
    </p>



     <p>
        Tug'ilgan vaqtim va joyim: <b><?php echo e(date('m-d-Y' , strtotime($petition->birth_date))); ?></b> yil ,
        <b><?php echo e($petition->address); ?></b>
    </p>




    <p>
        Biometrik pasport (identifikatsiya ID-kartasi) ma’lumoti: <b><?php echo e($petition->passport_seria); ?></b> ,
        <b><?php echo e($petition->passport_given_place); ?></b>
    </p>

    <p>
        Xalqaro yoki milliy olimpiadalarda, tanlovlarda hamda sport musobaqalarida qatnashganligi haqida ma’lumot (agar qatnashgan bo‘lsa)
        <b><?php echo e($petition->olympics); ?></b>
    </p>





    <div class="w-100">
        <div class="w-50">
            <div>
               <p>Suhbat o‘tkazish qoidalari bilan tanishdim</p>
            <b><?php echo e($petition->last_name); ?> <?php echo e($petition->first_name); ?> <?php echo e($petition->middle_name); ?></b>
            </div>
        </div>
        <div class="w-50">
            <div class="w-100">
                <div class="w-50">
                    ____________(imzo)
                </div>
                <div class="w-50">
                    <b><?php echo e(date('d-m-Y' , strtotime($petition->created_at))); ?></b>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH D:\myProject\OSPanel\domains\qabul_tsul_texnikum\resources\views/admin/pages/petition/pdf/4/petition_pdf.blade.php ENDPATH**/ ?>