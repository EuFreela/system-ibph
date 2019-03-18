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

/**
 * wheels
 */

Route::get('/','AccountController@getSignin')->name('account.getsignin');
Route::get('/signin','AccountController@getSignin')->name('account.getsignin');
Route::post('/signin','AccountController@postSignin')->name('account.postsignin');
Route::get('/recovery','AccountController@getRecovery')->name('account.getrecovery');
Route::post('/recovery','AccountController@postRecovery')->name('account.postrecovery');

Route::get('/{email}/{hash}','HomeController@getWheel')->name('wheel.mywheel');
Route::post('/questions/{id}','HomeController@postQuestions')->name('wheel.questions');

Route::post('/sendemail','EmailController@sendEmail')->name('wheel.sendemail');


/**
 * CALENDAR
 */
Route::get('/calendar','CalendarController@getCalendar')->name('calendar.calendar');
Route::post('/calendar/event','CalendarController@postEvent')->name('calendar.postevent');
Route::put('/calendar/editevent','CalendarController@putEvent')->name('calendar.putevent');
Route::get('/calendar/deleteevent/{id}','CalendarController@deleteEvent')->name('calendar.deleteevent');

