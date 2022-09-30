<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Program;
use App\Models\Setting;
use App\Services\TwilioVideo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TwilioVideo::class, function ($app) {
            return new TwilioVideo();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('settings')) {
          $sets = Setting::pluck('value', 'key')->toArray();
          Inertia::share('sets', $sets);
        }

        Gate::define('check-methodist', function ($user) {
          return $user->role_id == 4;
        });
    }
}
