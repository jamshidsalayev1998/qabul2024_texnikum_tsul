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
        <br> {{$petition->last_name}} {{$petition->first_name}} {{$petition->middle_name}} dan
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
        Men <b>{{$petition->getFaculty()->name_uz}}</b> yo‘nalishida ta’lim olish uchun suhbatdan o‘tishimga ruxsat
        berishingizni so‘rayman.
    </p>
    <p>
        Ma'lumotim <b>{{$petition->getTypeschool()->malumoti}}</b> <b>{{$petition->school}}</b> ni
        <b>{{$petition->graduation_date}}</b> yilda tugatganman.
    </p>
    <p>
        Ta’lim to‘g‘risidagi hujjat  (diplom) seriasi va raqami : <b>{{$petition->diplom_number}}</b>
    </p>
{{--    <p>--}}
{{--       Suhbatdan  : <b>{{$petition->conversation_language_student->name_uz}}</b> tilida o‘taman.--}}
{{--    </p>--}}
     <p>
        Tug'ilgan vaqtim va joyim: <b>{{date('m-d-Y' , strtotime($petition->birth_date))}}</b> yil ,
        <b>{{$petition->address}}</b>
    </p>
{{--     <p>--}}
{{--        Doimiy yashash joyim: <b>{{$petition->getCountry()->name_uz}}, {{$petition->getRegion()->name_uz}}--}}
{{--            , {{$petition->getArea()->name_uz}}, {{$petition->address}}</b>--}}
{{--    </p>--}}
    <p>
        Biometrik pasport (identifikatsiya ID-kartasi) ma’lumoti: <b>{{$petition->passport_seria}}</b> ,
        <b>{{$petition->passport_given_place}}</b>
    </p>

    <p>
        Xalqaro yoki milliy olimpiadalarda, tanlovlarda hamda sport musobaqalarida qatnashganligi haqida ma’lumot (agar qatnashgan bo‘lsa)
        <b>{{$petition->olympics}}</b>
    </p>

{{--    <p>--}}
{{--        Nogironligi haqida ma’lumot: <b>{{$petition->disability_status->name_uz}} {{$petition->disability_description}}</b>--}}
{{--    </p>--}}

    <div class="w-100">
        <div class="w-50">
            <div>
               <p>Suhbat o‘tkazish qoidalari bilan tanishdim</p>
            <b>{{$petition->last_name}} {{$petition->first_name}} {{$petition->middle_name}}</b>
            </div>
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
