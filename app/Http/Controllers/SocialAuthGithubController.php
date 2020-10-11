<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialAuthGithubController extends Controller
{
  /**
   * Create a redirect method to google api.
   *
   * @return void
   */
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }
/**
     * Return a callback method from google api.
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
