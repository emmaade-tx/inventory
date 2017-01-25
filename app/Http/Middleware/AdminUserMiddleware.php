<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AdminUserMiddleware
{
    /**
     * declaring constant signifying to compare to the role_id
     *
    */
    const REGULAR_USER = '1';
    const ADMIN_USER   = '2';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            if ($role_id === self::ADMIN_USER) {
                return $next($request);
            }

            return response()->json(['message' => 'User unauthorized due to invalid token'], 401);
        }
    }
}
