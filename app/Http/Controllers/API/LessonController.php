<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        $lesson->load('courseSection', 'timeLines', 'timeLines.blocks');
        return response()->json(compact('lesson'));
    }
}
