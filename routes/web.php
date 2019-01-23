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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UsersController@index')->name('users');
Route::get('/userFormAdd', 'UsersController@formAdd')->name('userFormAdd');
Route::post('/userInsert', 'UsersController@insert')->name('userInsert');
Route::get('/userFormEdit/{id}', 'UsersController@formEdit')->where('id', '[0-9]+')->name('userFormEdit');
Route::post('/userUpdate/{id}', 'UsersController@update')->where('id', '[0-9]+')->name('userUpdate');
Route::get('/userDelete/{id}', 'UsersController@delete')->where('id', '[0-9]+')->name('userDelete');

Route::get('/patients', 'PatientsController@index')->name('patients');
Route::get('/patientFormAdd', 'PatientsController@formAdd')->name('patientFormAdd');
Route::post('/patientInsert', 'PatientsController@insert')->name('patientInsert');
Route::get('/patientFormEdit/{id}', 'PatientsController@formEdit')->where('id', '[0-9]+')->name('patientFormEdit');
Route::post('/patientUpdate/{id}', 'PatientsController@update')->where('id', '[0-9]+')->name('patientUpdate');
Route::get('/patientDelete/{id}', 'PatientsController@delete')->where('id', '[0-9]+')->name('patientDelete');

Route::get('/doctors', 'DoctorsController@index')->name('doctors');
Route::get('/doctorFormAdd', 'DoctorsController@formAdd')->name('doctorFormAdd');
Route::post('/doctorInsert', 'DoctorsController@insert')->name('doctorInsert');
Route::get('/doctorFormEdit/{id}', 'DoctorsController@formEdit')->where('id', '[0-9]+')->name('doctorFormEdit');
Route::post('/doctorUpdate/{id}', 'DoctorsController@update')->where('id', '[0-9]+')->name('doctorUpdate');
Route::get('/doctorDelete/{id}', 'DoctorsController@delete')->where('id', '[0-9]+')->name('doctorDelete');
Route::get('/jsonDoctors', 'DoctorsController@jsonDoctors')->name('jsonDoctors');

Route::get('/schedules', 'SchedulesController@index')->name('schedules');
Route::get('/scheduleListing/{id}', 'SchedulesController@scheduleListing')->where('id', '[0-9]+')->name('scheduleListing');
Route::get('/scheduleFormAdd/{id}', 'SchedulesController@formAdd')->where('id', '[0-9]+')->name('scheduleFormAdd');
Route::post('/scheduleInsert/{id}', 'SchedulesController@insert')->where('id', '[0-9]+')->name('scheduleInsert');
Route::get('/scheduleFormEdit/{id}', 'SchedulesController@formEdit')->where(['id' => '[0-9]+', 'idDoctor' => '[0-9]+'])->name('scheduleFormEdit');
Route::post('/scheduleUpdate/{id}/{idDoctor}', 'SchedulesController@update')->where('id', '[0-9]+')->name('scheduleUpdate');
Route::get('/scheduleDelete/{id}', 'SchedulesController@delete')->where('id', '[0-9]+')->name('scheduleDelete');