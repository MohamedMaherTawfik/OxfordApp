<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\userApiRequest;
use App\Models\applyTeacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use apiResponse;

    public function register(userApiRequest $request)
    {
        $fields = $request->validated();
        $fields['password'] = bcrypt($fields['password']);
        $fields['photo'] = $request->file('photo')->store('photos', 'public');
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => $fields['password'],
            'role' => $fields['role'],
            'photo' => $fields['photo']
        ]);
        if ($user->role === 'teacher') {
            $fields['cv'] = $request->file('cv')->store('CVs', 'public');
            $fields['certificate'] = $request->file('certificate')->store('certificatess', 'public');
            applyTeacher::create([
                'user_id' => $user->id,
                'cv' => $fields['cv'],
                'certificate' => $fields['certificate'],
                'topic' => $fields['topics'],
                'phone' => $fields['phone'],
            ]);
        }

        return $this->success($user, __('messages.register'));
    }

    public function login()
    {
        $credentials = request(['email', 'password']);
        $token = Auth::guard('api')->attempt($credentials);

        if (!$token) {
            return $this->unauthorized(__('messages.Error_login'));
        }

        $success = $this->respondWithToken($token);

        return $this->success($success->original, __('messages.login'));
    }


    public function profile()
    {
        $user = User::find(Auth::guard('api')->id());

        if (!$user) {
            return $this->unauthorized('User Not Found');
        }

        return $this->success($user, 'Profile');
    }

    public function logout()
    {
        Auth::guard('api')->logout();

        return $this->success([], __('messages.logout'));
    }

    public function refresh()
    {
        $token = $this->respondWithToken(Auth::guard('api')->refresh());

        return $this->success($token->original, 'Refresh Successfully');
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
            'user' => Auth::guard('api')->user(),
        ]);
    }


    public function userCourses()
    {
        $user = user::with('courses')->find(Auth::user()->id);
        if (!$user) {
            return $this->unauthorized('user Not Found');
        }
        return $this->success($user, 'User Courses');
    }
}