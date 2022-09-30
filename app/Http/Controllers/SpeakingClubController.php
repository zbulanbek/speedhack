<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{SpeakingClub};

class SpeakingClubController extends Controller
{
    public function show()
    {
    	for ($number = 0; $number < 30; ++$number) {
          	$calendars[]['full'] = date("Y-m-d", strtotime("+$number day"));
        }
        $new_date = \Carbon\Carbon::today();

       	$first_events = SpeakingClub::whereDate('date', '=', $new_date)->get();
       	$counter = $first_events->count();
       	$first_events->map(function ($item, $key){
       		$item->teacher_name = $item->teacher->name.' '.$item->teacher->surname;
       		$item->time = \Carbon\Carbon::createFromFormat('H:i:s',$item->time)->format('H:i');
       	});
       	return inertia('Speedhack/Account/Student/Events', compact('calendars', 'first_events', 'counter'));
    }

    public function get(Request $request)
    {
    	$events = SpeakingClub::whereDate('date', '=', $request->date)->get();
    	$counter = $events->count();
    	$events->map(function ($item, $key){
       		$item->teacher_name = $item->teacher->name.' '.$item->teacher->surname;
       		$item->time = \Carbon\Carbon::createFromFormat('H:i:s',$item->time)->format('H:i');
       	});
    	return response()->json([
            'events' => $events,
            'counter' => $counter
        ]);
    }
}
