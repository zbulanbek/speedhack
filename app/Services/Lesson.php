<?php

namespace App\Services;

use App\Models\{TrialLesson};
use Illuminate\Support\Str;

class Lesson {

	public function trialLesson($student_id, $metodist_id, $token, $application_id)
    {
        TrialLesson::create(array(

        ));

    }
}
