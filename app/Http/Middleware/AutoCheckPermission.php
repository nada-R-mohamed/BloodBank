<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AutoCheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        $routeName = $request->route()->getName();

        $permission = Permission::whereRaw("FIND_IN_SET ('$routeName',route)")->first();

        if( $permission ) {
            if(! $request->user('web')->can($permission->name)) {
                abort(403);
            }
        }
        return $next($request);
    }
}
