<?php

namespace App\Observers;

use App\Models\QuestionOption;
use App\Models\UserQuestionAnswer;

class UserQuestionAnswerObserver
{
    /**
     * Handle the UserQuestionAnswer "created" event.
     *
     * @param \App\Models\UserQuestionAnswer $userQuestionAnswer
     * @return void
     */
    public function created(UserQuestionAnswer $userQuestionAnswer)
    {
        if ($userQuestionAnswer->answer) {
            $correctOptions = $userQuestionAnswer->question->correct_options->pluck('option_text')->toArray() ?? [];
            
            $hasQuestionOption = QuestionOption::where('option_text', $userQuestionAnswer->answer)->first();
           
            if($hasQuestionOption !== null){
                $questionOption = QuestionOption::where('option_text', $userQuestionAnswer->answer)
                    ->where('question_id', $userQuestionAnswer->question_id)
                    ->first();

                if (is_array($correctOptions) && in_array($userQuestionAnswer->answer, $correctOptions) && $questionOption) {
                    $userQuestionAnswer->update([
                        'is_correct' => true,
                        'question_option_id' => $questionOption->id,
                        'point' => $userQuestionAnswer->question->point ?? 0
                    ]);
                }
                
            }
            
        } else {
            $correctOptions = $userQuestionAnswer->question->correct_options->pluck('id')->toArray() ?? [];
            if (is_array($correctOptions) && in_array($userQuestionAnswer->question_option_id, $correctOptions)) {
                $userQuestionAnswer->update([
                    'is_correct' => true,
                    'point' => $userQuestionAnswer->question->point ?? 0
                ]);
            }
        }
    }

    /**
     * Handle the UserQuestionAnswer "updated" event.
     *
     * @param \App\Models\UserQuestionAnswer $userQuestionAnswer
     * @return void
     */
    public function updated(UserQuestionAnswer $userQuestionAnswer)
    {
        //
    }

    /**
     * Handle the UserQuestionAnswer "deleted" event.
     *
     * @param \App\Models\UserQuestionAnswer $userQuestionAnswer
     * @return void
     */
    public function deleted(UserQuestionAnswer $userQuestionAnswer)
    {
        //
    }

    /**
     * Handle the UserQuestionAnswer "restored" event.
     *
     * @param \App\Models\UserQuestionAnswer $userQuestionAnswer
     * @return void
     */
    public function restored(UserQuestionAnswer $userQuestionAnswer)
    {
        //
    }

    /**
     * Handle the UserQuestionAnswer "force deleted" event.
     *
     * @param \App\Models\UserQuestionAnswer $userQuestionAnswer
     * @return void
     */
    public function forceDeleted(UserQuestionAnswer $userQuestionAnswer)
    {
        //
    }
}
