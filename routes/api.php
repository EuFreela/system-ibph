<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

/**
 * WHEELs
 */
Route::middleware('api')->get('/wheel_satisfaction_with_life/{id}','APIController@getWheel_1')->name('api.wheel_satisfaction_with_life');
Route::middleware('api')->get('/wheel_satisfaction_4_human_intelligences/{id}','APIController@getWheel_2')->name('api.wheel_satisfaction_4_human_intelligences');
Route::middleware('api')->get('/wheel_development_copetences_high_performance/{id}','APIController@getWheel_3')->name('api.wheel_development_copetences_high_performance');

/**
 * CALENDAR
 */
Route::middleware('api')->get('/calendar/event','APIController@getCalendarEvent')->name('api.calendar_event');
Route::middleware('api')->get('/calendar/eventblock','APIController@getCalendarEventBlock')->name('api.calendar_eventblock');
