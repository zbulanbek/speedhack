<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSlider extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'color',
        'image',
        'course',
        'name',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/teacher-sliders/'.$this->getKey());
    }
}
