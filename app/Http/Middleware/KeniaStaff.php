<?php

namespace App\Http\Middleware;

use App\Enum\UserType;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class KeniaStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // check auth user role (I don't know how you can implement this for yourself, this is just for me)
            //dd(Auth::user()->roles[0]->name, UserType::EXHIBITOR->value);
            if (Auth::user()->roles[0]->name == UserType::EXHIBITOR->value) {
                return redirect()->to('portal/exhibitor');
            } elseif (Auth::user()->roles[0]->name == UserType::DELEGATE->value) {
                return redirect()->to('portal/delegate');
            } else {
                return $next($request);
            }
        }

        return $next($request); // for users
    }
}
