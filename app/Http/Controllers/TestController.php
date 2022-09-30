<?php

namespace App\Http\Controllers;

use App\Events\{OneDrag, ThreeDrag, TwoDrag, FourDrag, FourAnswersDrag, FiveDrag};
use App\Services\Directory;
use Carbon\Carbon;
use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\{Lesson, Task, Question, User, TopicBlock};
use DB, Auth, CheckBall;

class TestController extends Controller
{
    public function show(Lesson $lesson)
    {
        $tasks = $lesson->tasks;
        $tasks->map(function ($item, $key) {
            $item->questions = $item->questions;
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

        return inertia('Speedhack/Test/Index', compact('tasks', 'lesson', 'questions'));
    }


    public function question(Request $request)
    {
        $task = Task::find($request->id)->questions;
        foreach ($task as $index => $var) {
            if ($request->type == 'one') {
                $task[$index]['question'] = json_decode($var['question']);
            }

            if ($request->type == 'three') {
                $task[$index]['options'] = json_decode($var['options']);
            }
        }
        return response([
            'items' => $task,
        ], 201);
    }

    public function one_check(Request $request)
    {

        $correct_answers = Question::find($request->id)->answer;
        $correct_answers = json_decode($correct_answers);
        $student_answers = $request->question;
        $question_id = $request->id;


        foreach ($student_answers as $index => $var) {
            if ($correct_answers[$index] == $var['item']) {
                $student_answers[$index]['currect'] = true;
            } else {
                $student_answers[$index]['currect'] = false;
            }
        }

        $check = CheckBall::one($question_id, $student_answers);

        return response([
            'answers' => $student_answers,
            'percent' => $check['percent'],
            'currect' => $check['currect'],
            'ball' => $check['ball'],
        ], 201);
    }

    public function one_drag(Request $request)
    {
        broadcast(new OneDrag($request->item))->toOthers();
        return response()->json(null, 204);
    }

    public function three_drag(Request $request)
    {
        broadcast(new ThreeDrag($request->item))->toOthers();
        return response()->json(null, 204);
    }

     public function two_drag(Request $request)
    {
        broadcast(new TwoDrag($request->item))->toOthers();
        return response()->json(null, 204);
    }

    public function four_drag(Request $request)
    {
        broadcast(new FourDrag($request->item))->toOthers();
        return response()->json(null, 204);
    }

     public function four_answers_drag(Request $request)
    {
        broadcast(new FourAnswersDrag($request->item))->toOthers();
        return response()->json(null, 204);
    }

    public function five_drag(Request $request)
    {
        broadcast(new FiveDrag($request->item))->toOthers();
        return response()->json(null, 204);
    }

    public function two_check(Request $request)
    {
        $questions_correct = Task::find($request->id)->all_questions;
        $answers = $request->answers;
        $questions = $request->questions;

        foreach ($questions_correct as $key => $value) {
            if ($value->answer == $answers[$key]['name']) {

                $answers[$key]['currect'] = true;
                $currect = true;
                $check = CheckBall::three($value->id, $currect);
                $answers[$key]['percent'] = $check['percent'];
                $questions[$key]['ball'] = $check['ball'];
            } else {

                $answers[$key]['currect'] = false;
                $currect = false;
                $check = CheckBall::three($value->id, $currect);
                $answers[$key]['percent'] = $check['percent'];
                $questions[$key]['ball'] = $check['ball'];
            }
        }

        return response([
            'answers' => $answers,
            'questions' => $questions
        ], 201);

    }


    public function two_check_metodist(Request $request)
    {
        $questions_correct = TopicBlock::find($request->id)->all_questions;
        $answers = $request->answers;
        $questions = $request->questions;

        foreach ($questions_correct as $key => $value) {
            if ($value->answer == $answers[$key]['name']) {

                $answers[$key]['currect'] = true;
                $currect = true;
                $check = CheckBall::three($value->id, $currect);
                $answers[$key]['percent'] = $check['percent'];
                $questions[$key]['ball'] = $check['ball'];
            } else {

                $answers[$key]['currect'] = false;
                $currect = false;
                $check = CheckBall::three($value->id, $currect);
                $answers[$key]['percent'] = $check['percent'];
                $questions[$key]['ball'] = $check['ball'];
            }
        }

        return response([
            'answers' => $answers,
            'questions' => $questions
        ], 201);

    }


    public function three_check(Request $request)
    {
        $correct_answer = Question::find($request->id)->answer;
        $student_answer = $request->question;
        $currect = $correct_answer == $student_answer ? true : false;
        $question_id = $request->id;

        $check = CheckBall::three($question_id, $currect);

        return response([
            'percent' => $check['percent'],
            'ball' => $check['ball'],
            'currect' => $currect
        ], 201);
    }

    public function four_check(Request $request)
    {
        $correct_answer = Question::find($request->id)->answer;
        $student_answer = $request->question;
        $currect = $correct_answer == $student_answer ? true : false;
        $question_id = $request->id;

        $check = CheckBall::three($question_id, $currect);

        return response([
            'ball' => $check['ball'],
            'currect' => $currect
        ], 201);
    }

    public function five_check(Request $request)
    {

        $questions_correct = Task::find($request->id)->all_questions;
        $questions = $request->questions;

        foreach ($questions as $key => $value) {

            if ($questions_correct[$key]['answer'] == $value['answer']) {
                $questions[$key]['currect'] = true;
                $questions[$key]['ball'] = 1;

                CheckBall::five($questions[$key]['id'], $questions[$key]['ball']);
            } else {
                $questions[$key]['currect'] = false;
                $questions[$key]['ball'] = 0;

                CheckBall::five($questions[$key]['id'], $questions[$key]['ball']);
            }
        }

        return response([
            'questions' => $questions
        ], 201);
    }

    public function five_check_metodist(Request $request)
    {

        $questions_correct = TopicBlock::find($request->id)->all_questions;
        $questions = $request->questions;

        foreach ($questions as $key => $value) {

            if ($questions_correct[$key]['answer'] == $value['answer']) {
                $questions[$key]['currect'] = true;
                $questions[$key]['ball'] = 1;

                CheckBall::five($questions[$key]['id'], $questions[$key]['ball']);
            } else {
                $questions[$key]['currect'] = false;
                $questions[$key]['ball'] = 0;

                CheckBall::five($questions[$key]['id'], $questions[$key]['ball']);
            }
        }

        return response([
            'questions' => $questions
        ], 201);
    }

    public function answers(Request $request)
    {
        $type = Task::find($request->id)->type;
        $questions = Task::find($request->id)->all_questions;
        $answers = [];

        foreach ($questions as $key => $value) {
            $answers[$key]['name'] = $value->answer;
            $answers[$key]['currect'] = null;
            if ($type == 'two') {
                $answers[$key]['percent'] = 0;
            }
        }

        shuffle($answers);
        return response([
            'answers' => $answers,
        ], 201);

    }

    public function answers_metodist(Request $request)
    {
        $type = TopicBlock::find($request->id)->type;
        $questions = TopicBlock::find($request->id)->all_questions;
        $answers = [];

        foreach ($questions as $key => $value) {
            $answers[$key]['name'] = $value->answer;
            $answers[$key]['currect'] = null;
            if ($type == 'two') {
                $answers[$key]['percent'] = 0;
            }
        }

        shuffle($answers);
        return response([
            'answers' => $answers,
        ], 201);

    }

    public function save_lesson_ball(Request $request)
    {
        $student = User::where('id', Auth::id())->first();

        if ($student->lesson_ball()->where('lesson_id', $request->lesson_id)->count() == 0) {
            DB::table('student_lesson_ball')
                ->insert([
                    'student_id' => Auth::id(),
                    'lesson_id' => $request->lesson_id,
                    'ball' => $request->ball
                ]);
        } else {

            DB::table('student_lesson_ball')
                ->where('student_id', Auth::id())
                ->where('lesson_id', $request->lesson_id)
                ->update(['ball' => $request->ball]);
        }

        return response([
            'success' => true,
        ], 201);
    }

    public function translate(Request $request)
    {
        $word = $request->word;
        $transWord = GoogleTranslate::trans($word, 'ru', 'en');
        if ($word) {
            $src = $this->getAudio($word);
        }
        return ($transWord) ?
            json_encode([$transWord, $src])
            : json_encode('');
    }

    public function getAudio($word)
    {
        $audio = file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=' . $word . '&tl=en-US&oe=mp3');
        $date = Carbon::now()->timestamp;
        $path = 'storage/audio/translates/';
        $mp3 = $date . '.mp3';
        Directory::create($path);
        $src = $path . $mp3;
        file_put_contents($src, $audio);
        return $src;
    }


}
