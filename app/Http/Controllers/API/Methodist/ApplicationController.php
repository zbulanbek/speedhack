<?php

namespace App\Http\Controllers\API\Methodist;

use App\Events\MetodistApplication;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Services\TwilioVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SendEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::where('status_id', 3)
            ->where('methodist_status_id', null)
            ->whereDate('start_time', '>=', date('Y-m-d'))
            ->orWhere(function($query) {
                $query->where('start_time', null);
            })
            ->orWhere(function($query) {
                $query->where('status_id', 1);
            })
            ->latest()
            ->get();
        return response()->json(compact('applications'));
    }

    public function accept(Request $request, Application $application)
    {
        if (!empty($application->methodist_id) && $application->methodist_id !== $request->user()->id) {
            return response()->json([
                'message' => 'Это заявка уже обработан!'
            ], 403);
        }

        if (empty($application->methodist_id)) {
            $application->update([
                'methodist_id' => $request->user()->id
            ]);
        }
//        broadcast(new MetodistApplication($application))->toOthers();

        return response()->json(null, 204);

    }

    public function updateDate(Request $request, Application $application){

       
        if($request->date){
            $date = date("Y-m-d H:i:s", strtotime($request->date));   
        }else{
            $date = date('Y-m-d H:i:s');
        }
        
        $application->update(['start_time' => $date]);

        return response()->json([
            'status' => 'success',
            'date' => $date ,
        ]);
    }

    public function updateStatus(Request $request, Application $application)
    {


        $application->update([
            'methodist_status_id' => $request->methodist_status_id,
            'status_id' => 3
        ]);

        if($application->start_time == null){
            $application->update([
            'start_time' => date('Y-m-d H:i:s'),
            ]);
        }
      
        $user = User::where('email', $application->email)->first();
        if($user){
            $password = SendEmail::generatePassword(8);
            $user->update([
                'password' => bcrypt($password)
            ]);
            //SendEmail::sendLoginPassword($application->email, $application->email, $password);
        }else{
           $password = SendEmail::generatePassword(8);

            $user = User::create([
                'email' => $application->email,
                'phone' => $application->phone,
                'name' => $application->name,
                'password' => bcrypt($password),
                'role_id' => 2
            ]);

            $user->courses()->sync([1,2]);
            //SendEmail::sendLoginPassword($application->email, $application->email, $password); 
        }
        
        

        if ($request->methodist_status_id == 1) {
            
            $trialLesson = $application->trialLessons()->create([
                'room_name' => Str::uuid(),
                'student_id' => $application->student->id,
                'metodist_id' => $request->user()->id,
            ]);
           
            if ($trialLesson) {
                $participants = [
                    [
                        'user_id' => $request->user()->id,
                        'access_token' => TwilioVideo::generateRoomAccessToken($trialLesson->room_name, $request->user()->id),
                        'owner' => true,
                    ],
                    [
                        'user_id' => $application->student->id,
                        'access_token' => TwilioVideo::generateRoomAccessToken($trialLesson->room_name, $application->student->id),
                    ],
                ];

                $trialLesson->participants()->createMany($participants);
                $api = route('trial-lessons.show', $trialLesson->room_name);
                $api = route('account.profile');
                //SendEmail::sendApiFirstLesson($application->student->email, $api);

                SendEmail::sendApiAndLogin($application->student->email, $api, $application->email, $password);
            }
        }

        return response()->json(null, 204);
    }
}
