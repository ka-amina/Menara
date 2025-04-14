<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $interviews = Interview::all();
        $events = [];
        // dd($interviews);

        foreach ($interviews as $interview) {
            $date = Carbon::parse($interview->scheduled_at)->toDateString();
            $start_time = Carbon::createFromFormat('H:i', $interview->start_time)->setDateFrom($date)->toISOString();
            $end_time = Carbon::createFromFormat('H:i', $interview->end_time)->setDateFrom($date)->toISOString();
    
            $events[] = [
                'title' => $interview->interviewer->name,
                'start' => $start_time,
                'end' => $end_time
            ];
        }
        // return $events;
        return view('calendar.index', compact('events'));
    }
}

// scheduled_at
// start_time
// end_time