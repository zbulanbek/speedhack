<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\TrialLesson;

class SendEmail {

    public function sendLoginPassword($email, $login, $password)
    {
        // $text = 'Ваш логин '.$login.', '.'Ваш пароль: '.$password;

        // Mail::raw($text, function ($message) use ($email){
        //     $message->to($email);
        //     $message->subject('Speedhack, логин и пароль');
        // });

        Mail::send(['html' => 'emails.application'], array('login' => $login ,'password' => $password),function ($message) use ($email){
            $message->to($email);
            $message->subject('Speedhack, логин и пароль');
        });
        
        return 'ok';
    }

    public function generatePassword($length)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr(str_shuffle($chars), 0,  $length);
        return  $password;
    }

    public function sendError($email)
    {
        $text = 'Вы уже есть в базе если забыли пароль можете восстановить';

        Mail::raw($text, function ($message) use ($email){
            $message->to($email);
            $message->subject('Speedhack');
        });

        return 'ok';
    }

    public function sendApiFirstLesson($email, $api)
    {

        //$text = 'Ваш api: '.$api;


        Mail::send(['html' => 'emails.api'], array('api' => $api), function ($message) use ($email){
            $message->to($email);
            $message->subject('Speedhack, ссылка на пробный урок');
        });

        return 'ok';
    }

    public function sendApiAndLogin($email, $api, $login, $password)
    {

        Mail::send(['html' => 'emails.login-api'], array('api' => $api, 'login' => $login ,'password' => $password), function ($message) use ($email){
            $message->to($email);
            $message->subject('Speedhack, ссылка на пробный урок');
        });

        return 'ok';
    }
}
