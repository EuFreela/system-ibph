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
   
  }

  /**
   * PUTTERS
   */
  public function putEvent(Request $request)
  {
    
    $request->validate([
      'Titulo_Detalhe' => 'required',
      'Descricao_Detalhe' => 'required',
      'Data_Detalhe' => 'required',
      'Hora_Inicio_Detalhe' => 'required',
      'Hora_Fim_Detalhe' => 'required',
      'idEvent' => 'required',
    ]);

    $start_datetime = $request->Data_Detalhe.' '.$request->Hora_Inicio_Detalhe;
    $end_datetime = $request->Data_Detalhe.' '.$request->Hora_Fim_Detalhe;

    if (!$this->checkEditDateHour($start_datetime, $end_datetime, $request->idEvent)):

      $calendar = CalendarModel::where('id','=',$request->idEvent)->
      update([
        'title'=>$request->Titulo_Detalhe,
        'description'=>$request->Descricao_Detalhe,
        'start_datetime'=>$start_datetime,
        'end_datetime'=>$end_datetime,
        'start'=>$request->Data_Detalhe.'T'.$request->Hora_Inicio_Detalhe,
        'end'=>$request->Data_Detalhe.'T'.$request->Hora_Fim_Detalhe
      ]);
        

    if($calendar)
        return redirect()->back()->with('success','Evento criado com sucesso!');
    
    return redirect()->back()->with('error','Não foi possível criar o evento!');
      
    else:
      return redirect()->back()->with('error','Já existe evento criado para esta data!');
    endif;
  }


  /**
   * DELETERS
   */
  public function deleteEvent($id)
  {
    if( CalendarModel::where('id','=',$id)->delete() )
      return redirect()->back()->with('success','Evento deletado com sucesso');
    
    return redirect()->back()->with('error','Não oi possível excluir este evento!');
    
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
