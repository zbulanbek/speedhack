<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LessonServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->bind('lesson', 'App\Services\Lesson');
    }

}