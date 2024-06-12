<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title></title>
</head>
<style type="text/css">

    body {
        {{--	background-image: url({{ asset('newadmin/img/FON.jpg') }});--}}
  font-family: DejaVu Sans;
    }

    @page {
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
@php $locale = App::getLocale(); $name_l = 'name_'.$locale; @endphp

{{-- <div class="w-100 absolute">
    <div class="pr_20"></div>
    <div class="pr_20"></div>
    <div class="pr_20">
        <img src="{{ asset('newadmin/img/logo.png') }}" class="w-100" >
    </div>
    <div class="pr_20"></div>
    <div class="pr_20"></div>
</div> --}}
{{--<table class="w-100" style="margin-top: 30px" cellpadding="0" cellspacing="0">--}}
{{--    <tr>--}}
{{--        <td></td>--}}
{{--        <td>--}}
{{--            <img src="{{ asset('newadmin/img/tsul_logo.png') }}">--}}
{{--            <br>--}}
{{--        </td>--}}
{{--        <td></td>--}}
{{--    </tr>--}}
{{--</table>--}}
<table class="w-100 ml-2 mr-2 mt-2  bg-white border" cellspacing="0">
    <tr>
        <td>
            @lang('petition.First name') <br><br>
            @lang('petition.Last name') <br><br>
            @lang('petition.Father`s name')
        </td>
        <td colspan="2">
            {{ $petition->first_name }} <br><br>
            {{ $petition->last_name }} <br><br>
            {{ $petition->middle_name }}
        </td>
        {{--        <td rowspan="2">--}}
        {{--            <div class="f_img">--}}
        {{--                <img class="w-100" style="height: auto; max-height: 500px"--}}
        {{--                     src="{{ asset('users/documents/image') }}/{{ $petition->image }}">--}}
        {{--            </div>--}}

        {{--        </td>--}}
    </tr>
    <tr>
        <td>
            @lang('petition.Passport seria') <br>Tug'ilgan sanasi
        </td>
        <td colspan="2">
            {{ $petition->passport_seria }}<br>{{$petition->birth_date}}
        </td>
    </tr>
    <tr>
        <td>
            @lang('petition.Talim tashkiloti')<br> <br>
            {{--            @lang('petition.Faculty')<br> <br>--}}
            @lang('petition.Type of Education')
        </td>
        <td colspan="2">
            @if($petition->high_school)
                {{ $petition->high_school->$name_l }}<br><br>
            @endif
            {{--            {{ $petition->getFaculty()->$name_l }}<br><br>--}}
            {{ $petition->getEdutype()->$name_l }}
        </td>

    </tr>
    <tr>
        <td>
            Language of Study

        </td>
        <td colspan="2">
            {{ $petition->getLanguagetype()->$name_l }}
        </td>
        {{--		<td></td>--}}
    </tr>
    <tr>
        <td>
            Telefon

        </td>
        <td colspan="2">
            {{ $petition->getUser()->email }}
        </td>
        {{--		<td></td>--}}
    </tr>
{{--    <tr>--}}
{{--        <td>--}}
{{--            Millati/Fuqaroligi--}}

{{--        </td>--}}
{{--        <td colspan="2">--}}
{{--            {{ $petition->nationality }}/{{$petition->citizenship}}--}}
{{--        </td>--}}
{{--        --}}{{--		<td></td>--}}
{{--    </tr>--}}
    {{--	<tr>--}}
    {{--        <td>--}}
    {{--            Manzil--}}

    {{--        </td>--}}
    {{--        <td colspan="2" >--}}
    {{--            {{ $petition->getFullAdress() }}--}}
    {{--        </td>--}}
    {{--		<td></td>--}}
    {{--    </tr>--}}
    <tr>
        <td>
            Tugatgan ta'lim muassasasi bitirgan yili
            <br>
            Diplom raqami

        </td>
        <td colspan="2">
            {{ $petition->school }} {{$petition->graduation_date}}
            <br>
            {{$petition->diplom_number}}
        </td>
        {{--		<td></td>--}}
    </tr>
    <tr>
        <td>
            Ingliz tili sertifikati - bali

        </td>
        <td colspan="2">
            {{$petition->getEndegree()->name_uz}} - <b>{{$petition->overall_score_english}}</b>
        </td>
        {{--		<td></td>--}}
    </tr>
{{--    <tr>--}}
{{--        <td>--}}
{{--            Nogironligi--}}

{{--        </td>--}}
{{--        <td colspan="2">--}}
{{--            {{$petition->getDisability()->$name_l}} - <b>{{$petition->disability_description}}</b>--}}
{{--        </td>--}}
{{--        --}}{{--		<td></td>--}}
{{--    </tr>--}}
</table>
<div class="page-break"></div>
@if($petition->image_recommendation)
    <div class="page-break">
        @php
            $file_extension = \File::extension(public_path().'/users/documents/recommendation_images/'.$petition->image_recommendation);

        @endphp
        @if($file_extension == 'pdf' || $file_extension == 'PDF')
            {{--		<iframe src="{{asset('users/documents/recommendation_images/'.$petition->image_recommendation)}}" type="">--}}
            <iframe src="{{asset('users/documents/recommendation_images/'.$petition->image_recommendation)}}"
                    frameborder="0" width="100%"></iframe>
        @endif
    </div>
@endif
{{--<div class="w-100" style="text-align: center">--}}
{{--    <p>--}}
{{--        {{$petition->high_school->$name_l}}--}}
{{--    </p>--}}
{{--</div>--}}


</body>
</html>
