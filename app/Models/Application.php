<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $appends = ['resource_url'];

    protected $fillable = [
       'name',
       'phone',
       'email',
       'status_id',
       'methodist_id',
       'methodist_status_id',
       'start_time',
       'comment'
    ];

    public function status()
    {
        return $this->belongsTo(ApplicationStatus::class, 'status_id');
    }

    public function methodist()
    {
        return $this->belongsTo(User::class, 'methodist_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function methodistStatus()
    {
        return $this->belongsTo(MethodistStatus::class, 'methodist_status_id');
    }

    public function trialLessons()
    {
        return $this->hasMany(TrialLesson::class, 'application_id');
    }

    public function getResourceUrlAttribute()
    {
      return url('/admin/applications/' . $this->getKey());
    }
}
