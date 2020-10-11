<?php
namespace App\Services;

use App\SocialGithubAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialGithubAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialGithubAccount::whereProvider('github')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new SocialGithubAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'github'
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => md5(rand(1, 10000)),
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}
