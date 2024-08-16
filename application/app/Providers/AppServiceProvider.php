<?php

namespace App\Providers;

use App\Core\IAuthorizer;
use App\Implementation\Authorizer\AuthorizerGroupsEloquent;
use App\Implementation\FormService\GetFormEloquent;
use App\Implementation\FormService\GetFormEloquentRedis;
use App\Implementation\MailerService\RegistrationEmailMQ;
use App\Interfaces\FormService\IGetForm;
use App\Interfaces\MailerService\IRegistrationEmail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IRegistrationEmail::class, RegistrationEmailMQ::class);
        $this->app->bind(IAuthorizer::class, AuthorizerGroupsEloquent::class);

        $this->app->bind(IGetForm::class, GetFormEloquentRedis::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
