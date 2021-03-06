<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth;

class SocialController extends Controller
{

  // FACEBOOK
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();

            # Если такой пользователь есть авторизуемся
            # Иначе регистрируем
            if ($isUser) {
                Auth::login($isUser);

                return redirect('/dashboard');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('user'),
                ]);

                Auth::login($createUser);

                return redirect('/dashboard');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    // GOOGLE

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            $isUser = User::where('google_id', $user->id)->first();

            # Если такой пользователь есть авторизуемся
            # Иначе регистрируем
            if ($isUser) {
                Auth::login($isUser);

                return redirect('/dashboard');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('user'),
                    //'avatar' =>$user->profile_photo_path,
                    'profile_photo_path' => $user->avatar,
                ]);

                Auth::login($createUser);

                return redirect('/dashboard');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    // APPLE

    public function appleRedirect()
    {
        return Socialite::driver('apple')->redirect();
    }

    public function loginWithApple()
    {
        try {
            $user = Socialite::driver('apple')->user();
            $isUser = User::where('apple_id', $user->id)->first();

            # Если такой пользователь есть авторизуемся
            # Иначе регистрируем
            if ($isUser) {
                Auth::login($isUser);

                return redirect('/dashboard');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'apple_id' => $user->id,
                    'password' => encrypt('user'),
                ]);

                Auth::login($createUser);

                return redirect('/dashboard');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }


}
