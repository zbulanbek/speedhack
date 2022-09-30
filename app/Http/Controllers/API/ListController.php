<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MethodistStatus;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function methodistStatuses()
    {
        $methodist_statuses = MethodistStatus::get();
        return response()->json(compact('methodist_statuses'));
    }
}
