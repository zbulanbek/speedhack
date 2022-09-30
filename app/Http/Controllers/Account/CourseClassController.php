<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{CourseCategory, Course, CourseClass, PurchaseCourseClass, User, Application};
use Dosarkz\Paybox\Facades\Paybox;
use Paybox\Pay\Facade as PayboxPay;
use Illuminate\Support\Facades\Auth;

class CourseClassController extends Controller
{
    public function index()
    {
        $categories = CourseCategory::with('courses')->get();
        return inertia('Speedhack/Account/Catalog/Courses/Courses', compact('categories'));
    }

    public function buyCourseClass(CourseClass $courseClass)
    {

        $user_email = User::find(Auth::id())->email;
      
        $methodist_id = Application::where('email', $user_email)->first()->methodist;

        if($methodist_id != null){
            $methodist_id = Application::where('email', $user_email)->first()->methodist->id;
        }
        
        

        $order = request()->user()->orders()->create([
            'status' => 'Новый',
            'total' => $courseClass->price,
            'methodist_id' => $methodist_id
        ]);

        $courseClass->orderItems()->create([
            'order_id' => $order->id,
            'price' => $courseClass->price,
            'total' => $courseClass->price,
            'quantity' => 1
        ]);


        $paybox = Paybox::generate([
            "x_idempotency_key" => $order->id, // required
            'order' => $order->number,
            'amount' =>  $order->total, // required
            "currency" => "KZT", // required
            "description" => "$courseClass->count занятий", // required
            "expires_at" => date("Y-m-d H:i:s", strtotime('+5 hours')), // required
            "options" => [
               "callbacks" => [
                   "result_url" => route('paybox.check'),
                   "check_url" => route('paybox.check'),
                   "cancel_url" => route('paybox.cancel'),
                   "success_url" => route('paybox.success'),
                   "failure_url" => route('paybox.failure'),
                   "back_url"   => route('paybox.back'),
                   "capture_url" => route('paybox.capture')
               ]
           ]
        ]);
        $location = null;
        
        if ($paybox['code'] === 201 || $paybox['code'] === 200) {
            $location = $paybox['response']['payment_page_url'];
            $order->update([
                'paybox_payment_id' => $paybox['response']['id']
            ]);
        }


        // $user = User::find(Auth::id());
        // // dd(config('paybox.secret_key'));
        // $paybox = new PayboxPay();
        // $paybox->merchant->id = config('paybox.merchant_id');
        // $paybox->merchant->secretKey = config('paybox.secret_key');
        // $paybox->order->id = $order->id;
        // $paybox->order->description = 'Покупка курсов';
        // $paybox->order->amount = 40;
        // // $paybox->config->successUrl = 'https://speedhack.kz/paybox/success';
        // // $paybox->config->failureUrl = 'https://speedhack.kz/paybox/failure';
        // $paybox->config->successUrl = 'http://127.0.0.1:8000/paybox/success';
        // $paybox->config->failureUrl = 'http://127.0.0.1:8000/paybox/failure';
        // $paybox->config->requestMethod = 'GET';
        // $paybox->config->successUrlMethod = 'GET';
        // $paybox->config->failureUrlMethod = 'GET';
        // // $paybox->config->pg_user_phone = intval($user->phone);
        // $paybox->config->pg_user_contact_email = $user->email;
        // $paybox->config->pg_testing_mode = 0;

       

        // if ($paybox->init()) {
           
            
        //     $location = $paybox->redirectUrl;
        //     $order->update([
        //         'paybox_payment_id' => 38293832
        //     ]);
        // }

        return response()->json(compact('location'));
    }

    public function classes(Course $course)
    {
        $course->load('classes');
        return inertia('Speedhack/Account/Catalog/Courses/Classes', compact('course'));
    }
}
