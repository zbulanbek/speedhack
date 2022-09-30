<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonTimeLine extends Model
{
    use HasFactory;

    public function blocks()
    {
        return $this->hasMany(LessonBlock::class, 'lesson_time_line_id', 'id');
    }
}
