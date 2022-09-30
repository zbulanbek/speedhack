<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseFact extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'course_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/course-facts/'.$this->getKey());
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
