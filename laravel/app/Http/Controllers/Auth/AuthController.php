<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @var \App\Models\User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * ユーザーを作成する
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        try {
            $user = $this->user->createUser($request->user_name, $request->user_email, $request->user_password);
        } catch (\Throwable) {
        }
        Auth::login($user, true);

        return to_route('home');
    }

    /**
     * 認証を行う
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }
        return back()->withErrors([
            'auth' => 'メールアドレスもしくはパスワードが違います。'
        ]);
    }

    /**
     * 認証しているユーザーをログアウトを行う
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
