<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Setting extends Model
{
    protected $fillable = [
        'display_name',
        'key',
        'value',
        'type',
    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];
     protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/settings/'.$this->getKey());
    }

}
