<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{

    public function signUp(SignupRequest $request)
    {
        $_user = User::create([
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::attempt($request->only(['nickname', 'password']), true);

        return UserResource::make($_user);
    }

    public function signIn()
    {
        if (Auth::check()) {
            return new UserResource(Auth::user());
        } else {
            return response()->json([
                'message' => 'Unauthenticated'
            ]);
        }
    }

    public function logIn(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['nickname', 'password']), $request->remember)) {
            return UserResource::make(Auth::user());
        }

        return response()->json([
            'errors' => [
                'password' => [
                    __('Can\'t login. Check your credentials and try again.')
                ]
            ]
        ], 401);
    }

    public function logOut(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }
}
