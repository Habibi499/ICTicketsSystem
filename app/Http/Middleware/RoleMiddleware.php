<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class ApproverMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roleIds)
    {
       
            $user = Auth::user();
    
            if ($user && $user->role_id === 1) { // Assuming 2 is the role ID for an approver
                return $next($request);
            }
    
            return $next($request);
        }
    
}
