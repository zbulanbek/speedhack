<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\TrialLesson;
use App\Services\TwilioVideo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TrialLessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $application = Application::create([
            'name' => 'User',
            'phone' => '7777777777',
            'email' => 'user@gmail.com',
            'status_id' => 3,
            'start_time' => date('Y-m-d')." 23:00:00"
        ]);
        $trialLesson = $application->trialLessons()->create([
            'room_name' => Str::uuid(),
            'student_id' => 1,
            'metodist_id' => 3,
        ]);
        if ($trialLesson) {
            $participants = [
                [
                    'user_id' => 3,
                    'access_token' => TwilioVideo::generateRoomAccessToken($trialLesson->room_name, 3),
                    'owner' => true,
                ],
                [
                    'user_id' => 1,
                    'access_token' => TwilioVideo::generateRoomAccessToken($trialLesson->room_name, 1),
                ],
            ];

            $trialLesson->participants()->createMany($participants);
        }
    }
}
