<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create(FeedbackRequest $request){
        Feedback::create(
            [
                'name' => $request->name,
                'text' => $request->comment,
                'rate' => $request->rate,
            ]
        );
        return response()->noContent(201);
    }
}
