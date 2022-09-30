<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Material};
use Auth, DB;

class MaterialController extends Controller
{
    public function show(Request $request)
    {
        $materials = $request->user()->materials;

        $materials->map(function ($item) {
            $item->lesson_name = $item->lesson->title;
        });

        $materials_count = $materials->count();
        return inertia('Speedhack/Account/Student/Materials', compact('materials_count', 'materials'));
    }

    public function delete(Request $request)
    {

        DB::table('student_materials')
            ->where('student_id', Auth::id())
            ->where('material_id', $request->id)
            ->delete();

        return $this->successMessage();
    }
}
