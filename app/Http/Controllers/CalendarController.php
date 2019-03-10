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

    $calendar = CalendarModel::create([
      'client_id'=>$request->Cliente,
      'title'=>$request->Titulo,
      'description'=>$request->Descricao,
      'start_hour'=>$request->Hora_Inicio,
      'end_hour'=>$request->Hora_Fim,
      'start'=>$request->Data_Inicio,
      'end'=>$request->Data_Fim,
    ]);

    if($calendar)
      return redirect()->back()->with('success','Evento criado com sucesso!');

    return redirect()->back()->with('error','Não foi possível criar o evento!');

    // dd($request->all());
  }
}
