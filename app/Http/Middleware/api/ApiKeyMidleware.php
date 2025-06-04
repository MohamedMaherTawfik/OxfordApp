<?php

namespace App\Http\Middleware;

use App\Http\Controllers\auth\apiResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMidleware
{
    use apiResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('api-key');

        if ($apiKey==env('API_KEY')) {
            return $next($request);
        }
        return $this->sendError('Invalid Api Key');
    }
}
