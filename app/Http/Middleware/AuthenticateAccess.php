<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;


class AuthenticateAccess
{

    public function handle($request, Closure $next, $guard = null)
    {
        $validSecret = explode(',', env('ACCEPTED_SECRETS'));
        if (in_array($request->header('Authorization'), $validSecret)){
            return $next($request);
        }
       return abort(Response::HTTP_UNAUTHORIZED);
    }
}
