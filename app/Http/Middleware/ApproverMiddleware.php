<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Ticket;
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
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        // Check if the user is an approver (role_id 2)
        if ($user->role_id == 1) {
            // Check if the user is in the same department as the requester
           
                
            
        }

        // User is not authorized
        return abort(403, 'Unauthorized');
    }
}
