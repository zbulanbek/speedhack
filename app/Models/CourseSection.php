<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'course_id'
    ];

    protected $appends = [
        'resource_url'
    ];

    public function getResourceUrlAttribute()
    {
        return url('/admin/course-sections/' . $this->getKey());
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function homeWorks()
    {
        return $this->hasManyThrough(
            HomeWork::class, Lesson::class,
            'course_section_id', 'lesson_id', 'id'
        );
    }
}
