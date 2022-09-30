<?php

namespace App\Http\Controllers;

use App\Http\Requests\Webinar\WebinarStore;
use App\Models\Course;
use App\Models\Webinar;
use App\Services\TwilioVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webinars = Webinar::with('owner', 'course')->get();
        $courses = Course::all();
        return inertia('Speedhack/Webinars/Webinars', compact('webinars', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebinarStore $request)
    {
        $webinar = Webinar::create($request->validated());

        $webinar->participants()->create([
            'user_id' => $request->user()->id,
            'access_token' => TwilioVideo::generateRoomAccessToken($webinar->room_name, $request->user()->id),
            'owner' => true,
        ]);

        return redirect()->route('webinars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function show(Webinar $webinar)
    {
        $webinar->load('owner', 'course', 'participants');
        $participant = $webinar->participants()->where('user_id', auth()->user()->id)->first();
        $access_token = $participant->access_token ?? '';
        $room_name = $webinar->room_name ?? '';
        return inertia('Speedhack/Webinars/Webinar', compact('webinar', 'room_name', 'access_token'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function edit(Webinar $webinar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Webinar $webinar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Webinar $webinar)
    {
        //
    }
}
