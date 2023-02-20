<?php

namespace Azuriom\Plugin\Authme\Providers;

use Azuriom\Extensions\Plugin\BasePluginServiceProvider;
use Azuriom\Plugin\Authme\Cards\AuthmeViewCard;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;

class AuthmeServiceProvider extends BasePluginServiceProvider
{
    /**
     * The plugin's global HTTP middleware stack.
     *
     * @var array
     */
    protected array $middleware = [
        // \Azuriom\Plugin\Authme\Middleware\ExampleMiddleware::class,
    ];

    /**
     * The plugin's route middleware groups.
     *
     * @var array
     */
    protected array $middlewareGroups = [];

    /**
     * The plugin's route middleware.
     *
     * @var array
     */
    protected array $routeMiddleware = [
        // 'example' => \Azuriom\Plugin\Authme\Middleware\ExampleRouteMiddleware::class,
    ];

    /**
     * The policy mappings for this plugin.
     *
     * @var array
     */
    protected array $policies = [
        // User::class => UserPolicy::class,
    ];

    /**
     * Register any plugin services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMiddlewares();

        //
    }

    /**
     * Bootstrap any plugin services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();

        $this->loadViews();

        $this->loadTranslations();

        $this->loadMigrations();

        $this->registerRouteDescriptions();

        $this->registerAdminNavigation();

        $this->registerUserNavigation();

        //
        Event::listen(function (Registered $event) {
            $event->user->forceFill([
                'authme_username' => strtolower($event->user->name),
            ])->save();
        });

        Event::listen(function (Verified $event) {
            $event->user->forceFill([
                'authme_activated' => 1,
            ])->save();
        });

        Event::listen('eloquent.updated: Azuriom\Models\User', function ($user) {
            if ($user->email_verified_at == null && $user->authme_activated == 1) {
                $user->forceFill([
                    'authme_activated' => 0,
                ])->save();
            } elseif ($user->email_verified_at != null && $user->authme_activated == 0) {
                $user->forceFill([
                    'authme_activated' => 1,
                ])->save();
            }

            if ($user->deleted_at != null && $user->authme_username != null) {
                $user->forceFill([
                    'authme_activated' => null,
                    'authme_username'  => null,
                ])->save();
            }

            return true;
        });

        View::composer('profile.index', AuthmeViewCard::class);
    }

    /**
     * Returns the routes that should be able to be added to the navbar.
     *
     * @return array
     */
    protected function routeDescriptions()
    {
        return [
            //
        ];
    }

    /**
     * Return the admin navigations routes to register in the dashboard.
     *
     * @return array
     */
    protected function adminNavigation()
    {
        return [
            'authme'=> [
                'name'  => trans('authme::admin.title'),
                'type'  => 'dropdown',
                'icon'  => 'bi bi-shield-lock',
                'items' => [
                    'authme.admin.configure' => trans('authme::admin.configure.title'),
                ],
            ],
            //
        ];
    }

    /**
     * Return the user navigations routes to register in the user menu.
     *
     * @return array
     */
    protected function userNavigation()
    {
        return [
            //
        ];
    }
}
