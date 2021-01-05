<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin','prefix'=>'admin'],function(){
    Route::get('/login','LoginController@index')->name('admin.login_form');    
    Route::post('login/submit', 'LoginController@adminLogin')->name('admin.login_submit');;

    Route::group(['middleware'=>'auth:admin'],function(){
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

        Route::group(['prefix'=>'branch'],function(){
            Route::get('/list', 'BranchController@branchList')->name('admin.branch_list'); 
            Route::get('add/form', 'BranchController@addBranchForm')->name('admin.add_branch_form');
            Route::post('add','BranchController@addBranch')->name('admin.add_branch'); 
            Route::get('status/{branch_id}/{status}','BranchController@status')->name('admin.branch_status');
            Route::get('edit/form/{id}', 'BranchController@editBranchForm')->name('admin.edit_branch_form');
            Route::post('update/{id}','BranchController@updateBranch')->name('admin.update_branch');
            Route::get('change/password/form/{id}','BranchController@changePasswordForm')->name('admin.change_password_form');
            Route::put('change/password/{id}','BranchController@changePassword')->name('admin.change_branch_password');
        });

        Route::group(['prefix'=>'wallet'],function(){
            Route::get('/balance', 'WalletController@walletBalance')->name('admin.branch_wallet_balance'); 
            Route::get('/balance/ajax', 'WalletController@walletBalanceAjax')->name('admin.branch_wallet_balance_ajax'); 
            Route::get('/history/{id}', 'WalletController@walletHistory')->name('admin.branch_wallet_history'); 

        });

        Route::group(['prefix'=>'student'],function(){
            Route::get('/list', 'StudentController@studentList')->name('admin.student_list'); 
            Route::get('/list/ajax', 'StudentController@studentListAjax')->name('admin.student_list_ajax'); 
            Route::get('edit/form/{student_id}','StudentController@studentEditForm')->name('admin.edit_student_form');

        });
    });   
});