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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

//Auth::routes();
Route::post('/logout', 'Auth\LoginController@logout')->name('logout'); // logout

Route::get('/clinicstaff/home', 'HomeController@homeClinicStaff')->name('homeClinicStaff')->middleware('auth:clinicstaff'); // home clinicstaff lepas dah login

Route::get('/outpatient/home', 'HomeController@homeOutpatient')->name('outpatientAgent')->middleware('auth:outpatient'); // home outpatient lepas dah login

// Login user
Route::get('/clinicstaff/login', 'Auth\LoginController@clinicstaffShowLogin')->name('clinicstaffLogin'); // login clinic staff page

Route::get('/outpatient/login', 'Auth\LoginController@outpatientShowLogin')->name('outpatientLogin'); // login outpatient page

Route::post('/clinicstaff/login', 'Auth\LoginController@clinicstaffLogin')->name('loginOnClinicStaff'); // login hantar data clinic staff

Route::post('/outpatient/login', 'Auth\LoginController@outpatientLogin')->name('loginOnOutpatient'); // login hantar data outpatient

// Register user
Route::get('/clinicstaff/register', 'Auth\RegisterController@showRegisterClinicStaff')->name('clinicstaffRegister'); // register clinic staff page

Route::get('/outpatient/register', 'Auth\RegisterController@showRegisterOutpatient')->name('outpatientRegister'); // register outpatient page

Route::post('/clinicstaff/register', 'Auth\RegisterController@createClinicStaff')->name('registeredClinicStaff'); // register hantar data clinic staff

Route::post('/outpatient/register', 'Auth\RegisterController@createOutpatient')->name('registeredOutpatient'); // register hantar data outpatient

// View user
Route::get('/outpatient/view/{id}', 'OutpatientController@showOutpatient')->name('viewOutpatient')->middleware('auth:outpatient');

Route::get('/clinicstaff/view/{id}', 'StaffController@showClinicStaff')->name('viewClinicStaff')->middleware('auth:clinicstaff');

// Update user
Route::put('/outpatient/update/{id}/update', 'OutpatientController@updateOutpatient')->name('updateOutpatient');

Route::get('/outpatient/edit/{id}', 'OutpatientController@edit')->name('editOutpatient')->middleware('auth:outpatient');

Route::put('/clinicstaff/update/{id}/update', 'StaffController@updateClinicStaff')->name('updateClinicStaff');

Route::get('/clinicstaff/edit/{id}', 'StaffController@edit')->name('editClinicStaff')->middleware('auth:clinicstaff');

// Create queue
Route::get('/outpatient/createqueue', 'QueueController@index')->name('createQueue')->middleware('auth:outpatient');

Route::post('/outpatient/createqueue', 'QueueController@createQueue')->name('queue.store')->middleware('auth:outpatient');

// View queue and view outpatient in table form
Route::get('/clinicstaff/viewqueue', 'QueueController@showQueue')->name('queue.show')->middleware('auth:clinicstaff');

Route::get('/clinicstaff/viewpatient', 'OutpatientController@view')->name('outpatient.show')->middleware('auth:clinicstaff');

// Update and (delete queue and outpatient)
Route::put('/clinicstaff/updatequeue/{id}', 'QueueController@updateQueue')->name('queue.update');

Route::get('/clinicstaff/editqueue/{id}', 'QueueController@edit')->name('queue.edit');

Route::delete('/clinicstaff/deletequeue/{id}', 'QueueController@destroyQueue')->name('queue.delete');

Route::delete('/clinicstaff/deletepatient/{id}', 'OutpatientController@destroyOutpatient')->name('outpatient.delete');

// Display
// Route::get('display', ['as' => 'display', 'uses' => 'DisplayController@index']);
// Route::get('/clinicstaff/display', 'DisplayController@index')->name('display');

//Call
Route::get('/clinicstaff/call/{id}','CallController@create')->name('call.create')->middleware('auth:clinicstaff');

Route::post('/clinicstaff/call/create{id}', 'CallController@store')->name('add.call');

Route::get('/clinicstaff/display', 'CallController@show')->name('call.display');