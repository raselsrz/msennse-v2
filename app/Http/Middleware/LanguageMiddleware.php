<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Language;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('local')) {
            $defaultLanguage = Language::where('default_language', 'on')->first();
            if ($defaultLanguage) {
                Session::put('local', $defaultLanguage->iso_code);
            } else {
                Session::put('local', 'en'); // Fallback to English
            }
        }

        App::setLocale(Session::get('local'));
        return $next($request);
    }
}

