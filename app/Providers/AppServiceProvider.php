<?php

namespace App\Providers;

use App\Jobs\SendReminderEmail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Queue::after(function($connection,$job,$data){
//            Log::info($connection);
//            Log::info($job);
//            Log::info($data);
//        });
        Queue::after(function ($event) {
             Log::info($event->connectionName);


             Log::info($event->data);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        if($this->app->environment('local')) {
//            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
//        }
    }
}
