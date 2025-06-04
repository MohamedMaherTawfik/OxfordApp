<?php

namespace App\Http\Middleware;

use App\Http\Controllers\auth\apiResponse;
use App\Models\Courses;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class belongTo
{
    use apiResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Courses::where('user_id', auth()->user()->id)){
            return $this->sendError('Unauthorized');
        }
        return $next($request);
    }
}
