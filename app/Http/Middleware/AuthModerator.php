<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Response;
use View;

class AuthModerator
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
        // if (!Auth::check()) {
        //     abort(403, 'Unauthorized action.');
        // }

        // If the user is not moderator, show a different  page.
        if (Auth::user()->role_id != 1) {
            abort(403, 'Unauthorized action.');
        }

        // The user is moderator; continue with the request.
        return $next($request);
     
    }
}
