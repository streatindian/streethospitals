<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (request()->is('provider/*')) {
            return route('user.login');
        }else if (request()->is('admin/*')) {
            return route('login');
        }else if (!$request->expectsJson()) {
            return route('login');
        }
    }
}
