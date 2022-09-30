<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {;
        $order->update([
            'number' => str_pad($order->id, 6, '0', STR_PAD_LEFT),
        ]);
    }


}
