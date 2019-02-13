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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/up', 'HomeController@up');

Route::get('/', 'HomeController@index');
Route::get('/cru_buttons', 'HomeController@cru_buttons');
Route::get('/send_notification', 'HomeController@send_notification');
Route::post('/application_form', 'HomeController@application_form')->name('save_draft');
Route::get('/{up}', 'HomeController@invalid_input');