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
	/*$nexmo = app('Nexmo\Client');
    $nexmo->message()->send([
    'to' => '8801733784040',
    'from' => '8801737573157',
    'text' => 'Using the instance to send a message.'
]);*/
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

Route::get('/contactNumber', array('uses' => 'addcontactNumberController@index', 'as' => 'contactNumber'));
Route::post('/sendSms', 'addcontactNumberController@sendSms')->name('sendSms');



Route::resource('campain','campainController');
Route::resource('sms','smsController');
Route::resource('csv','csvController');
Route::resource('manual','manualController');
Route::resource('select','selectNumberController');
Route::resource('handson','handsonTableController');
Route::resource('contact','contactNumberController');