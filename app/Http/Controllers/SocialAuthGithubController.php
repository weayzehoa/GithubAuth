<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialGithubAccountService;

class SocialAuthGithubController extends Controller
{
  /**
   * Create a redirect method to github api.
   *
   * @return void
   */
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }
/**
     * Return a callback method from github api.
     *
     * @return callback URL from google
     */
    public function callback(SocialGithubAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('github')->user());
        auth()->login($user);
        return redirect()->to('/home');
    }
}
