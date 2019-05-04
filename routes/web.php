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

/**CLIENT SHEDULE */
Route::get('/calendar/createschedule/{id}','ClientScheduleController@getCreateSchedule')->name('calendar.getcreateschedule');
Route::post('/calendar/createschedule/{id}','ClientScheduleController@postCreateSchedule')->name('calendar.postcreateschedule');
Route::get('/calendar/clientschedule/list','ClientScheduleController@getClientScheduleList')->name('calendar.getclientschedulelist');
Route::get('/calendar/clientschedule/delete/{client_id}/{schedule_id}','ClientScheduleController@deleteClientSchedule')->name('calendar.deleteclientschedule');

/**
 * DASHBOARD
 */

/** HOME */
Route::get('/dashboard', 'DashboardController@getHome')->name('dashboard.gethome');

/** BLOCKEVENT */
Route::get('/dashboard/blockevent/create', 'DashboardController@getBlockEventCreate')->name('dashboard.getblockeventcreate');
Route::post('/dashboard/blockevent/create', 'DashboardController@postBlockEventCreate')->name('dashboard.postblockeventcreate');
Route::get('/dashboard/blockevent/list', 'DashboardController@getBlockEventList')->name('dashboard.getblockeventlist');
Route::get('/dashboard/blockevent/edit/{id}', 'DashboardController@getBlockEventEdit')->name('dashboard.getblockeventedit');
Route::put('/dashboard/blockevent/edit/{id}', 'DashboardController@putBlockEventEdit')->name('dashboard.putblockeventedit');


/** EVENT */
Route::get('/dashboard/event/create', 'DashboardController@getEventCreate')->name('dashboard.geteventcreate');
Route::post('/dashboard/event/create', 'DashboardController@postEventCreate')->name('dashboard.posteventcreate');
Route::get('/dashboard/event/list', 'DashboardController@getEventList')->name('dashboard.geteventlist');
Route::get('/dashboard/event/edit/{id}', 'DashboardController@getEventEdit')->name('dashboard.geteventedit');
Route::put('/dashboard/event/edit/{id}', 'DashboardController@putEventEdit')->name('dashboard.puteventedit');
Route::get('/dashboard/event/delete/{id}', 'DashboardController@deleteEvent')->name('dashboard.deletevent');




