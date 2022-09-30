<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
     use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'author_id',
        'title',
        'slug',
        'text',
        'image',
        'body',
        'duration',
        'price',
        'is_visible',
        'course_category_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
     protected $appends = ['resource_url', 'speaker_resource_url'];

    /* ************************ ACCESSOR ************************* */

   

      public function getResourceUrlAttribute()
    {
        return url('/admin/courses/' . $this->getKey());
    }

    public function getSpeakerResourceUrlAttribute()
    {
        return url('/admin/speaker/courses/' . $this->getKey());
    }

    public function course_category()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function course_facts()
    {
        return $this->hasMany(CourseFact::class);
    }

    public function course_infos()
    {
        return $this->hasMany(CourseInfo::class);
    }

    public function sections()
    {
        return $this->hasMany(CourseSection::class);
    }

    public function facts()
    {
        return $this->hasMany(Fact::class, 'course_id', 'id');
    }

    public function cases()
    {
        return $this->hasMany(CourseCase::class, 'course_id', 'id');
    }

    public function courseSections()
    {
        return $this->hasMany(CourseSection::class);
    }

    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }

    public function lessons()
    {
        return $this->hasManyThrough(
            'App\Models\CourseSection', 'App\Models\Lesson',
            'course_section_id', 'course_id', 'id'
        );
    }

    public function classes()
    {
        return $this->hasMany(CourseClass::class);
    }

    // public function orders() 
    // {
    //     $this->morphMany(Order::class, 'orderable');
    // }

//    protected static function boot()
//    {
//        parent::boot(); // TODO: Change the autogenerated stub
//        Course::created(function ($course){
//            if(starts_with($course->image, 'public')){
//                $course->image = substr($course->image, 6);
//                $course->save();
//            }
//        });
//    }
}
