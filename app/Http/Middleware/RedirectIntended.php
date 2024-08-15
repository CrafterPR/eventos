<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIntended
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Check if the current route is one of the excluded routes
        if ($request->routeIs('exclude.route1', 'exclude.route2') && (auth()->user_type != 'delegate' || auth()->user_type != 'exhibitor')) {
            // Handle these routes differently, e.g., return a response or redirect elsewhere
            redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }

}
