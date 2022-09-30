<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;
use Pusher\PusherException;

class PusherController extends Controller
{
    public function auth(Request $request)
    {
        $user = auth()->user();
        $socket_id = $request->socket_id;
        $channel_name =$request->channel_name;
        $key = config('broadcasting.connections.pusher.key');
        $secret = config('broadcasting.connections.pusher.secret');
        $app_id = config('broadcasting.connections.pusher.app_id');

        if ($user) {

            try {
                $pusher = new Pusher($key, $secret, $app_id);
            } catch (PusherException $e) {
                info($e);
            }
            $auth = $pusher->socket_Auth($channel_name, $socket_id);
            return response($auth, 200);

        } else {
            header('', true, 403);
            echo "Forbidden";
            return;
        }
    }
}
