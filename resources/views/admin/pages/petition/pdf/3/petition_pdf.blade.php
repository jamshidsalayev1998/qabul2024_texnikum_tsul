<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('users/petition_pdf_styles/style.css')}}">
</head>
<body>
<div class="row">
    <div class="w-50"></div>
    <div class="w-50 text-right">
        Toshkent davlat yuridik universiteti rektori vazifasini vaqtincha bajaruvchi Rustambekov Islombek Rustambekovich ga
        <br> {{$petition->last_name}} {{$petition->first_name}} {{$petition->middle_name}} dan
    </div>
</div>
<div class="row text-center">
    <h3><b>Ariza</b></h3>
</div>
<div class="row text-center">
    <h4><b>Toshkent davlat yuridik universiteti magistraturasiga qabul qilish to'g'risida</b></h4>
</div>
<div class="row">
    <p>
        Menga <b>{{$petition->getFaculty()->name_uz}}</b> magistratura mutaxasisligi, ta'limning
        <b>{{ $petition->getLanguagetype()->name_uz }}</b> tiliga , <b>{{$petition->getEdutype()->name_uz}}</b> shaklida o'qishga qabul qilishingizni so'rayman.
    </p>
    <p>
        Ma'lumotim <b>{{$petition->getTypeschool()->malumoti}}</b> <b>{{$petition->school}}</b> ni <b>{{$petition->graduation_date}}</b> yilda tugatganman.
    </p>
    <p>
        Ma'lumotim haqidagi hujjat (diplom) seriasi va raqami : <b>{{$petition->diplom_number}}</b>
    </p>
    <p>
        Men <b>Vazirlar Mahkamasining 2020-yil 26-avgustdagi 513-son qarori</b> tufayli kirish test sinovlarisiz o'qishga kirish huquqiga egaman.
    </p>
    <p>
        Magistraturada <b>{{ $petition->getLanguagetype()->name_uz }}</b> tilida o'qiyman.
    </p>
    <p>
        Tug'ilgan vaqtim va joyim: <b>{{date('m-d-Y' , strtotime($petition->birth_date))}}</b> yil ,  <b>{{$petition->address}}</b>
    </p>
    <p>
        Fuqaroligim <b>{{$petition->citizenship}}</b>
    </p>
    <p>
        Doimiy yashash joyim: <b>{{$petition->getCountry()->name_uz}}, {{$petition->getRegion()->name_uz}}, {{$petition->getArea()->name_uz}}, {{$petition->address}}</b>
    </p>
    <p>
        Pasportga (ID-kartaga) oid ma'lumotlar: <b>{{$petition->passport_seria}}</b> , <b>{{$petition->passport_given_place}}</b>
    </p>
    <p>
        Mehnat faoliyatim bo'yicha quyidagini ma'lum qilaman: <b>{{$petition->labor_activity}}</b>
    </p>
    <p>
        Magistraturada o'qishni tugatgandan so'ng kamida uch yil uzluksiz ishlash majburiyati bilan tanishdim
    </p>
    <div class="w-100">
        <div class="w-50">
            <b>{{$petition->last_name}} {{$petition->first_name}} {{$petition->middle_name}}</b>
        </div>
        <div class="w-50">
            <div class="w-100">
                <div class="w-50">
                    ____________(imzo)
                </div>
                <div class="w-50">
                    <b>{{date('d-m-Y' , strtotime($petition->created_at))}}</b>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
