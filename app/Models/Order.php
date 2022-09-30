<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'number',
        'user_id',
        'paid',
        'status',
        'total',
        'paybox_payment_id',
        'methodist_id'
    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/orders/' . $this->getKey());
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
