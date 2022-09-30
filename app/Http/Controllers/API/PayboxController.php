<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayboxController extends Controller
{
    public function check(Request $request)
    {
        $text = "Выполняется проверка платежа!";
        return inertia('Speedhack/Account/Orders/OrderStatus', compact('text'));
    }

    public function result(Request $request)
    {
        $text = "Выполняется проверка платежа!";
        return inertia('Speedhack/Account/Orders/OrderStatus', compact('text'));
    }

    public function cancel(Request $request)
    {
        $text = "Платеж отменен!";

        return inertia('Speedhack/Account/Orders/OrderStatus', compact('text'));
    }

    public function success(Request $request)
    {
        $order = Order::where('number', $request->pg_order_id)->where('paybox_payment_id', $request->pg_payment_id)->first();
        if ($order) {
            $order->update([
                'paid' => true,
            ]);
        }
        $text = "Оплата проведена успешно!<br>Поздравляем с приобретением курса <b style='color:#F2994A'>:)</b>";
        
        if(!$order){
            $order =  Order::first();
        }
        
        Auth::loginUsingId($order->user->id);
        //dd($order->user);
        // dd(Auth::loginUsingId($order->user->id));
        return inertia('Speedhack/Account/Orders/OrderStatus', compact('text'));
    }

    public function failure(Request $request)
    {
        $text = "Платеж не прошел!";

        return inertia('Speedhack/Account/Orders/OrderStatus', compact('text'));
    }

    public function back(Request $request)
    {
        info('back');
        info($request->all());
    }

    public function capture(Request $request)
    {
        info('capture');
        info($request->all());
    }

}
