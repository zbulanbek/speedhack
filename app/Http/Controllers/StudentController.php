<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Course, Lesson, User, News, Timetables, TrialLesson};
use App\Http\Requests\{StudentUpdateRequest, StudentPasswordUpdateRequest};
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    public function course_active(){
        $trialLessons = TrialLesson::where('student_id', Auth::id())
            ->with(['application'])
            ->orderBy('id', 'desc')
            ->first();
        
        //$date = \Carbon\Carbon::parse($trialLessons->application->start_time)->addHour();
        $date = $trialLessons->application->start_time;
        $mytime = \Carbon\Carbon::now()->toDateTimeString();

        $active = true;

        if($mytime > $date){
            $active = false;
        }

        return [
            'active' => $active,
        ];
    }

    public function update_password(StudentPasswordUpdateRequest $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        $errors = ['old_password' => ["Старый пароль не правильный."]];

        if (!Hash::check($request->old_password, $user->password)) {
            return $this->errorMessageValidation($errors);
        } else {
            try {
                $password = Hash::make($request->new_password);
                $user->update([
                    'password' => $password,
                ]);

                $user = User::find($id);
                Auth::login($user);
            } catch (Exception $e) {
                return $this->errorMessage($e->getMessage());
            }
        }

        return $this->successMessage();
    }

    public function lesson()
    {
        return inertia('Speedhack/Account/Student/Lesson');
    }


    public function eventLesson()
    {
        return inertia('Speedhack/Account/Student/EventLesson');
    }

    public function homework()
    {
        $programs = Course::find(1)->courseSections;
        $lessons = [];
        foreach ($programs as $item) {
            if ($item->lessons->count() > 0) {
                $lessons[] = $item->lessons;
            }
        }
        return inertia('Speedhack/Account/Student/Homework', compact('lessons'));

    }


    public function grammar()
    {
        return inertia('Speedhack/Account/Student/Grammar');
    }

    public function vocabulary()
    {
        return inertia('Speedhack/Account/Student/Vocabulary');
    }

    public function edit()
    {
        return inertia('Speedhack/Account/Profile/Edit');
    }

    public function profile()
    {
        return inertia('Speedhack/Account/Profile/Profile');
    }


    public function eventItems()
    {
        return inertia('Speedhack/Account/Student/ItemEvent');
    }


    public function test_trial(Request $request)
    {

        $lesson = Lesson::where('level', $request->level)->first();

        $tasks = $lesson->tasks;
        $tasks->map(function ($item, $key) {
            $item->key = $key;
            if ($key == 0) {
                $item->status = 'current';

            } else {
                $item->status = 'no-access';
            }
            $item->ball = 0;
        });

        $questions = [];

        foreach ($tasks as $key => $value) {
            if ($value->questions->count() > 0) {
                foreach ($value->questions as $k => $val) {
                    $val->type = $value->type;

                    if ($val->type == 'one') {
                        $val->question = json_decode($val->question);
                    }
                    if ($val->type == 'five') {
                        $val->options = json_decode($val->options);
                    }

                    $questions[$val->id] = $val;
                }
            }
        }

        return [
            'status' => 'success',
            'tasks' => $tasks,
            'questions' => $questions,
            'lesson' => $lesson
        ];
    }

    public function trial_2()
    {
        return inertia('Speedhack/Account/Student/TrialLesson2');
    }

}
