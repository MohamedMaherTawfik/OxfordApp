<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\userRequest;
use App\Models\User;
use App\Http\Requests\teacherRequest;
use App\Models\applyTeacher;
use App\Http\Requests\loginRequest;

class AuthController extends Controller
{
    public function signUp()
    {
        return view('auth.register');
    }
    public function register(userRequest $request)
    {
        $validatedData = $request->validated();
        // dd($validatedData);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
        if ($validatedData['role'] == 'teacher') {
            $validatedData['role'] = 'user';
            $user = User::create($validatedData);
            Auth::login($user);
            return redirect('/teacher');
        }
        $user = User::create($validatedData);
        Auth::login($user);

        return redirect('/');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function signin(loginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            } elseif (Auth::user()->role == 'teacher') {
                request()->session()->regenerate();
                return redirect()->route('home');
            }
            request()->session()->regenerate();
            return redirect()->route('admin.index');
        }


        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function teacherRegister()
    {
        return view('auth.teacherLogin');
    }
    public function teacher(teacherRequest $request)
    {
        $validatedData = $request->validated();
        applyTeacher::create([
            'user_id' => Auth::id(),
            'topic' => $validatedData['topic'],
            'phone' => $validatedData['phone'],
            'cv' => $request->file('cv')->store('cv', 'public'),
            'certificate' => $request->file('certificate') ? $request->file('certificate')->store('certificates', 'public') : null,
        ]);
        return view('auth.teacherApplied');
    }
}