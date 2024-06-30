<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function create($event_id)
    {
        $event = Event::findOrFail($event_id);

        $start_date = new \DateTime($event->start_date);
        $end_date = new \DateTime($event->end_date);
        $dates = [];
        for ($date = clone $start_date; $date <= $end_date; $date->modify('+1 day')) {
            $dates[] = $date->format('Y-m-d');
        }

        $schedules = Schedule::where('event_id', $event_id)->get()->groupBy('date');
        $attendanceCounts = [];
        foreach ($dates as $date) {
            if (isset($schedules[$date])) {
                $attendanceCounts[$date] = $schedules[$date]->count();
            } else {
                $attendanceCounts[$date] = 0;
            }
        }



        $maxDate = array_keys($attendanceCounts, max($attendanceCounts))[0];


        return view('schedules.create', compact('event', 'dates', 'schedules', 'attendanceCounts', 'maxDate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|integer',
            'user_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'states' => 'required|array',
            'states.*' => 'required|in:o,x',
        ]);

        foreach ($request->states as $date => $state) {
            Schedule::create([
                'event_id' => $request->event_id,
                'state' => $state,
                'user_name' => $request->user_name,
                'email' => $request->email,
                'date' => $date,
            ]);
        }

        return redirect()->route('schedules.create', $request->event_id);
    }
}
