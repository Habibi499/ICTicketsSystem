<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\UserActivity;

class RecordLoginMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (Auth::check()) {
            // User is logged in.
            $user = Auth::user();

            // Check if there is an active session record.
            $activeSession = UserActivity::where('user_id', $user->id)
                ->whereNull('logout_time')
                ->first();

            if (!$activeSession) {
                // If no active session exists, create a new record for login.
                UserActivity::create([
                    'user_id' => $user->id,
                    'login_time' => now(),
                ]);
            }
        } elseif (Auth::guard()->check()) {
            // User is not authenticated, but there is an authenticated guard.
            // You can handle this case if needed.
        } else {
            // User is not logged in.
            // You can handle this case if needed.
        }

        return $response;
    }
}
