<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin'],function(){
    Route::get('/admin/login','LoginController@index')->name('admin.login_form');    
    Route::post('login', 'LoginController@adminLogin');

    Route::group(['middleware'=>'auth:admin','prefix'=>'admin'],function(){
        Route::get('/dashboard', 'DashboardController@dashboardView')->name('admin.deshboard'); 
        Route::post('logout', 'LoginController@logout')->name('admin.logout');
        
        Route::group(['prefix'=>'course'],function(){
            Route::get('/list', 'CourseController@courseList')->name('admin.course_list'); 
            Route::get('add/form', 'CourseController@addCourseForm')->name('admin.add_course_form');
            Route::post('add','CourseController@addCourse')->name('admin.add_course'); 
            Route::get('status/{course_id}/{status}','CourseController@status')->name('admin.course_status'); 
            Route::get('edit/form/{course_id}', 'CourseController@editCourseForm')->name('admin.edit_course_form');
            Route::put('update/{id}','CourseController@updateCourse')->name('admin.update_course'); 

        });
    });   
});