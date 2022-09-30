<?php

namespace App\Services;

use App\Models\{ Question, User};
use DB, Auth;

class CheckBall {

    public function one($question_id, $student_answers )
    {   
        $student = User::where('id', Auth::id())->first();

        if( $student->balls()->where('question_id',$question_id)->count() ==  0){
            DB::table('student_balls')
            ->insert([
                'student_id' => Auth::id(),
                'question_id' => $question_id,
                'ball' => 1
            ]);
        }

        $ball =  DB::table('student_balls')
            ->where('student_id', Auth::id())
            ->where('question_id', $question_id)
            ->get();
             
        $ball = $ball[0]->ball;

        $length = count($student_answers);
        $num = 0;

        foreach($student_answers as  $var){
            if($var['currect'] == true){
                $num = $num + 1;
            }
        }   
        if($num !== $length){
            if($ball == 0){
               $ball  = 0; 
            }else{
             $ball = $ball - 0.25;
            }

            $currect = false;
        }else{
            $currect = true;
        }
        
        $percent =  100 - ($ball * 100);

        DB::table('student_balls')
            ->where('student_id', Auth::id())
            ->where('question_id', $question_id)
            ->update(['ball' => $ball]);

        return [
            'percent' => $percent,
            'currect' =>  $currect,
            'ball' => $ball
        ];

    }

    public function three($question_id, $currect )
    {  
        $student = User::where('id', Auth::id())->first();

        if( $student->balls()->where('question_id',$question_id)->count() ==  0){
            DB::table('student_balls')
            ->insert([
                'student_id' => Auth::id(),
                'question_id' => $question_id,
                'ball' => 1
            ]);
        }

        $ball =  DB::table('student_balls')
            ->where('student_id', Auth::id())
            ->where('question_id', $question_id)
            ->get();
             
        $ball = $ball[0]->ball;


        if($currect == false){
            if($ball == 0){
               $ball = 0; 
            }else{
             $ball = $ball - 0.25;
            }
        }
        
        $percent =  100 - ($ball * 100);

        DB::table('student_balls')
            ->where('student_id', Auth::id())
            ->where('question_id', $question_id)
            ->update(['ball' => $ball]);

        return [
            'percent' => $percent,
            'ball' => $ball
        ];
    }

    public function five($question_id, $ball )
    {  
        $student = User::where('id', Auth::id())->first();

        if( $student->balls()->where('question_id',$question_id)->count() ==  0){
            DB::table('student_balls')
            ->insert([
                'student_id' => Auth::id(),
                'question_id' => $question_id,
                'ball' => 1
            ]);
        }

        DB::table('student_balls')
            ->where('student_id', Auth::id())
            ->where('question_id', $question_id)
            ->update(['ball' => $ball]);

    }
}