<?php

namespace App\Http\Controllers;

use App\Events\TaskAnswersHandleChange;
use App\Events\TrialLessonHandleInteractive;
use App\Events\TrialLessonTabsChange;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\TrialLesson;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class TrialLessonController extends Controller
{
    public function show(Request $request, TrialLesson $trial_lesson)
    {
        $participant = $trial_lesson->participants()->where('user_id', $request->user()->id)->first();
        $access_token = $participant->access_token ?? '';

        if($trial_lesson->application != null){
          $lesson = Lesson::where('id', 1)->first();  
        }else{
             $lesson = $trial_lesson->timetable->lesson;
        }
        
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
        // if($role_id == 2){

        //     $date = $trial_lesson->application->start_time;
        //     $mytime = \Carbon\Carbon::now()->toDateTimeString();
            
        //     if($mytime < $date){
        //        return redirect('/account/courses');
        //     }
        // }

        return inertia('Speedhack/TrialLesson', compact('room_name', 'trial_lesson', 'lesson', 'access_token', 'tabs'));
    }

    public function handleInteractive(Request $request, TrialLesson $trial_lesson): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'question_id' => 'required|integer',
            'element' => 'required',
        ]);
        broadcast(new TrialLessonHandleInteractive($trial_lesson->room_name, $request->question_id, $request->element))->toOthers();
        return response()->json([], 204);
    }

    public function taskCorrectOptionsHandleChange(Request $request, TrialLesson $trial_lesson): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'task_id' => 'required|integer',
            'element' => 'required',
        ]);
        broadcast(new TaskAnswersHandleChange($trial_lesson->room_name, $request->task_id, $request->element))->toOthers();
        return response()->json([], 204);
    }


    public function handleChangeTabs(Request $request, TrialLesson $trial_lesson): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'key' => 'required|integer',
        ]);
        broadcast(new TrialLessonTabsChange($trial_lesson->room_name, $request->key))->toOthers();
        return response()->json([], 204);
    }
}
