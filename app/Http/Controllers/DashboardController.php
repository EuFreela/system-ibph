<?php

namespace App\Http\Controllers;

use App\Models\CalendarModel;
use Illuminate\Http\Request;
use DB;
use function MongoDB\BSON\toJSON;

class DashboardController extends Controller
{
    /**
     * GETTERS
     */
    /** home */
    public function getHome(){
        if (session()->has('user')) {
            return view('dashboard.home');
        }
    }

    /** blockevent */
    public function getBlockEventCreate(){
        return view('dashboard.blockevent.create');
    }

    public function getBlockEventList(){
        return view('dashboard.blockevent.list')
            ->with([
                'events' => DB::table('calendarblock')->get()
            ]);
    }

    public function getBlockEventEdit($id){
        return view('dashboard.blockevent.edit')
            ->with([
                'event' => DB::table('calendarblock')->where('id','=',$id)->first()
            ]);
    }

    /** event */
    public function getEventCreate(){
        return view('dashboard.event.create');
    }

    public function getEventList(){
        $events = DB::table('calendar')->get();
        return view('dashboard.event.list')->with([
            'events' => $events
        ]);
    }

    public function getEventEdit($id){
        $event = DB::table('calendar')->where('id',$id)->first();
        $schedule = DB::table('schedule')->where('calendar_id',$id)->get();
        return view('dashboard.event.edit')->with([
            'event' => $event,
            'schedule' => $schedule
        ]);
    }

    /**
     * POSTERS
     */
    public function postBlockEventCreate(Request $request){

        $request->validate([
            'Titulo' => 'required',
            'Descricao' => 'required',
            'Data_Inicio' => 'required',
            'Data_Fim' => 'required',
        ]);

        $calendarblock = DB::table('calendarblock')->insert(
            [
                'title' => $request->Titulo,
                'description' => $request->Descricao,
                'start' => $request->Data_Inicio,
                'end' => $request->Data_Fim,
                'client_id' => $request->Cliente
            ]
        );

        if($calendarblock)
            return redirect()->route('dashboard.getblockeventlist')->with('success','Bloqueio criado com sucesso!');

        return redirect()->back()->with('error','Não foi possível criar o bloqueio!');

    }

    public function postEventCreate(Request $request)
    {


        $request->validate([
            'Titulo' => 'required',
            'Descricao' => 'required',
            'Hora_Inicio' => 'required',
            'Hora_Fim' => 'required',
        ]);

        $start_datetime = $request->Data_Inicio . ' ' . $request->Hora_Inicio;
        $end_datetime = $request->Data_Fim . ' ' . $request->Hora_Fim;
        $start = $request->Data_Inicio . 'T' . $request->Hora_Inicio;
        $end = $request->Data_Fim . 'T' . $request->Hora_Fim;

        $client_id = DB::table('Inscricao')->where('codigoAvaliacao', '=' , session()->get('user.codaval'))->first()->id;

        if (!$this->checkDateHour($start_datetime, $end_datetime)):

            $calendar = CalendarModel::create([
                'client_id'=>$client_id,
                'title'=>$request->Titulo,
                'description'=>$request->Descricao,
                'start_datetime'=>$start_datetime,
                'end_datetime'=>$end_datetime,
                'start'=>$start,
                'end'=>$end
            ]);
            if($calendar):
                if ($request->hours && $request->vacancy):

                    for($i=0;$i<sizeof($request->hours);$i++):
                        $date = $request->Data_Inicio . ' ' . $request->hours[$i];
                      DB::table('schedule')->insert([
                          ['datetime' => $date, 'vacancy' => $request->vacancy[$i], 'calendar_id' => $calendar->id]
                      ]);
                    endfor;
                endif;
                return redirect()->route('dashboard.geteventlist')->with('success','Evento criado com sucesso!');
            endif;

            return redirect()->back()->with('error','Não foi possível criar o evento!');

        else:
            return redirect()->back()->with('error','Já existe evento criado para esta data!');
        endif;

    }


    /**
     * PUTTERS
     */
    public function putEventEdit(Request $request, $id)
    {

        $request->validate([
            'Titulo' => 'required',
            'Descricao' => 'required',
            'Data_Inicio' => 'required',
            'Data_Fim' => 'required',
            'Hora_Inicio' => 'required',
            'Hora_Fim' => 'required',
        ]);

        $start_datetime = $request->Data_Inicio . ' ' . $request->Hora_Inicio;
        $end_datetime = $request->Data_Fim . ' ' . $request->Hora_Fim;
        $start = $request->Data_Inicio . 'T' . $request->Hora_Inicio;
        $end = $request->Data_Fim . 'T' . $request->Hora_Fim;

        if (!$this->checkEditDateHour($start_datetime, $end_datetime, $request->idEvent)):

            $calendar = CalendarModel::where('id','=',$id)->
            update([
                'title'=>$request->Titulo,
                'description'=>$request->Descricao,
                'start_datetime'=>$start_datetime,
                'end_datetime'=>$end_datetime,
                'start'=>$start,
                'end'=>$end
            ]);

            if($calendar)
                if ($request->hours && $request->vacancy):
                   // dd($request->all());

                    if( $request->ids )
                        DB::table('schedule')->where('calendar_id','=',$id)->whereNotIn('id',$request->ids)->delete();

                    for($i=0;$i<sizeof($request->hours);$i++):
                        $date = $request->Data_Inicio . ' ' . $request->hours[$i];
                        DB::table('schedule')->updateOrInsert(
                            ['calendar_id' => $id, 'id' => isset($request->ids[$i]) ? $request->ids[$i] : 0],
                            ['datetime' => $date, 'vacancy' => $request->vacancy[$i], 'calendar_id' => $id]
                        );
                    endfor;
                    else:
                        DB::table('schedule')->where('calendar_id',$id)->delete();
                endif;
                return redirect()->route('dashboard.geteventlist')
                    ->with('success','Evento editado com sucesso!');

            return redirect()->back()->with('error','Não foi possível criar o evento!');

        else:
            return redirect()->back()->with('error','Já existe evento criado para esta data!');
        endif;
    }

    public function putBlockEventEdit(Request $request, $id)
    {
        $request->validate([
            'Titulo' => 'required',
            'Descricao' => 'required',
            'Data_Inicio' => 'required',
            'Data_Fim' => 'required',
        ]);

        $calendarblock = DB::table('calendarblock')->where('id','=',$id)
            ->update(
            [
                'title' => $request->Titulo,
                'description' => $request->Descricao,
                'start' => $request->Data_Inicio,
                'end' => $request->Data_Fim,
                'client_id' => $request->Cliente
            ]
        );

        if($calendarblock)
            return redirect()->route('dashboard.getblockeventlist')
                ->with('success','Bloqueio criado com sucesso!');

        return redirect()->back()->with('error','Não foi possível criar o bloqueio!');

    }


    /**
     * DELETE
     */
    public function deleteEvent($id)
    {
        $event = DB::table('calendar')->where('id','=',$id)->delete();
        if($event)
            return redirect()->route('dashboard.geteventlist')->with('success','Evento deletado com sucesso!');

        return redirect()->back()->with('error','Não foi possível deletar o evento!');
    }



    /**
     * Funções internas
     */
      private function checkDateHour($startDate, $endDate){
          return (CalendarModel::whereRaw('start_datetime<=? and end_datetime>=?',[$startDate,$endDate])->count());
      }

      private function checkEditDateHour($startDate, $endDate, $id){
          return (CalendarModel::whereRaw('id<>? and start_datetime<=? and end_datetime>=?',[$id,$startDate,$endDate])->count());
      }

}
