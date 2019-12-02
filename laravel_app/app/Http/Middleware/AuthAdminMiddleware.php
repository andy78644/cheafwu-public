<?php

namespace App\Http\Middleware;

use Closure;

class AuthAdminMiddleware
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
        $is_allow_access = false;
        $manager_id = session()->get('manager_id');
        if(!is_null($manager_id)){
            $is_allow_access =true;
        }
        if(!$is_allow_access ){
            return redirect()->to('/');
        }
        return $next($request);
    }
}
