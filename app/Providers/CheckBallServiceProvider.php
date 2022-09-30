<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class  CheckBallServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->bind('checkBall', 'App\Services\CheckBall');
    }

}