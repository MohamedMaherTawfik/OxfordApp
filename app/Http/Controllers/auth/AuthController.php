<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\userRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function signUp()
    {
        return view('auth.signup');
    }
    public function register(userRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
    }
}
