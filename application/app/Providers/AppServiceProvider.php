<?php

namespace App\Providers;

use App\Services\MailerService;
use App\Implementation\MailerService\MailerServiceMQ;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MailerService::class, MailerServiceMQ::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
