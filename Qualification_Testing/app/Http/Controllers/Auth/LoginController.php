<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Laravel\Socialite\Facades\Socialite; // 第三方登入
use App\User; // user table
use Illuminate\Support\Facades\Auth; // 用Auth

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    // 更改登入後的跳轉位置
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // 第三方登入
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $provider_id = $provider.'_id';
        $user = Socialite::driver($provider)->user();
        // dd($user);

        // 先拿看看有沒有對應的id
        $newUser = User::where($provider_id, $user->getId())->first();

        // 如果沒有，確認是否有一樣的email
        if (!$newUser){
            $newUser = User::where('email',$user->getEmail())->first();

            // 如果有，更新id進去並登入
            if ($newUser){
                $newUser->$provider_id = $user->getId();
                $newUser->save();
            }

            // 如果沒有，加入資料庫
            else{
                $name = $user->getName();
                if (!$user->getName()){
                    $name = '無Username';
                }

                $newUser = User::create([
                    'name' => $name,
                    'email' => $user->getEmail(),
                    $provider_id => $user->getId(),
                ]);

                // user login
                Auth::login($newUser, true);
                return redirect($this->redirectTo);
            }
        }

        if ($newUser->name == '無Username'){
            $newUser->name = $user->getName();
            $newUser->save();
        }

        // user login
        Auth::login($newUser, true);

        return redirect($this->redirectTo);
    }
}
