<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Branch','prefix'=>'branch'],function(){
    Route::get('/login','LoginController@index')->name('branch.login_form');    
    Route::post('login/submit', 'LoginController@branchLogin')->name('branch.login_submit');

    Route::group(['middleware'=>'auth:branch',],function(){
        Route::get('/dashboard', 'DashboardController@dashboardView')->name('branch.deshboard'); 
        Route::post('logout', 'LoginController@logout')->name('branch.logout');
        Route::group(['prefix' => 'student'], function () {
            Route::get('list', 'StudentController@studentList')->name('branch.student_list'); 
            Route::get('register/form', 'StudentController@registerStudentForm')->name('branch.register_student_form'); 
            
            
            
            
        });
    });

});