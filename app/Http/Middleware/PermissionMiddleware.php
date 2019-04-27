<?php

namespace App\Http\Middleware;
use Spatie\Permission\Exceptions\UnauthorizedException;

use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (app('auth')->guest()) {
            // return response()->json(['permission' => false, 'message' => 'Not Logged In'], 403);
            throw UnauthorizedException::notLoggedIn();
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        foreach ($permissions as $permission) {
            if (app('auth')->user()->can($permission)) {
                return $next($request);
            }
        }

        return response()->json(['permission' => false, 'message' => 'User does not have the right permissions.'], 403);
    }
}
