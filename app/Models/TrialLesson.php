<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrialLesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'application_id',
        'student_id',
        'metodist_id',
        'timetable_id'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function metodist()
    {
        return $this->belongsTo(User::class, 'metodist_id', 'id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }

    public function participants()
    {
        return $this->hasMany(TwilioRoomParticipant::class, 'room_name', 'room_name');
    }
    public function timetable()
    {
        return $this->belongsTo(Timetable::class, 'timetable_id', 'id');
    }
}

