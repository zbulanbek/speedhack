<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseCourseClass extends Model
{
    protected $fillable = [
        'user_id',
        'course_class_id',
        'is_approved',

    ];

    public function class()
    {
        return $this->belongsTo(CourseClass::class, 'course_class_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/purchase-course-classes/' . $this->getKey());
    }
}
