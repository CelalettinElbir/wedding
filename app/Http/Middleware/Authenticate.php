<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

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



        if (!$request->expectsJson()) {
            $path = ["edit", "login"];
            foreach ($path as $item) {
                if ($request->routeIs("company." . $item)) {
                    return route('company.login');
                }
            }

            return route('user.login');
        }
    }
}
