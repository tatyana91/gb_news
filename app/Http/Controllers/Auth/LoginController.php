<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginSoc($socName) {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        if (!in_array($socName, array('vkontakte', 'github'))) {
            abort(404);
        }

        return Socialite::driver($socName)->redirect();
    }

    public function responseSoc(UserRepository $userRepository, $socName) {
        if (!Auth::check()) {
            if (!in_array($socName, array('vkontakte', 'github'))) {
                abort(404);
            }

            $user = Socialite::driver($socName)->user();
            $userInSystem = $userRepository->getUserBySocId($user, $socName);
            Auth::login($userInSystem);
        }
        return redirect()->route('home');
    }
}
