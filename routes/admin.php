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
            Route::get('/credit/form/{id}', 'WalletController@creditForm')->name('admin.branch_credit_form'); 
            Route::put('/credit/balance/{id}', 'WalletController@credit')->name('admin.branch_credit'); 
            Route::get('/debit/form/{id}', 'WalletController@debitForm')->name('admin.branch_debit_form'); 
            Route::put('/debit/balance/{id}', 'WalletController@debit')->name('admin.branch_debit'); 

        });

        Route::group(['prefix'=>'student'],function(){
            Route::get('/list', 'StudentController@studentList')->name('admin.student_list'); 
            Route::get('/list/ajax', 'StudentController@studentListAjax')->name('admin.student_list_ajax'); 
            Route::get('edit/form/{student_id}','StudentController@studentEditForm')->name('admin.edit_student_form');
            Route::get('retrive/course/fees/{course_id}', 'StudentController@retriveCourseFees')->name('admin.retrive_course_fees');
            Route::get('remove/qual/{qual_id}', 'StudentController@removeQual')->name('admin.remove_qual');
            Route::put('update/student/{id}/{branch_id}', 'StudentController@updateStudent')->name('admin.update_student');
            
            Route::get('/exam/fee/paid/list', 'StudentController@examFeePaidList')->name('admin.exam_fee_paid_list'); 
            Route::get('/exam/fee/paid/list/ajax', 'StudentController@examFeePaidListAjax')->name('admin.exam_fee_paid_list_ajax'); 
            
           

        });

        Route::group(['prefix' => 'payment'], function () {
            Route::get('request/list', 'PaymentController@paymentRequestList')->name('admin.payment_request_list'); 
            Route::get('request/list/ajax', 'PaymentController@paymentRequestListAjax')->name('admin.payment_request_list_ajax'); 
            Route::get('approve/{id}', 'PaymentController@approvePayment')->name('admin.approve_payment_request'); 
            Route::get('reject/{id}', 'PaymentController@rejectPayment')->name('admin.reject_payment_request'); 

        });
    });   
});