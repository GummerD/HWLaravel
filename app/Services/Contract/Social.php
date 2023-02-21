<?php

namespace App\Services\Contract;
use Laravel\Socialite\Contracts\User as SocialUser;

interface Social
{
    public function loginAndGetRedirectUrl(SocialUser $socialUser): string;
}