<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SendEmailServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->bind('sendEmail', 'App\Services\SendEmail');
    }

}