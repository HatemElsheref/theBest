<?php


use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::group(['prefix'=>'dashboard'],function(){

        Route::group(['prefix'=>'auth'],function (){
            Route::get('/login','DashboardAuth@showLoginForm')->name('dashboard.loginForm');
            Route::post('/login','DashboardAuth@login')->name('dashboard.login');
        });
    });


    Route::group(['prefix'=>'dashboard','middleware'=>'AdminAuth'],function(){

        Route::post('/logout','DashboardAuth@logout')->name('dashboard.logout');
        Route::get('/','DashboardController@index')->name('dashboard.index');


        Route::resource('/admin','AdminController')->except('show');
        Route::get('/my-account','AccountController@index')->name('account.index');
        Route::put('/my-account','AccountController@update')->name('account.update');
        Route::resource('/role','RoleController')->except('show');


});
});
