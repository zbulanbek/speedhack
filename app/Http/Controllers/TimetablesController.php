<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Course, User, Timetable, CourseSection};
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Services\TwilioVideo;

class TimetablesController extends Controller
{
    public function show(Request $request)
    {
    	$user = $request->user();

    	if ($user->role_id == 2) {
            $current_time = \Carbon\Carbon::now()->addHour(-1)->toDateTimeString();
            $timetables = $user->student_timetables()->where('date', '>', $current_time)->get();
			
            $timetables->map(function ($item, $key){
                $item->key = 'today';
                $item->highlight = 'yellow';
                $item->dates = $item->date;

                $room_name = null;
                if($item->trialLessons->first()){
                    $room_name = $item->trialLessons->first()->room_name;
                }
               

                $title =$item->lesson->title;
                $course_title = null;
                $course_section_title = null;

                if($item->lesson->courseSection){
                    $lessonIndex = $item->lesson->courseSection->lessons->search(function($lesson) use ($item){
                        return $lesson->id === $item->lesson->id;
                    });
                    $title = $lessonIndex + 1; 
                    $title = 'Урок ' . $title;
                    $course_title = $item->lesson->courseSection->course->title;
                    $course_section_title = $item->lesson->courseSection->title;
                }
               
               
                $item->customData = [
                    'title' => $title,
                    'course_title' => $course_title,
                    'course_section_title' => $course_section_title,
                    'start_time' => \Carbon\Carbon::createFromFormat('H:i:s',$item->start_time)->format('H:i'),
                    // 'finish_time' => \Carbon\Carbon::createFromFormat('H:i:s',$item->finish_time)->format('H:i'),
                    'teacher' => $item->teacher->name.' '.$item->teacher->surname,
                    'email' => $item->teacher->email,
                    'date' => $item->date,
                    'id' => $item->id,
                    'room_name' => $room_name,
                ];

            });



    		return inertia('Speedhack/Account/Student/Calendar', compact('timetables'));

    	} else if ($user->role_id == 3) {
            $current_time = \Carbon\Carbon::now()->addHour(-1)->toDateTimeString();
            $timetables = $user->teacher_timetables()->where('date', '>', $current_time)->get();
            $timetables->map(function ($item, $key){
                $item->key = 'today';
                $item->highlight = 'yellow';
                $item->dates = $item->date;

                $room_name = null;
                if($item->trialLessons->first()){
                    $room_name = $item->trialLessons->first()->room_name;
                }
               
                $lessonIndex = $item->lesson->courseSection->lessons->search(function($lesson) use ($item){
                    return $lesson->id === $item->lesson->id;
                });
                $title = $lessonIndex + 1;
                
                $item->customData = [
                    'title' => 'Урок ' . $title,
                    'course_title' => $item->lesson->courseSection->course->title,
                    'course_section_title' => $item->lesson->courseSection->title,
                    'start_time' => \Carbon\Carbon::createFromFormat('H:i:s',$item->start_time)->format('H:i'),
                    // 'finish_time' => \Carbon\Carbon::createFromFormat('H:i:s',$item->finish_time)->format('H:i'),
                    'student' => $item->student->name.' '.$item->student->surname,
                    'date' => $item->date,
                    'email' => $item->student->email,
                    'id' => $item->id,
                    'room_name' => $room_name,
                ];

            });
     
            $courses = Course::with(['sections' , 'sections.lessons'])->get();
            $students = User::where('role_id', 2)->get();
            $teachers = User::where('role_id', 3)->get();
        

            return inertia('Speedhack/Account/Teacher/Calendar', compact('timetables', 'courses', 'students', 'teachers'));
    	}else if ($user->role_id == 1) {
            $current_time = \Carbon\Carbon::now()->addHour(-1)->toDateTimeString();
            $timetables = Timetable::where('date', '>', $current_time)->get();
          
            $timetables->map(function ($item, $key){
                $item->key = 'today';
                $item->highlight = 'yellow';
                $item->dates = $item->date;

                $title =$item->lesson->title;
                $course_title = null;
                $course_section_title = null;

                if($item->lesson->courseSection){
                    $lessonIndex = $item->lesson->courseSection->lessons->search(function($lesson) use ($item){
                        return $lesson->id === $item->lesson->id;
                    });
                    $title = $lessonIndex + 1; 
                    $title = 'Урок ' . $title;
                    $course_title = $item->lesson->courseSection->course->title;
                    $course_section_title = $item->lesson->courseSection->title;
                }


                $item->customData = [
                    'title' => $title,
                    'course_title' => $course_title,
                    'course_section_title' => $course_section_title,
                    'start_time' => \Carbon\Carbon::createFromFormat('H:i:s',$item->start_time)->format('H:i'),
                    // 'finish_time' => \Carbon\Carbon::createFromFormat('H:i:s',$item->finish_time)->format('H:i'),
                    'student' => $item->student->name.' '.$item->student->surname,
                    'teacher' => $item->teacher->name.' '.$item->teacher->surname,
                    'date' => $item->date,
                    'email' => $item->student->email,
                    'id' => $item->id,
                    
                ];

            });
     
            $courses = Course::with(['sections' , 'sections.lessons'])->get();
            $students = User::where('role_id', 2)->get();
            $teachers = User::where('role_id', 3)->get();
            return inertia('Speedhack/Account/Teacher/Calendar', compact('timetables', 'courses', 'students', 'teachers'));
        }


    }

    public function create(Request $request){
       
        $time = Carbon::parse($request->date)->format('H:i:s');
        $timetable = Timetable::create([
            'lesson_id' => $request->lesson_id,
            'student_id' => $request->student_id,
            'teacher_id' => $request->teacher_id,
            'date' => $request->date,
            'start_time' => $time
        ]);

        $trialLesson = $timetable->trialLessons()->create([
            'room_name' => Str::uuid(),
            'student_id' => $timetable->student->id,
            'metodist_id' => $request->user()->id,
        ]);
       
        if ($trialLesson) {
            $participants = [
                [
                    'user_id' => $request->teacher_id,
                    'access_token' => TwilioVideo::generateRoomAccessToken($trialLesson->room_name, $request->user()->id),
                    'owner' => true,
                ],
                [
                    'user_id' => $timetable->student->id,
                    'access_token' => TwilioVideo::generateRoomAccessToken($trialLesson->room_name, $timetable->student->id),
                ],
            ];

            $trialLesson->participants()->createMany($participants);
            
        }

        return $this->successMessage();
    }

    public function show_lesson(Request $request, Timetable $timetable){
        $trial_lesson = $timetable->trialLessons()->first();
     
        $participant = $trial_lesson->participants()->where('user_id', $request->user()->id)->first();
        $access_token = $participant->access_token ?? '';
        $lesson =  $timetable->lesson->load('courseSection');

        $courses = Course::where('course_category_id', 1)->with('classes')->get();

        $tabs = [
            [
                'title' => 'Hello!',
                'type' => 'lesson',
            ],
            ...$courses
        ];

        $trial_lesson->load(['metodist', 'student']);
        $room_name = $trial_lesson->room_name;

        $role_id = User::find(Auth::id())->role->id;
        if($role_id == 2){
            $date = $trial_lesson->timetable->date;
            $mytime = \Carbon\Carbon::now()->toDateTimeString();
            
            if($mytime < $date){
               return redirect('/account/courses');
            }
        }

        return inertia('Speedhack/TrialLesson', compact('room_name', 'trial_lesson', 'lesson', 'access_token', 'tabs'));
        return inertia('Speedhack/TimetableLesson', compact('room_name', 'trial_lesson', 'lesson', 'access_token', 'tabs'));
    }
}
