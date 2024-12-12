<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(2); // Assuming 'api/{lang}/{resource}'

        if (in_array($locale, ['en', 'ru', 'uz', 'oz'])) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
