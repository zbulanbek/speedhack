<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\TwilioVideo;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class TwilioAccessTokenController extends Controller
{
    public function generate_token(Request $request)
    {
        $token = TwilioVideo::generateRoomAccessToken($request->room_name, $request->user()->id);
        return response()->json(compact('token'));
    }

    public function createRoom(Request $request)
    {
        $accountSid = config('services.twilio_video.account_sid');
        $accountToken = config('services.twilio_video.account_token');

        $client = new Client($accountSid, $accountToken);

        $exists = $client->video->rooms->read([ 'uniqueName' => $request->room_name]);

        if (empty($exists)) {
            $client->video->rooms->create([
                'uniqueName' => $request->room_name,
                'type' => 'group',
                'recordParticipantsOnConnect' => false
            ]);
        }

        return response()->json(null, 204);
    }
}
