<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // If the user is already authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Redirect the user to their dashboard based on their role
            switch ($user->user_status) {
                case 1: // Super Admin
                    return route('superadmin.dashboard');
                case 2: // Admin
                    return route('admin.dashboard');
                case 3: // Regular User
                    return route('user.dashboard');
                default:
                    return route('home'); // Default fallback
            }
        }

        // If the user is not authenticated, redirect to the login page
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
