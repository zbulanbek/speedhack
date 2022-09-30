<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\HomeWork;
use Illuminate\Http\Request;

class HomeWorkController extends Controller
{
    public function index(Request $request)
    {
        $courses = $request->user()->courses()->whereHas('courseSections.homeWorks')->get();
        return inertia('Speedhack/Account/HomeWorks/HomeWorks', compact('courses'));
    }

    public function show(Request $request, HomeWork $homeWork)
    {
        $tasks = $homeWork->tasks()->with('questions', 'questions.correct_options', 'questions.variants', 'correctOptions', 'correctUserQuestionAnswers')->get();
        return inertia('Speedhack/Account/HomeWorks/HomeWork', compact('homeWork', 'tasks'));
    }

    public function tasks(HomeWork $homeWork)
    {
        $tasks = $homeWork->tasks()->with('questions', 'questions.correct_options', 'questions.variants', 'correctOptions', 'correctUserQuestionAnswers')->get();
        return response()->json(compact('tasks'));
    }

    public function groupByCourse(Request $request, Course $course)
    {
        $home_works = [];
        foreach ($course->courseSections as $lesson) {
            foreach ($lesson->homeWorks as $homeWork) {
                $home_works[] = $homeWork;
            }
        }

        return response()->json(compact('home_works'));
    }
}
