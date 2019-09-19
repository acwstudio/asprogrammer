<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;

/**
 * Class Language
 *
 * @package App\Http\Middleware
 */
class Language
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
        //Define user's language
        if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == "ru") {
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        } else {
            $lang = config('app.fallback_locale');
        }

        // Check if the first segment matches a language code
        if (!array_key_exists($request->segment(1), config('translatable.locales')) ) {

            // Store segments in array
            $segments = $request->segments();

            // Set the default language code as the first segment
//            $segments = array_prepend($segments, config('app.fallback_locale'));
            $segments = Arr::prepend($segments, $lang);

            // Redirect to the correct url
            return redirect()->to(implode('/', $segments));
        }

        return $next($request);
    }
}
