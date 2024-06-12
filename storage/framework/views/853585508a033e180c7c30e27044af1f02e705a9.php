<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title></title>
</head>
<style type="text/css">

    body {
        
  font-family: DejaVu Sans;
    }

    @page  {
        margin: 0;
        size: letter;
    }

    .pr_20 {
        width: 20%;
    }

    .w-100 {
        width: 100%;
    }

    .absolute {
        position: absolute;
    }

    .absolute div {
        position: relative;
    }

    .bg-white {
        background-color: white;
    }

    .mt-150 {
        margin-top: 150px;

    }

    .border tr {
        border: 1px solid black;
    }

    table tr td {
        text-align: center;
        padding: 15px;
    }

    .border tr td {
        border: 1px solid black;

    }


    table tr td img {
        width: 100px;
        height: auto;
    }

    .f_img {
        width: 300px;
    }

    .ml-2 {
        margin-left: 30px;
    }

    .mr-2 {
        margin-right: 30px;
    }

    .mt-50 {
        margin-top: 50px;
    }

    .page-break {
        page-break-before: always;
    }
</style>
<body>
<?php $locale = App::getLocale(); $name_l = 'name_'.$locale; ?>












<table class="w-100 ml-2 mr-2 mt-2  bg-white border" cellspacing="0">
    <tr>
        <td>
            <?php echo app('translator')->get('petition.First name'); ?> <br><br>
            <?php echo app('translator')->get('petition.Last name'); ?> <br><br>
            <?php echo app('translator')->get('petition.Father`s name'); ?>
        </td>
        <td colspan="2">
            <?php echo e($petition->first_name); ?> <br><br>
            <?php echo e($petition->last_name); ?> <br><br>
            <?php echo e($petition->middle_name); ?>

        </td>
        
        
        
        
        

        
    </tr>
    <tr>
        <td>
            <?php echo app('translator')->get('petition.Passport seria'); ?> <br>Tug'ilgan sanasi
        </td>
        <td colspan="2">
            <?php echo e($petition->passport_seria); ?><br><?php echo e($petition->birth_date); ?>

        </td>
    </tr>
    <tr>
        <td>
            <?php echo app('translator')->get('petition.Talim tashkiloti'); ?><br> <br>
            
            <?php echo app('translator')->get('petition.Type of Education'); ?>
        </td>
        <td colspan="2">
            <?php if($petition->high_school): ?>
                <?php echo e($petition->high_school->$name_l); ?><br><br>
            <?php endif; ?>
            
            <?php echo e($petition->getEdutype()->$name_l); ?>

        </td>

    </tr>
    <tr>
        <td>
            Language of Study

        </td>
        <td colspan="2">
            <?php echo e($petition->getLanguagetype()->$name_l); ?>

        </td>
        
    </tr>
    <tr>
        <td>
            Telefon

        </td>
        <td colspan="2">
            <?php echo e($petition->getUser()->email); ?>

        </td>
        
    </tr>










    
    
    

    
    
    
    
    
    
    <tr>
        <td>
            Tugatgan ta'lim muassasasi bitirgan yili
            <br>
            Diplom raqami

        </td>
        <td colspan="2">
            <?php echo e($petition->school); ?> <?php echo e($petition->graduation_date); ?>

            <br>
            <?php echo e($petition->diplom_number); ?>

        </td>
        
    </tr>
    <tr>
        <td>
            Ingliz tili sertifikati - bali

        </td>
        <td colspan="2">
            <?php echo e($petition->getEndegree()->name_uz); ?> - <b><?php echo e($petition->overall_score_english); ?></b>
        </td>
        
    </tr>










</table>
<div class="page-break"></div>
<?php if($petition->image_recommendation): ?>
    <div class="page-break">
        <?php
            $file_extension = \File::extension(public_path().'/users/documents/recommendation_images/'.$petition->image_recommendation);

        ?>
        <?php if($file_extension == 'pdf' || $file_extension == 'PDF'): ?>
            
            <iframe src="<?php echo e(asset('users/documents/recommendation_images/'.$petition->image_recommendation)); ?>"
                    frameborder="0" width="100%"></iframe>
        <?php endif; ?>
    </div>
<?php endif; ?>







</body>
</html>
<?php /**PATH D:\myProject\OSPanel\domains\qabul_tsul_texnikum\resources\views/admin/pages/petition/to_pdf.blade.php ENDPATH**/ ?>