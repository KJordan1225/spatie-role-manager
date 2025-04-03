<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class EnsureProfileOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Assuming the user profile ID is passed as a route parameter 'profile'
        $profileId = $request->route('profile');

        if (!Auth::check() || Auth::user()->id != $profileId) {
            // If the user is not logged in or does not own the profile, redirect or abort
            return redirect('home')->with('error', 'You do not have permission to edit this profile.');
        }

        return $next($request);
    }

}
