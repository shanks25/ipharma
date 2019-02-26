<?php

namespace App\Http\Middleware;

use Closure;
use Epharma\Model\User;
use Auth;

class AdminUser
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
        $user_id = Auth::id();

        if ( !User::find($user_id)->isRole('Admin') ) {
            return redirect('/');
        }

        return $next($request);
    }
}
