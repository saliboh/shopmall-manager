<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $userRole = $request->user();

        if($userRole && $userRole->count() > 0)
        {
            $userRole = $userRole->role;
            $checkRole = 0;
            if($userRole == $role && $role == User::ROLES['super-admin'])
            {
                $checkRole = 1;
            }
            elseif($userRole == $role && $role ==  User::ROLES['shop-manager'])
            {
                $checkRole = 1;
            }
            elseif($userRole == $role && $role ==  User::ROLES['store-owner'])
            {
                $checkRole = 1;
            }

            if($checkRole == 1)
                return $next($request);
            else
               return abort(401);
        }
        else
        {
            return redirect('login');
        }
    }
}
