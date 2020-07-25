<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;


class teacherRoute extends BaseMiddleware
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
        $logged = Auth::user();

        // return response()->json(['txt' => $logged->profile]);
        if($logged->profile != 'teacher'){
            return response()->json(['error' => 'access denied'], 401);
        }


        return $next($request);
    }
}
