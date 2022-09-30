<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function questionCorrectOptions(Request $request)
    {
        $tasks = Task::whereIn('id', $request->ids)->get();
        $correct_options = [];
        foreach ($tasks as $task) {
            $task->questions->map(function ($item) use (&$correct_options) {
                $correct_user_answers = $item->correct_user_answers->pluck('question_option_id')->toArray() ?? [];
                if ($item->correct_options) {
                    foreach ($item->correct_options as $correct_option) {
                        if (!in_array($correct_option->id, $correct_user_answers)) {
                            $correct_options[] = $correct_option->only('id', 'option_text', 'question_id');
                        }
                    }
                }
            });
        }
        if ($request->unique_values) {
            $correct_options = array_unique($correct_options);
        }
        return response()->json(compact('correct_options'));
    }

    public function questionUserAnswers(Request $request, Question $question)
    {
        $validated = $request->validate([
            'question_option_id' => ['nullable', 'integer'],
            'answer' => ['nullable', 'string'],
        ]);
        $validated['user_id'] = $request->user()->id;
       
        if ($request->user()->role->guard_name != 'metodist' && $request->user()->role->guard_name != 'teacher')
            $question->answers()->create($validated);
            return response()->json(null, 204);
    }
}
