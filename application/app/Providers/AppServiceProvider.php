<?php

namespace App\Providers;

use App\Core\IAuthorizer;
use App\Implementation\Authorizer\AuthorizerCache;
use App\Implementation\Authorizer\AuthorizerGroupsEloquent;
use App\Implementation\FormService\FormCreateEloquent;
use App\Implementation\FormService\FormSubmitResponseEloquent;
use App\Implementation\FormService\GetFormEloquent;
use App\Implementation\FormService\GetFormEloquentCache;
use App\Implementation\FormService\ListPersonalFormsEloquent;
use App\Implementation\FormService\ListResponsesEloquent;
use App\Implementation\InputService\ListInputsEloquentCache;
use App\Implementation\LinkService\ListLinksEloquent;
use App\Implementation\LinkService\ListLinksEloquentCache;
use App\Implementation\MailerService\RegistrationEmailMQ;
use App\Implementation\RegexOptionService\ListRegexOptionsEloquent;
use App\Implementation\RegexOptionService\ListRegexOptionsEloquentCache;
use App\Implementation\UserService\LoginDirectEloquentCache;
use App\Implementation\UserService\LoginEloquentCache;
use App\Implementation\UserService\LogoutCache;
use App\Implementation\UserService\VerifyUserEloquent;
use App\Interfaces\FormService\IFormCreate;
use App\Interfaces\FormService\IFormSubmitResponse;
use App\Interfaces\FormService\IGetForm;
use App\Interfaces\FormService\IListFormResponses;
use App\Interfaces\FormService\IListPersonalForms;
use App\Interfaces\InputService\IListInputs;
use App\Interfaces\LinkService\IListLinks;
use App\Interfaces\MailerService\IRegistrationEmail;
use App\Interfaces\RegexOptionService\IListRegexOptions;
use App\Interfaces\UserService\ILogin;
use App\Interfaces\UserService\ILoginDirect;
use App\Interfaces\UserService\ILogout;
use App\Interfaces\UserService\IVerifyUser;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IRegistrationEmail::class, RegistrationEmailMQ::class);
        $this->app->bind(IAuthorizer::class, AuthorizerCache::class);

        $this->app->bind(IGetForm::class, GetFormEloquentCache::class);
        $this->app->bind(IListInputs::class, ListInputsEloquentCache::class);
        $this->app->bind(IListRegexOptions::class, ListRegexOptionsEloquentCache::class);
        $this->app->bind(ILogin::class, LoginEloquentCache::class);
        $this->app->bind(ILoginDirect::class, LoginDirectEloquentCache::class);
        $this->app->bind(ILogout::class, LogoutCache::class);
        $this->app->bind(IVerifyUser::class, VerifyUserEloquent::class);
        $this->app->bind(IListLinks::class, ListLinksEloquentCache::class);

        $this->app->bind(IListFormResponses::class, ListResponsesEloquent::class);
        $this->app->bind(IFormSubmitResponse::class, FormSubmitResponseEloquent::class);
        $this->app->bind(IListPersonalForms::class, ListPersonalFormsEloquent::class);
        $this->app->bind(IFormCreate::class, FormCreateEloquent::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
