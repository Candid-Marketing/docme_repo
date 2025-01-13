<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  mixed  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Check if the user is authenticated
        if (!$user) {
            return redirect()->route('login.show')->withErrors('You must be logged in to access this page.');
        }

        // Check if the user's role matches the required role
        if ($user->user_status != (int)$role) {
            // Redirect to different dashboards based on the user's role
            switch ($user->user_status) {
                case 1: // Super Admin
                    return redirect()->route('superadmin.dashboard')->withErrors('Unauthorized access to Super Admin dashboard');
                case 2: // Admin
                    return redirect()->route('admin.dashboard')->withErrors('Unauthorized access to Admin dashboard');
                case 3: // User
                    return redirect()->route('user.dashboard')->withErrors('Unauthorized access to User dashboard');
                default:
                    return redirect()->route('home')->withErrors('Unauthorized access');
            }
        }

        // Proceed to the next request if everything checks out
        return $next($request);
    }
}
