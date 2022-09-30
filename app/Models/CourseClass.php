<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'count',
        'course_id',
        'price',
        'sale',
        'sale_lesson',
        'class_price',
        'title',
        'percent',
        'text',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

   

     public function getResourceUrlAttribute()
    {
        return url('/admin/course-classes/'.$this->getKey());
    }

     public function purchases()
    {
        return $this->hasMany(PurchaseCourseClass::class, 'course_class_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function orderItems()
    {
        return $this->morphMany(OrderItem::class, 'model');
    }
}
