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

Route::get('/', function () {
    return view('home');
});

Route::get('/log-in', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/register', 'Admin\AdminController@register')->name('register');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'AboutController@index')->name('about');

Route::middleware('auth:web')->group(function () {
    Route::get('/admin/dashboard', 'Admin\DashboardController@dashboard')->name('admin-dashboard');

    Route::get('/admin/member/index', 'Admin\MemberController@index')->name('member-index');
    Route::get('/admin/member/student', 'Admin\MemberController@students')->name('member-students');
    Route::get('/admin/member/staff', 'Admin\MemberController@staff')->name('member-staff');
    Route::get('/admin/member/list', 'Admin\MemberController@data')->name('member-list');
    Route::get('/admin/member/student/list', 'Admin\MemberController@studentsData')->name('member-list');
    Route::get('/admin/member/staff/list', 'Admin\MemberController@staffData')->name('member-list');
    Route::get('/admin/member/create', 'Admin\MemberController@create')->name('member-create');
    Route::post('/admin/member/store', 'Admin\MemberController@store')->name('member-store');
    Route::get('/admin/member/{id}/edit', 'Admin\MemberController@edit')->name('member-edit');
    Route::post('/admin/member/{id}/update', 'Admin\MemberController@update')->name('member-update');
    Route::get('/admin/member/{id}/delete', 'Admin\MemberController@destroy')->name('member-delete');
    Route::post('/admin/member/status-change', 'Admin\MemberController@status')->name('member-status');
    Route::get('/admin/member/{id}/view', 'Admin\MemberController@view')->name('member-view');
    Route::post('/admin/member-personal-data/{id}/store', 'Admin\MemberController@memberpersonalDataStore')->name('member-personal-data-store');
    Route::post('/admin/member-data/{id}/store', 'Admin\MemberController@memberDataStore')->name('member-data-store');

    Route::get('/admin/grade/index', 'Admin\GradeController@index')->name('grade-index');
    Route::get('/admin/grade/list', 'Admin\GradeController@data')->name('grade-list');
    Route::get('/admin/grade/create', 'Admin\GradeController@create')->name('grade-create');
    Route::post('/admin/grade/store', 'Admin\GradeController@store')->name('grade-store');
    Route::get('/admin/grade/{id}/edit', 'Admin\GradeController@edit')->name('grade-edit');
    Route::post('/admin/grade/{id}/update', 'Admin\GradeController@update')->name('grade-update');
    Route::get('/admin/grade/{id}/delete', 'Admin\GradeController@destroy')->name('grade-delete');
    Route::post('/admin/grade/status-change', 'Admin\GradeController@status')->name('grade-status');

    Route::get('/admin/subject/index', 'Admin\SubjectController@index')->name('subject-index');
    Route::get('/admin/subject/list', 'Admin\SubjectController@data')->name('subject-list');
    Route::get('/admin/subject/create', 'Admin\SubjectController@create')->name('subject-create');
    Route::post('/admin/subject/store', 'Admin\SubjectController@store')->name('subject-store');
    Route::get('/admin/subject/{id}/edit', 'Admin\SubjectController@edit')->name('subject-edit');
    Route::post('/admin/subject/{id}/update', 'Admin\SubjectController@update')->name('subject-update');
    Route::get('/admin/subject/{id}/delete', 'Admin\SubjectController@destroy')->name('subject-delete');
    Route::post('/admin/subject/status-change', 'Admin\SubjectController@status')->name('subject-status');

    Route::get('/admin/class/index', 'Admin\ClassesController@index')->name('class-index');
    Route::get('/admin/class/list', 'Admin\ClassesController@data')->name('class-list');
    Route::get('/admin/class/create', 'Admin\ClassesController@create')->name('class-create');
    Route::post('/admin/class/store', 'Admin\ClassesController@store')->name('class-store');
    Route::get('/admin/class/{id}/edit', 'Admin\ClassesController@edit')->name('class-edit');
    Route::post('/admin/class/{id}/update', 'Admin\ClassesController@update')->name('class-update');
    Route::get('/admin/class/{id}/delete', 'Admin\ClassesController@destroy')->name('class-delete');
    Route::post('/admin/class/status-change', 'Admin\ClassesController@status')->name('class-status');

    Route::get('/admin/academic-year/index', 'Admin\AcademicYearContrtoller@index')->name('academic-year-index');
    Route::get('/admin/academic-year/list', 'Admin\AcademicYearContrtoller@data')->name('academic-year-list');
    Route::get('/admin/academic-year/create', 'Admin\AcademicYearContrtoller@create')->name('academic-year-create');
    Route::post('/admin/academic-year/store', 'Admin\AcademicYearContrtoller@store')->name('academic-year-store');
    Route::get('/admin/academic-year/{id}/edit', 'Admin\AcademicYearContrtoller@edit')->name('academic-year-edit');
    Route::post('/admin/academic-year/{id}/update', 'Admin\AcademicYearContrtoller@update')->name('academic-year-update');
    Route::get('/admin/academic-year/{id}/delete', 'Admin\AcademicYearContrtoller@destroy')->name('academic-year-delete');
    Route::post('/admin/academic-year/status-change', 'Admin\AcademicYearContrtoller@status')->name('academic-year-status');
    Route::get('/admin/academic-year/enabled-list', 'Admin\AcademicYearContrtoller@getEnabledList')->name('enabled-academic-year-list');

    Route::post('/admin/get-enabled-academic-year', 'Admin\AjaxController@getEnabledAcademicYears')->name('get-enabled-academic-year');
    Route::post('/admin/get-enabled-grades', 'Admin\AjaxController@getEnabledGrades')->name('get-enabled-grades');
    Route::post('/admin/get-enabled-classes-by-grade-id', 'Admin\AjaxController@getEnabledClassesByGradeId')->name('get-enabled-classes-by-grade-id');
    Route::post('/admin/get-enabled-subjects', 'Admin\AjaxController@getEnabledSubjects')->name('get-enabled-subjects');
});
