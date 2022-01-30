<?php

use Illuminate\Support\Facades\Route;

Route::get('language/{lang}', function ($language) {
    session()->put('lang', $language);
    return back();
});

Route::get('/', 'authController@index');
Route::get('login', 'authController@login')->name('login');

Route::get('register', 'authController@register');

Route::get('service', 'pageController@service');
Route::get('feature', 'pageController@feature');
Route::get('contact', 'pageController@contact');

Route::post('login', 'authController@do_login');
Route::post('do_register', 'authController@do_register');


Route::group(['middleware' => 'auth'], function () {

    Route::post('logout', 'authController@logout');

    Route::get('home', 'homeController@index');

    Route::get('about_us', 'homeController@about_us');


    /*
     * Appointment
     */
    Route::get('appointment', 'appointmentController@index');
    Route::post('bus/info', 'appointmentController@bus_info');
    Route::post('do_appointment', 'appointmentController@do_appointment');

    /*
     * Appointment
     */
    Route::get('my_point', 'MypointController@my_point');
    Route::get('cancel_appointment/{id}', 'MypointController@cancel_appointment');



});
