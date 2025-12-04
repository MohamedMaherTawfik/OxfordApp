<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();
            
            // Check if user is a teacher
            if ($user->role == 'teacher') {
                // If user has an applyTeacher record, check if it's accepted
                if ($user->applyTeacher) {
                    if ($user->applyTeacher->status == 'accepted') {
                        return $next($request);
                    }
                } else {
                    // If no applyTeacher record exists, allow access (teacher created directly by admin)
                    return $next($request);
                }
            }
        }

        abort(403, 'Unauthorized action.');
    }
}
