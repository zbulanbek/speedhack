<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'model_type',
        'model_id',
        'quantity',
        'total',
        'price'
    ];

    /**
     * Get the parent model.
     */
    public function model()
    {
        return $this->morphTo();
    }
}
