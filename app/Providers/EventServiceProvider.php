<?php

namespace App\Providers;

use App\Events\LoginEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\LastLoginUpdateListener;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\GitHub\GitHubExtendSocialite;
use SocialiteProviders\VKontakte\VKontakteExtendSocialite;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        LoginEvent::class => [
            LastLoginUpdateListener::class
        ],

        SocialiteWasCalled::class => [
            // ... other providers
            VKontakteExtendSocialite::class.'@handle',
        ],

        SocialiteWasCalled::class => [
            // ... other providers
            GitHubExtendSocialite::class.'@handle',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
