<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpeakingClub extends Model
{
    protected $fillable = [
        'date',
        'time',
        'teacher_id',
        'title',
        'subtitle',
        'text',
        'places',
        'period'
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/speaking-clubs/'.$this->getKey());
    }

    public function teacher(){
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
