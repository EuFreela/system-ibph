<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientSheduleModel;
use DB;

class ClientScheduleController extends Controller
{
    /**
     * GETTERS
     */
    public function getCreateSchedule($id)
    {
        $schedule = DB::table('schedule')->where('calendar_id', '=',$id)->get()->last()->datetime;
        $ready = false;
        if(strtotime(date("Y-m-d"))<strtotime($schedule))
            $ready = true;
        return view('calendar.createschedule')->with(
            [
                'ready' => $ready,
                'schedule' => DB::table('schedule')->where('calendar_id', '=',$id)->get(),
                'event' => DB::table('calendar')->where('id','=',$id)->first(),
                'client' => DB::table('Inscricao')->where('codigoAvaliacao', '=', session()->get('user.codaval'))->first()
            ]);
    }

    public function getClientScheduleList()
    {

        $client = DB::table('Inscricao')->where('codigoAvaliacao','=',session()->get('user.codaval'))
        ->join('clientschedule','Inscricao.id','=','clientschedule.client_id')
        ->join('schedule','clientschedule.schedule_id','=','schedule.id')
        ->join('calendar','calendar.id','=','schedule.calendar_id')
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
        ->get();

        return view('calendar.clientschedulelist')->with(['client'=>$client]);
    }

    /**
     * POSTTERS
     */
    public function postCreateSchedule(Request $request, $id)
    {
        $request->validate([
            'Nome' => 'required',
            'Comentario' => 'required',
            'Horario' => 'required'
        ]);
        
        $vacancy = DB::table('schedule')->where('id','=',$request->Horario)->first()->vacancy;
        $client = DB::table('clientschedule')->where('client_id','=',$id)->where('schedule_id','=',$request->Horario)->count();
        if($vacancy > 0 and !$client)
        {
            $clientshedule = ClientSheduleModel::create([
                'client_id' => $id,
                'comment' => $request->Comentario,
                'schedule_id' => $request->Horario
            ]);

            if($clientshedule)
            {
                DB::table('schedule')->where('id','=',$request->Horario)->update([
                    'vacancy' => ($vacancy - 1)
                ]);
                return redirect()->route('calendar.calendar')->with('success','Você foi cadastrado neste evento com sucesso!');
            }
            return redirect()->back()->with('error','Não foi cadastrar neste evento! Entre em contato com os responsáveis.');

        }
        return redirect()->back()->with('error','Não há vagas disponíveis ou você já se cadastrou nesse evento!');
       
        
    }


    /**
     * DELETTERS
     */
    public function deleteClientSchedule($client_id,$schedule_id)
    {
        $clientHour = DB::table('clientschedule')->where('client_id','=',$client_id)->delete();
        $addVacancy = DB::table('schedule')->where('id','=',$schedule_id)->update([
            'vacancy' => (isset(DB::table('schedule')->where('id','=',$schedule_id)->first()->vacancy) ? DB::table('schedule')->where('id','=',$schedule_id)->first()->vacancy+1 : 1)
        ]);
        if( $clientHour and $addVacancy )
            return redirect()->route('calendar.calendar')->with('success','Desistencia realizada com sucesso!');
        
        return redirect()->back()->with('error','Não foi possível realizar a desistencia! Entre em contato com os responsáveis.');

    }
}
