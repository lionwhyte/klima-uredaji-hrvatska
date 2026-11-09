<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\CookieConsent;

class CheckCookieConsent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        dd("hello");
        $identifier = $request->cookie('consent_identifier');
        $consent = $identifier ? CookieConsent::where('identifier', $identifier)->first() : null;

        if (!$consent || !$consent->consent) {
            // Handle non-consented user (redirect, show a message, etc.)
            // For example, you might redirect to a page explaining the need for consent.
            return redirect()->route('cookie.consent');
        }

        return $next($request);
    }
}
