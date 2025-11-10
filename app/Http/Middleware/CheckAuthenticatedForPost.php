<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuthenticatedForPost
{
    public function handle(Request $request, Closure $next)
    {
        // If it's a POST request and the user is not authenticated
        if ($request->isMethod('post') && !Auth::check()) {
            // Just in case: destroy any remaining session data
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Redirect to home/login page with message
            return redirect('/')
                ->with('error', 'Session expired, please login again.');
        }

        return $next($request);
    }
}
