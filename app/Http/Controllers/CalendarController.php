<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * GETTERS
     */
    public function getCalendar()
    {
        return view('calendar.calendar');
    }
}
