<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$allowedTypes): Response
    {
        $user = auth()->user();

        if ($user && in_array($user->user_type, $allowedTypes)) {
            return $next($request);
        }
        return redirect()->route('forbidden');   
     }
}
