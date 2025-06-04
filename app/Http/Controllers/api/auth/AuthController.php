<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\addressRequest;
use App\Http\Requests\userRequest;
use App\Mail\RegisterMail;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    use apiResponse;

    public function register(userRequest $request)
    {
        $fields = $request->validated();
        $user = $fields;
        $user['password'] = bcrypt($user['password']);
        $user = User::create($user);
        if (!$user) {
            return $this->sendError('Register Failed');
        }
        // Mail::to($user->email)->send(new RegisterMail($user));
        return $this->apiResponse($user, __('messages.register'));
    }

    public function login()
    {
        $token = Auth::attempt(request(['email', 'password']));
        if (!$token) {
            return $this->sendError(__('messages.Error_login'), ['error' => __('messages.Error_login')]);
        }
        $success = $this->respondWithToken($token);

        return $this->apiResponse($success->original, __('messages.login'));
    }
    public function profile()
    {
        $user = User::with('addresses')->find(Auth::user()->id);
        if (!$user) {
            return $this->sendError('User Not Found');
        }
        return $this->apiResponse($user, 'Profile');
    }

    public function logout()
    {
        Auth::logout();

        return $this->apiResponse([], __('messages.logout'));
    }

    public function refresh()
    {
        $token = $this->respondWithToken(Auth::refresh());
        return $this->apiResponse($token->original, 'Refresh Successfully');
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }

    public function userCourses()
    {
        $user = user::with('courses')->find(Auth::user()->id);
        if (!$user) {
            return $this->sendError('user Not Found');
        }
        return $this->apiResponse($user, 'User Courses');
    }
}