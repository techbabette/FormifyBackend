<?php

namespace App\Providers;

use App\Core\IAuthorizer;
use App\Implementation\Authorizer\AuthorizerGroupsEloquent;
use App\Implementation\FormService\GetFormEloquent;
use App\Implementation\FormService\GetFormEloquentCache;
use App\Implementation\InputService\ListInputsEloquentCache;
use App\Implementation\MailerService\RegistrationEmailMQ;
use App\Implementation\RegexOptionService\ListRegexOptionsEloquent;
use App\Implementation\RegexOptionService\ListRegexOptionsEloquentCache;
use App\Interfaces\FormService\IGetForm;
use App\Interfaces\InputService\IListInputs;
use App\Interfaces\MailerService\IRegistrationEmail;
use App\Interfaces\RegexOptionService\IListRegexOptions;
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

        $this->app->bind(IGetForm::class, GetFormEloquentCache::class);
        $this->app->bind(IListInputs::class, ListInputsEloquentCache::class);
        $this->app->bind(IListRegexOptions::class, ListRegexOptionsEloquentCache::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
