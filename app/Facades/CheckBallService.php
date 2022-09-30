<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CheckBallService extends Facade {

    protected static function getFacadeAccessor(){
        return 'checkBall';
    }
    
}