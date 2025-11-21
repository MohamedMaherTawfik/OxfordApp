<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('currentUser')) {
    function currentUser()
    {
        return Auth::guard('api')->check() ? Auth::guard('api')->user() : Auth::guard('web')->user();
    }
}
