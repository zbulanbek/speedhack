<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $fillable = [
        'lesson_id',
        'student_id',
        'teacher_id',
        'date',
        'start_time',
        'finish_time',
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/timetables/'.$this->getKey());
    }

    public function lesson(){
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function teacher(){
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }

    public function trialLessons()
    {
        return $this->hasMany(TrialLesson::class, 'timetable_id');
    }
}
