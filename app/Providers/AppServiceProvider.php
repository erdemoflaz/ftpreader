<?php

namespace App\Providers;

use App\Notifications\AdminNotifier;
use App\User;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::after(function (JobProcessed $event) {
            if ($event->job->resolveName() == 'App\Jobs\UpdatedCategoryChecker') {

                $user = User::find(1);

                $user->notify(new AdminNotifier());
            }
        });
    }
}
