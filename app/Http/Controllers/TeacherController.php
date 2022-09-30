<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\{StudentUpdateRequest, StudentPasswordUpdateRequest };
use App\Models\{User, Course};
use Auth;

class TeacherController extends Controller
{

     public function homework()
    {
      return inertia('Speedhack/Account/Teacher/Homework');
    }

     public function profile()
    {
       $user = User::find(Auth::id());
      return inertia('Speedhack/Account/Teacher/Profile', compact('user'));
    }

    public function courses(Request $request){
    	$courses = Course::withCount('lessons')->get();
        $courses->map(function ($item) {
            $item->sections = $item->sections->load('lessons')->all();
        });

        return inertia('Speedhack/Account/Teacher/Courses', compact('courses'));
    }

     public function course_show(Course $course)
    {
        $course->load('sections', 'sections.lessons');

        return inertia('Speedhack/Account/Student/Courses/Course', compact('course'));
    }
}
