<?php

namespace App\Providers;

use App\Core\IAuthorizer;
use App\Implementation\Authorizer\AuthorizerGroupsEloquent;
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

        $this->app->bind(IAuthorizer::class, AuthorizerGroupsEloquent::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
