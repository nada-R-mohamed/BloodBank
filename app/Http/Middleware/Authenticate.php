<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponses;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    use ApiResponses;

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
//    protected function unauthenticated($request, array $guards)
//    {
//        if(! Auth::guard('sanctum')->check()) {
//            abort($this->responseError(['error' => 'Unauthenticated.'], statusCode: 401));
//        }
//    }
}
