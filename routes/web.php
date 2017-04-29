<?php

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

Route::post('/login', 'LoginController@login')->name('loginAction');
Route::get('/login', 'LoginController@index')->name('LG');
Route::get('/logout', 'LoginController@logout')->name('logoutAction');

//Student
Route::get('/', 'StudentDBController@index')->name('SDB-001');

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
	Route::group(['prefix' => 'student'], function()
	{
		Route::get('/', 'StudentController@index')->name('AS-001');
		Route::get('/edit/{id?}', 'StudentController@edit')->name('AS-002');
		Route::post('/save', 'StudentController@save')->name('AS-003');
		Route::post('/remove', 'StudentController@remove')->name('AS-004');
	});
	
	Route::group(['prefix' => 'classk'], function() {
		Route::get('/json/{speciality_id?}', 'ClasskController@json')->name('CS-001');
		Route::get('/', 'ClasskController@index')->name('AC-002');
		Route::get('/edit/{id?}', 'ClasskController@edit')->name('AC-003');
		Route::post('/save', 'ClasskController@save')->name('AC-004');
		Route::post('/remove', 'ClasskController@remove')->name('AC-005');
	});
	
	Route::group(['prefix' => 'subject'], function() {
		Route::get('/json/{speciality_id?}', 'SubjectController@json')->name('ASU-001');
		Route::get('/', 'SubjectController@index')->name('ASU-002');
		Route::get('/edit/{id?}', 'SubjectController@edit')->name('ASU-003');
		Route::post('/remove', 'SubjectController@remove')->name('ASU-004');
		Route::post('/save', 'SubjectController@save')->name('ASU-005');
	});
	
	Route::group(['prefix' => 'speciality'], function() {
		Route::get('/', 'SpecialityController@index')->name('ASP-001');
		Route::get('/edit/{id?}', 'SpecialityController@edit')->name('ASP-002');
		Route::post('/save', 'SpecialityController@save')->name('ASP-003');
		Route::post('/remove', 'SpecialityController@remove')->name('ASP-004');
	});
	
	Route::group(['prefix' => 'studentMark'], function() {
		Route::get('/', 'StudentMarkController@index')->name('ASM-001');
		Route::post('/save', 'StudentMarkController@save')->name('ASM-002');
		Route::get('/report', 'StudentMarkController@report')->name('ASM-003');
		Route::get('/pdf/{ids?}', 'StudentMarkController@pdf')->name('ASM-004');
	});
});
