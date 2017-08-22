<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware.php
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
        if($user = Auth::user())
        {
            if(! $user->inRole('Admin'))
            {
                return redirect('administration')->withInput()->withErrors(array('message' => 'You are not admin user!'));
            }
        }
        return $next($request);
    }
}
