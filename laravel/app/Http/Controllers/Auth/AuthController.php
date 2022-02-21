<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\UseCases\LoginUserUseCase;
use App\UseCases\LogoutUserUseCase;
use App\UseCases\RegisterUserUseCase;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    const REQUEST_VALUE_PREFIX = 'user_';

    private LoginUserUseCase $loginUserUseCase;

    private LogoutUserUseCase $logoutUserUseCase;

    private RegisterUserUseCase $registerUserUseCase;

    public function __construct(
        LoginUserUseCase $loginUserUseCase,
        LogoutUserUseCase $logoutUserUseCase,
        RegisterUserUseCase $registerUserUseCase,
    ) {
        $this->loginUserUseCase = $loginUserUseCase;
        $this->logoutUserUseCase = $logoutUserUseCase;
        $this->registerUserUseCase = $registerUserUseCase;
    }

    /**
     * ユーザーを作成する
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $request_data = $request->all();
        if (empty($request_data['is_remember'])) {
            $request_data['is_remember'] = false;
        }
        $this->registerUserUseCase->execute($request_data);
        $request->session()->regenerate();

        return to_route('home');
    }

    /**
     * ユーザー認証
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $request_data = $request->all();
        if (empty($request_data['is_remember'])) {
            $request_data['is_remember'] = false;
        }
        $result = $this->loginUserUseCase->execute($request_data);
        if ($result['is_fail']) {
            return response()->fail();
        }
        $request->session()->regenerate();

        return to_route('home');
    }

    /**
     * 認証しているユーザーをログアウトを行う
     */
    public function logout(): RedirectResponse
    {
        $this->logoutUserUseCase->execute();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('/login');
    }
}
