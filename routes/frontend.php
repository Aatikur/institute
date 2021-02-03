<?php

use App\Models\BranchDetails;
use App\Models\Document;
use App\Models\Gallery;
use Illuminate\Support\Facades\Route;

// ------- Index --------
Route::get('/', function () {
    return view('web.index');
})->name('web.index');


// ------- About --------
Route::get('/About', function () {
    return view('web.about.about-gclm');
})->name('web.about.about');

Route::get('/Chairman/Message', function () {
    return view('web.about.chairman-message');
})->name('web.about.chairman-message');

Route::get('/Mission/Vission', function () {
    return view('web.about.mission-vission');
})->name('web.about.mission-vission');

// ------- bank --------
Route::get('/Bank/Details', function () {
    return view('web.bank.bank-details');
})->name('web.bank.bank-details');

// // ------- crouse --------
// Route::get('/Course', function () {
//     return view('web.course.courses');
// })->name('web.course.courses');


// Route::get('/CourseDetails', function () {
//     return view('web.course.courses-details');
// })->name('web.course.courses-details');


// ------- Franchise --------
Route::get('/Why/GCLM', function () {
    return view('web.franchise.why-gclm');
})->name('web.franchise.why-gclm');

Route::get('/Affiliation/Process', function () {
    return view('web.franchise.affiliation-process');
})->name('web.franchise.affiliation-process');

Route::get('/Apply/Online', function () {
    return view('web.franchise.apply-online');
})->name('web.franchise.apply-online');


//------- Student --------
Route::get('/Student/Verification', function () {
    return view('web.student.student-verification');
})->name('web.student.student-verification');

Route::get('/Registration/Process', function () {
    return view('web.student.registration-process');
})->name('web.student.registration-process');

Route::get('/Student/Result', function () {
    return view('web.student.student-result');
})->name('web.student.student-result');


Route::get('/Online/Admit', function () {
    return view('web.student.admit-card');
})->name('web.student.admit-card');

Route::get('/Online/Marksheet', function () {
    return view('web.student.marksheet-online');
})->name('web.student.marksheet-online');

Route::get('/Online/Certificate', function () {
    return view('web.student.certificate-online');
})->name('web.student.certificate-online');


// Route::get('/Student/Certificate', function () {
//     return view('web.student.student-certificate');
// })->name('web.student.student-certificate');

// Route::get('/Student/Marksheet', function () {
//     return view('web.student.student-marksheet');
// })->name('web.student.student-marksheet');

// ------- Center --------
Route::get('/Center/Login', function () {
    return view('web.center.center-login');
})->name('web.center.center-login');

Route::get('/Center/Forgot/Password', function () {
    return view('web.center.center-forgot-password');
})->name('web.center.center-forgot-password');

// ------- Contact --------
Route::get('/Contact', function () {
    return view('web.contact.contact-us');
})->name('web.contact.contact');

Route::group(['namespace'=>'Web'],function(){
    Route::post('/Student/Admit/Card','WebController@studentAdmitCard')->name('web.admit.card');
    Route::post('/Student/Marksheet','WebController@studentMarksheet')->name('web.marksheet');
    Route::post('/Student/Certificate','WebController@studentCertificate')->name('web.cerificate');
    Route::get('course/{category_id}','WebController@courses')->name('web.courses');
    Route::get('course/details/{course_id}','WebController@courseDetails')->name('web.course_details');
    Route::get('get/branch/{state}','WebController@getBranch')->name('web.get_branch');
    
    Route::get('/Centers', 'WebController@allBranch')->name('web.franchise.centers');
    Route::post('/add/branch', 'WebController@addBranch')->name('web.franchise.add_branch');
    
});

// ------- download --------
Route::get('/Download', function () {
    $docs = Document::latest()->get();
    return view('web.download.download',compact('docs'));
})->name('web.download.download');

// ------- gallery --------
Route::get('/Gallery', function () {
    $gallery = Gallery::latest()->get();
    return view('web.gallery.gallery',compact('gallery'));
})->name('web.gallery.gallery');