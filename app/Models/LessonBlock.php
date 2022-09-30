<?php

namespace App\Models;

use App\Casts\LessonBlockContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonBlock extends Model
{
    use HasFactory;
    protected $fillable = [
        'lesson_time_line_id',
        'title',
        'type',
        'content',
    ];

    protected $casts = [
        'content' => LessonBlockContent::class
    ];
}
