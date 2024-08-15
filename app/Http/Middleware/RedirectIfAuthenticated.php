<?php

namespace App\Http\Middleware;

use App\Enum\UserType;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @param string|null ...$guards
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        /*foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                $userType = Auth::user()->user_type;

                if ($userType == UserType::DELEGATE) {
                    return redirect(RouteServiceProvider::DELEGATE_HOME);
                }

                if ($userType == UserType::EXHIBITOR) {
                    return redirect(RouteServiceProvider::EXHIBITOR_HOME);
                }

                return redirect(RouteServiceProvider::HOME);
            }
        }*/

        return $next($request);
    }
}
