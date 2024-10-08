<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (in_array($request->segment(1), Language::where("status", 1)->pluck('slug')->toArray(), true)) {
            App::setLocale($request->segment(1));
            Session::put('locale', $request->segment(1));
        } else {
            App::setLocale('en');
            Session::put('locale', 'en');
        }
        return $next($request);
    }
}
