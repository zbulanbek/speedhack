<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseSection;
use App\Models\Feedback;
use App\Models\News;
use App\Models\TabCourse;
use App\Models\TeacherSlider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $data['courses'] = Course::take(6)->get();
        $data['news'] = News::all();
        $data['teachers'] = TeacherSlider::all();
        $data['tabs'] = TabCourse::all();
        $data['comments'] = Feedback::take(4)->get();
        $data['avg'] = round(Feedback::avg('rate'), 1);
        return inertia('Speedhack/Static/Welcome', $data);
    }

    public function home()
    {
        return redirect()->route('account.profile');
    }

    public function all_courses()
    {
        $categories = CourseCategory::with('courses')->get();
        return inertia('Speedhack/Static/AllCourses', compact('categories'));
    }

    public function course($id)
    {

        $course = Course::findOrFail($id);
        $data['course'] = $course;
        $data['cases'] = $data['course']->cases;
        $data['classes'] =  $data['course']->classes;
        $data['facts_course'] = $data['course']->course_facts;
        $data['info'] = $data['course']->course_infos;
        // $data['programs'] = $data['course']->programs()->with('lessons')->get();
        $programs = CourseSection::where('course_id', $id)->get();


        $programs->map(function ($item) {
            $file_all = 0;
            foreach ($item->lessons as $key => $mine) {
                if(!empty($mine->materials)){
                   $file_all = $file_all + $mine->materials->count(); 
                }
                $mine->files_count = $mine->materials;
            }
            $item->file_all = $file_all;
        });

        $data['programs'] = $programs;

        $data['certificate'] = $data['course']->certificate;
        $data['comments'] = Feedback::take(4)->get();
        $data['avg'] = round(Feedback::avg('rate'), 1);
        return inertia('Speedhack/Static/Course', $data);
    }

    public function teacher()
    {
        return inertia('Speedhack/Static/Teacher');
    }

    public function news()
    {
        $news = News::all();
        return inertia('Speedhack/Static/News', compact('news'));
    }

    public function news_item(News $news)
    {
        return inertia('Speedhack/Static/NewsItem', compact('news'));
    }


    public function comments()
    {
        $data['comments'] = Feedback::all();
        $data['avg'] = round(Feedback::avg('rate'), 1);
        return inertia('Speedhack/Static/Comments', $data);
    }


    public function offer()
    {
        return inertia('Speedhack/Static/Offer');
    }

    public function error()
    {
        return inertia('Speedhack/Static/Error');
    }
   
}
