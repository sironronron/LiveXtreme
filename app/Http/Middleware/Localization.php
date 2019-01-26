<?php

namespace App\Http\Middleware;

use Closure;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Session::has('locale')) {
            \App::setLocal(\Session::get('locale'));
            /*Default Language in locale is English*/
            /*Change langauge by Session*/
        }
        return $next($request);
    }
}
