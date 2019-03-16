<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarModel;

class CalendarController extends Controller
{
  /**
  * GETTERS
  */
  public function getCalendar()
  {
    return view('calendar.calendar');
  }

  /**
  * POSTERS
  */
  public function postEvent(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'Titulo' => 'required',
      'Descricao' => 'required',
      'Hora_Inicio' => 'required',
      'Hora_Fim' => 'required',
    ]);

      
      $start_datetime = explode("T",$request->Data_Inicio);
      $start_datetime = $start_datetime[0] . ' ' . $start_datetime[1];

      $end_datetime = explode("T",$request->Data_Fim);
      $end_datetime = $end_datetime[0] . ' ' . $end_datetime[1];

      if (!$this->checkDateHour($start_datetime, $end_datetime)):

        $calendar = CalendarModel::create([
          'client_id'=>$request->Cliente,
          'title'=>$request->Titulo,
          'description'=>$request->Descricao,
          'start_datetime'=>$start_datetime,
          'end_datetime'=>$end_datetime,
          'start'=>$request->Data_Inicio,
          'end'=>$request->Data_Fim
        ]);
        

        if($calendar)
          return redirect()->back()->with('success','Evento criado com sucesso!');
        return redirect()->back()->with('error','Não foi possível criar o evento!');
      else:
        return redirect()->back()->with('error','Já existe evento criado para esta data!');
      endif;
    // dd($request->all());
  }

  /**
   * Funções internas
   */
  private function checkDateHour($startDate, $endDate){
    return (CalendarModel::whereRaw('start_datetime<=? and end_datetime>=?',[$startDate,$endDate])->count());
  }
}
