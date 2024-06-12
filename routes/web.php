<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::group(['middleware'=>'auth'],function(){
// 	Route::get('/users/documents/passport_images/{id}' , function(){
// 		return 'ds';
// 	})
// });
//Route::get('/php-info', function () {
//    $user = \App\User::orderBy('id' , 'DESC')->get();
//    return $user;
//});

Route::group(
    [
        'prefix' => \LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    Route::get('/', function () {
//	    return "dsds";
        if (Auth::check()) {
            return redirect('/home');
        } else {
            return redirect(route('login'));
        }

    });

    Route::post('/user-password-update', 'ForgotController@reset')->name('forgot.password');
    Route::get('/user-password-forgot', 'ForgotController@reset_form')->name('forgot.password.form');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => 'auth'], function () {
        //other
        Route::post('/check-phone-code', 'HomeController@check_phone_code')->name('check_phone_code');
        Route::get('/get-regions/{id}', 'RegionController@get_regions')->name('get_regions');
        Route::get('/get-areas/{id}', 'AreaController@get_areas')->name('get_areas');
        Route::get('/get-faculties/{id}', 'FacultyController@get_faculties_by_high_school')->name('get_faculties_by_high_school');
        Route::get('/get-messages/{id}', 'CommentController@get_messages')->name('get_messages');
        Route::get('/get-type-edu/{id}', 'FacultyTypeEduController@get_type_edu')->name('get_type_edu');
        Route::get('/get-type-lang/{id}', 'FacultyTypeLangController@get_type_lang')->name('get_type_lang');
        Route::get('/get-noread-messages/{id}', 'CommentController@get_noread_messages')->name('get_noread_messages');
        Route::get('/get-all-noread-messages', 'CommentController@get_all_noread_messages')->name('get_all_noread_messages');
        Route::post('/send-messages', 'CommentController@send_messages')->name('send_messages');
        Route::get('/check-role', 'HomeController@check_role')->name('check_role');
        Route::get('/check-status', 'HomeController@check_status')->name('check_status');
        Route::get('/account-activating', 'HomeController@activate')->name('email.activate');
        Route::get('/email-resend', 'HomeController@resend_email')->name('resend.email');
        Route::get('/no-permission', 'HomeController@no_permission')->name('no_permission');
        Route::get('/check-mail-code/{code}', 'HomeController@check_code')->name('email.check');
        Route::get('/get-edits/{id}', 'EditingController@get_edits')->name('get_edits');
        Route::get('/get-enable_documents/{id}', 'EditingController@get_enable_documents')->name('get_enable_documents');


        //users
        Route::group(['middleware' => ['email_status', 'simpleuser']], function () {
            Route::get('/application', 'PetitionController@index')->name('petition.index');
            Route::get('/application-create', 'PetitionController@create')->name('petition.create');
            Route::post('/application-store', 'PetitionController@store')->name('petition.store');
            Route::put('/application-update/{id}', 'PetitionController@update')->name('petition.update');
            Route::get('/application-status', 'PetitionController@status')->name('petition.status');
            Route::get('/application-show/{id}', 'PetitionController@show')->name('petition.show');
            Route::get('/application-edit/{id}', 'PetitionController@edit')->name('petition.edit');
            Route::get('/application-print/{id}', 'PetitionController@to_pdf')->name('petition.pdf');
        });


        Route::group(['middleware' => ['tekshiruvchi', 'adminstatus']], function () {
            //admin
            Route::get('/applications-check', 'AdminController@admin_index')->name('admin.index');
            Route::get('/applications-show/{id}', 'AdminController@admin_show')->name('admin.show');
            Route::get('/applications-accept/{id}', 'AdminController@admin_accept')->name('admin.accept');
            Route::post('/applications-return', 'AdminController@admin_return')->name('admin.return');
            Route::get('/new-applications', 'AdminController@admin_news')->name('admin.news');
            Route::get('/returned-applications', 'AdminController@admin_returneds')->name('admin.returneds');
            Route::get('/accepted-applications', 'AdminController@admin_accepteds')->name('admin.accepteds');
            Route::get('/application-pdf/{id}', 'AdminController@admin_petition_pdf')->name('admin.petition.pdf');
            Route::get('/applications-pdf', 'AdminController@admin_petitions_pdf')->name('admin.petitions.pdf');
            Route::get('/new-applications-pdf', 'AdminController@admin_new_petitions_pdf')->name('admin.new.petitions.pdf');
            Route::get('/returned-applications-pdf', 'AdminController@admin_returned_petitions_pdf')->name('admin.returned.petitions.pdf');
            Route::get('/accepted-applications-pdf', 'AdminController@admin_accepted_petitions_pdf')->name('admin.accepted.petitions.pdf');
            Route::get('/applications-reports', 'AdminController@admin_reports')->name('admin.reports');
            Route::get('/applications-reports-pdf', 'AdminController@admin_reports_pdf')->name('admin.reports.pdf');
            Route::get('/applications-reports-area/{id}', 'AdminController@admin_reports_area')->name('admin.reports.area');
            Route::get('/applications-reports-area-pdf/{id}', 'AdminController@admin_reports_area_pdf')->name('admin.reports.area.pdf');
            Route::get('/applications-reports-faculty', 'AdminController@admin_reports_faculty')->name('admin.reports.faculty');
            Route::get('/applications-reports-faculty-pdf', 'AdminController@admin_reports_faculty_pdf')->name('admin.reports.faculty.pdf');
            Route::get('/applications-messages', 'AdminController@admin_messages')->name('admin.messages');

            //newdesign
            Route::get('/all_app_count', 'AdminController@all_app_count')->name('all_app_count');
            Route::get('/acc_app_count', 'AdminController@acc_app_count')->name('acc_app_count');
            Route::get('/return_app_count', 'AdminController@return_app_count')->name('return_app_count');
            Route::get('/wait_app_count', 'AdminController@wait_app_count')->name('wait_app_count');
            Route::get('/get_all_totable', 'AdminController@get_all_totable')->name('get_all_totable');
            Route::get('/get_acc_totable', 'AdminController@get_acc_totable')->name('get_acc_totable');
            Route::get('/get_return_totable', 'AdminController@get_return_totable')->name('get_return_totable');
            Route::get('/get_wait_totable', 'AdminController@get_wait_totable')->name('get_wait_totable');

            Route::get('/search-all/{data}', 'AdminController@search_all')->name('search-all');
            Route::get('/search-wait/{data}', 'AdminController@search_wait')->name('search-wait');
            Route::get('/search-return/{data}', 'AdminController@search_return')->name('search-return');
            Route::get('/search-acc/{data}', 'AdminController@search_acc')->name('search-acc');

            Route::get('/export_all_excel', 'AdminController@export_all_excel')->name('export_all_excel');
            Route::get('/export_acc_excel', 'AdminController@export_acc_excel')->name('export_acc_excel');
            Route::get('/export_return_excel', 'AdminController@export_return_excel')->name('export_return_excel');
            Route::get('/export_wait_excel', 'AdminController@export_wait_excel')->name('export_wait_excel');
            Route::get('/kkk/{name}', function ($name) {
                return Storage::download($name);
            });
            Route::get('/applications-statistics', 'AdminController@statistics')->name('admin.statistics');
            Route::get('/applications-statistics/{id}', 'AdminController@statistics_by_high_schools')->name('admin.statistics_by_high_schools');
            Route::get('/get_count_reg_atat', 'AdminController@get_count_reg_atat')->name('get_count_reg_atat');
            Route::post('/admin-send-sms', 'AdminController@send_sms')->name('admin.send.sms');
            Route::post('/admin-send-sms-ajax', 'AdminController@send_sms_ajax')->name('admin.send.sms.ajax');
        });


        Route::group(['middleware' => 'superadmin'], function () {
            //superadmin

            Route::get('/admins', 'SuperadminController@admins_index')->name('admins.index');
            Route::post('/admins-store', 'SuperadminController@admins_store')->name('admins.store');
            Route::delete('/admins-delete/{id}', 'SuperadminController@admins_delete')->name('admins.delete');
            Route::put('/admins-update/{id}', 'SuperadminController@admins_update')->name('admins.update');
            Route::put('/admins-update-password/{id}', 'SuperadminController@admins_update_password')->name('admins.new.password');
            //datas
            Route::get('/superadmin-regions', 'RegionController@index')->name('superadmin.regions');
            Route::delete('/region-delete/{id}', 'RegionController@destroy')->name('region.delete');
            Route::post('/region-store', 'RegionController@store')->name('region.store');
            Route::put('/region-update/{id}', 'RegionController@update')->name('region.update');

            Route::get('/superadmin-areas', 'AreaController@index')->name('superadmin.areas');
            Route::delete('/area-delete/{id}', 'AreaController@destroy')->name('area.delete');
            Route::post('/area-store', 'AreaController@store')->name('area.store');
            Route::put('/area-update/{id}', 'AreaController@update')->name('area.update');

            Route::get('/superadmin-faculties', 'FacultyController@index')->name('superadmin.faculties');
            Route::delete('/faculty-delete/{id}', 'FacultyController@destroy')->name('faculty.delete');
            Route::post('/faculty-store', 'FacultyController@store')->name('faculty.store');
            Route::put('/faculty-update/{id}', 'FacultyController@update')->name('faculty.update');

            Route::get('/superadmin-edutypes', 'EdutypeController@index')->name('superadmin.edutypes');
            Route::delete('/edutype-delete/{id}', 'EdutypeController@destroy')->name('edutype.delete');
            Route::post('/edutype-store', 'EdutypeController@store')->name('edutype.store');
            Route::put('/edutype-update/{id}', 'EdutypeController@update')->name('edutype.update');

            Route::get('/superadmin-high-schools', 'HighSchoolController@index')->name('superadmin.high_schools');
            Route::delete('/high-school-delete/{id}', 'HighSchoolController@destroy')->name('high_school.delete');
            Route::post('/high-school-store', 'HighSchoolController@store')->name('high_school.store');
            Route::put('/high-school-update/{id}', 'HighSchoolController@update')->name('high_school.update');

            Route::get('/superadmin-langtypes', 'LanguagetypeController@index')->name('superadmin.langtypes');
            Route::delete('/langtype-delete/{id}', 'LanguagetypeController@destroy')->name('langtype.delete');
            Route::post('/langtype-store', 'LanguagetypeController@store')->name('langtype.store');
            Route::put('/langtype-update/{id}', 'LanguagetypeController@update')->name('langtype.update');

            Route::get('/superadmin-countries', 'CountryController@index')->name('superadmin.countries');
            Route::delete('/country-delete/{id}', 'CountryController@destroy')->name('country.delete');
            Route::post('/country-store', 'CountryController@store')->name('country.store');
            Route::put('/country-update/{id}', 'CountryController@update')->name('country.update');

            //other
            Route::get('/application-datas', 'SuperadminController@petition_datas')->name('petition_datas');
            Route::get('/application-edit', 'SuperadminController@petition_edit')->name('petition_edit');
            Route::put('/application-sup-update/{id}', 'SuperadminController@sup_update')->name('super_update');
            Route::get('/send-test-sms', 'TestsmsController@test_sms')->name('test_sms');

            Route::get('/petition-edit-superadmin/{id}', 'SuperadminController@edit_petition')->name('superadmin.petition.edit');
            Route::get('/petition-delete-superadmin/{id}', 'SuperadminController@delete_petition')->name('superadmin.petition.delete');
            Route::put('/petition-update-superadmin/{id}', 'SuperadminController@update_petition')->name('superadmin.update.edit');

            Route::get('/change-faculty-status/{id}/{value}', 'FacultyController@change_faculty_status')->name('change_faculty_status');
            Route::get('/change-region-status/{id}/{value}', 'RegionController@change_region_status')->name('change_region_status');
            Route::get('/change-area-status/{id}/{value}', 'AreaController@change_area_status')->name('change_area_status');
            Route::get('/change-country-status/{id}/{value}', 'CountryController@change_country_status')->name('change_country_status');

            Route::get('/superadmin/high-school-admin/index', 'HighSchoolAdminController@index')->name('superadmin.high.school.admin.index');
            Route::post('/superadmin/high-school-admin/store', 'HighSchoolAdminController@store')->name('superadmin.high.school.admin.store');
            Route::delete('/superadmin/high-school-admin/delete/{id}', 'HighSchoolAdminController@destroy')->name('high_school_admin.delete');
            Route::put('/superadmin/high-school-admin/new-password/{id}', 'HighSchoolAdminController@new_password')->name('high_school_admin.new.password');

        });


    });

    Route::get('/bitta-dub', 'TogirlaController@bitta_dub');
    Route::get('/send-sms', 'SendSmsController@send_sms');
    Route::get('/get-real-time', 'OtherController@real_time')->name('real_time');
    Route::get('/cache-clear', function () {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        return "cache cleared and configed";
    });
    Route::get('/zip-files' , function (){
        $pets = \App\Petition::where('zip_file' , null)->get();
        foreach ($pets as $pet) {
            $name = $pet->last_name.'_'.$pet->first_name.'_'.$pet->middle_name;
            $name = str_replace(' ', '' , $name);
            $name = str_replace('\'', '' , $name);
            $name = str_replace('"', '' , $name);
            $name = str_replace('`', '' , $name);
            $zip = \ZanySoft\Zip\Zip::create(   'zip_files/'.$name.'.zip');
            if ($pet->image && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/image/'.$pet->image)) $zip->add(public_path().'/users/documents/image/'.$pet->image);
            if ($pet->passport_image && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/passport_images/'.$pet->passport_image)) $zip->add(public_path().'/users/documents/passport_images/'.$pet->passport_image);
            if ($pet->diplom_image && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/diplom_images/'.$pet->diplom_image)) $zip->add(public_path().'/users/documents/diplom_images/'.$pet->diplom_image);
            if ($pet->english_image && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/english_images/'.$pet->english_image)) $zip->add(public_path().'/users/documents/english_images/'.$pet->english_image);
            if ($pet->image_recommendation && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/recommendation_images/'.$pet->image_recommendation)) $zip->add(public_path().'/users/documents/recommendation_images/'.$pet->image_recommendation);
            if ($pet->diplom_image_app && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/diplom_images/'.$pet->diplom_image_app)) $zip->add(public_path().'/users/documents/diplom_images/'.$pet->diplom_image_app);
            if ($pet->workbook && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/workbook/'.$pet->workbook)) $zip->add(public_path().'/users/documents/workbook/'.$pet->workbook);
            if ($pet->passport_copy_translate && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/passport_images/'.$pet->passport_copy_translate)) $zip->add(public_path().'/users/documents/passport_images/'.$pet->passport_copy_translate);
            if ($pet->bith_certificate_copy && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/passport_images/'.$pet->bith_certificate_copy)) $zip->add(public_path().'/users/documents/passport_images/'.$pet->bith_certificate_copy);
            if ($pet->birth_certificate_copy_translate && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/passport_images/'.$pet->birth_certificate_copy_translate)) $zip->add(public_path().'/users/documents/passport_images/'.$pet->birth_certificate_copy_translate);
            if ($pet->edu_document_copy_translate && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/diplom_images/'.$pet->edu_document_copy_translate)) $zip->add(public_path().'/users/documents/diplom_images/'.$pet->edu_document_copy_translate);
            if ($pet->med_form_copy_086 && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/med_forms/'.$pet->med_form_copy_086)) $zip->add(public_path().'/users/documents/med_forms/'.$pet->med_form_copy_086);
            if ($pet->med_form_copy_086_translate && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/med_forms/'.$pet->med_form_copy_086_translate)) $zip->add(public_path().'/users/documents/med_forms/'.$pet->med_form_copy_086_translate);
            if ($pet->vich_copy && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/med_forms/'.$pet->vich_copy)) $zip->add(public_path().'/users/documents/med_forms/'.$pet->vich_copy);
            if ($pet->vich_copy_translate && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/med_forms/'.$pet->vich_copy_translate)) $zip->add(public_path().'/users/documents/med_forms/'.$pet->vich_copy_translate);
            if ($pet->med_form_copy_063 && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/med_forms/'.$pet->med_form_copy_063)) $zip->add(public_path().'/users/documents/med_forms/'.$pet->med_form_copy_063);
            if ($pet->med_form_copy_063_translate && \Illuminate\Support\Facades\File::exists(public_path().'/users/documents/med_forms/'.$pet->med_form_copy_063_translate)) $zip->add(public_path().'/users/documents/med_forms/'.$pet->med_form_copy_063_translate);
            $zip->close();
            $pet->zip_file = '/zip_files/'.$name.'.zip';
            $pet->update();
        }
        return $pets;
    });


});
Route::get('/password/{pass}', function ($pass = 123456){
   return bcrypt($pass);
});
