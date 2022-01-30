<?php

use Illuminate\Support\Facades\Route;

Route::get('language/{lang}', function ($language) {
    session()->put('lang', $language);
    return back();
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('/', 'authController@index');

    Route::post('login', 'authController@login');

    \Illuminate\Support\Facades\Config::set('auth.defines', 'admin');

    Route::group(['middleware' => 'admin:admin'], function () {
        Route::post('logout', 'authController@logout');

        Route::get('home', 'homeController@index');


        /*
         *Area
         */

        Route::get('area', 'areaController@index');
        Route::get('area/get/{id?}', 'areaController@get');
        Route::post('area/save', 'areaController@save');
        Route::get('area/delete/{id}', 'areaController@delete');


        /*
         *Bus
         */

        Route::get('bus', 'busController@index');
        Route::get('bus/get/{id?}', 'busController@get');
        Route::post('bus/save', 'busController@save');
        Route::get('bus/delete/{id}', 'busController@delete');


        /*
         *Employee
         */

        Route::get('employee', 'employeeController@index');
        Route::get('employee/get/{id?}', 'employeeController@get');
        Route::post('employee/save', 'employeeController@save');
        Route::get('employee/delete/{id}', 'employeeController@delete');



        /*
         *Users
         */

        Route::get('user', 'userController@index');
        Route::get('user/{status}/{id}', 'userController@change_status');





        /*
         *Trip
         */

        Route::get('trip', 'tripController@index');
        Route::get('trip/get/{id?}', 'tripController@get');
        Route::post('trip/save', 'tripController@save');


        /*
         *Setting
         */

        Route::get('setting', 'settingController@index');
        Route::post('update_setting', 'settingController@update_setting');


        /*
         * emp trip
         */

        Route::get('employee_trip', 'employeeTripController@index');
        Route::get('trip/change_status/{status}/{trip_id}/{user_id}', 'employeeTripController@change_status');





        /*
         *Students
         */

        Route::get('student', 'studentController@index');
        Route::get('student/get/{id?}', 'studentController@get');
        Route::post('student/save', 'studentController@save');
        Route::get('student/delete/{id}', 'studentController@delete');





    });


});


















































