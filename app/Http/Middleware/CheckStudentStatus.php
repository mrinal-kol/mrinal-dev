<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStudentStatus
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status != 1) {
            Auth::logout();
            return redirect('/login')->withErrors(['email' => 'Your account is inactive.']);
        }

        return $next($request);
    }
}