<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class CheckEmailVerifiedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return string
     */

    public function handle($request, Closure $next)
    {
        if (!auth()->user()->email_verified_at) {
            Session::flash('error', 'Please Verify Your Email Before Using Our Website');
            return redirect()->route('home');
        }

        return $next($request);
    }
}
