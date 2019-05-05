<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class APIController extends Controller
{

    /*****************************************************************************************************
     * WHEELs
     */

    /**
     * GETTERS
     */
    public function getWheel_1( $id )
    {
        $wheel_satisfaction_with_life = DB::table('AreaVida')->where('id_avaliado','=',$id)->orderBy('id','desc')->first();
        return response()->json( $wheel_satisfaction_with_life );
    }

    public function getWheel_2( $id )
    {
        $wheel_satisfaction_4_human_intelligences = DB::table('QuatroInteligencias')->where('id_avaliado','=',$id)->orderBy('id','desc')->first();
        return response()->json( $wheel_satisfaction_4_human_intelligences );

    }

    public function getWheel_3( $id )
    {
        $wheel_development_copetences_high_performance = DB::table('Competencias')->where('id_avaliado','=',$id)->orderBy('id','desc')->first();
        return response()->json( $wheel_development_copetences_high_performance );

    }


    /*****************************************************************************************************
     * CALENDAR
     */

     /**
      * GETTERS
      */
    public function getCalendarEvent()
    {
        return response()->json( DB::table('calendar')->get());
    }

    public function getCalendarEventBlock()
    {
        return response()->json( DB::table('calendarblock')->get());
    }

    public function getCalendarEventID( $id )
    {
        return response()->json( DB::table('calendar')->where('id','=',$id)->first() );
    }

    public function getCalendarEventHoursID( $id )
    {
        return response()->json( DB::table('schedule')->where('calendar_id','=',$id)->get() );
    }

    public function getCalendarClientScheduleID( $id )
    {
        return response()->json(
            DB::table('clientschedule')->where('clientschedule.id','=',$id)
            ->join('schedule','clientschedule.schedule_id','=','schedule.id')
            ->join('calendar','calendar.id','=','schedule.calendar_id')
            ->join('Inscricao', 'Inscricao.id', '=', 'clientschedule.client_id')
            ->select(
                'Inscricao.id as inscricao_id',
                'Inscricao.*',
                'clientschedule.id as clienteschedule_id',
                'clientschedule.*',
                'schedule.id as schedule_id',
                'schedule.*',
                'calendar.id as calendar_id',
                'calendar.*'
            )
            ->first() 
        );
    }

}
