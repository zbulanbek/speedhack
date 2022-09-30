<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\{Lesson, TrialLesson};
use Illuminate\Http\Request;
use Auth;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = $request->user()->courses()->withCount('lessons')->get();
        $courses->map(function ($item) {
            $item->sections = $item->sections->load('lessons')->all();
        });

        
        $trialLessons = TrialLesson::where('student_id', Auth::id())
            ->with(['student', 'metodist', 'application'])
            ->orderBy('id', 'desc')
            ->first();
        
        if($trialLessons->application){
            $date = \Carbon\Carbon::parse($trialLessons->application->start_time)->addHour();
            $mytime = \Carbon\Carbon::now()->toDateTimeString();

            if($mytime > $date){
                $trialLessons = null;
            } 
        }else{
            $trialLessons = null;
        }   
       
        
        return inertia('Speedhack/Account/Student/Courses/Courses', compact('courses', 'trialLessons'));
    }

    public function show(Course $course)
    {
        $course->load('sections', 'sections.lessons');

        $course->sections->map(function ($item) {
            $item->lessons->map(function ($lesson) {
                $is_show = false;

                $timetable = $lesson->timetables->where('student_id', Auth::id())->first();
                
                if($timetable){
                    $lesson->timetable_id = $timetable->id;
                    $date = \Carbon\Carbon::parse($timetable->date)->addHour();
                    $mytime = \Carbon\Carbon::now()->toDateTimeString();
                    
                    if($mytime < $date){
                        $is_show = true;
                    } 
                }
                $lesson->show = $is_show;
                
            });
        });

        return inertia('Speedhack/Account/Student/Courses/Course', compact('course'));
    }

    public function lesson(Lesson $lesson)
    {
        $lesson->load('courseSection', 'timeLines', 'timeLines.blocks');
        return inertia('Speedhack/Account/Student/Courses/Lessons/Lesson', compact('lesson'));
    }
}
