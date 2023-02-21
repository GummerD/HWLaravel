<?php

namespace App\Http\Controllers;

use App\Services\Contract\Social;
use Illuminate\Http\RedirectResponse as LaravelRedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\Foundation\Application;

class SocialProvidersController extends Controller
{
    public function redirect(string $driver): SymfonyRedirectResponse | LaravelRedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social): Redirector | LaravelRedirectResponse | Application
    {
        return redirect($social->loginAndGetRedirectUrl(
            Socialite::driver($driver)->user())
        );
    }
}
