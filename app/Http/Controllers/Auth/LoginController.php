<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\UserActivity;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\TicketActivity;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'Tickets';
    protected function authenticated(Request $request, $user)
    {
        if ($user->first_login !== '1') {
            // Set the first_login field to false to indicate that the user has changed their password
            $user->update(['first_login' => false]);
    
            // Redirect the user to the password change page
            return redirect()->route('profile.firstlogin');
        }
    
        if ($user->role_id == 2) {
            return redirect()->route('approver.index');
        } elseif ($user->role_id == 3) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('ticket.index');
        }
    }
    public function logout(Request $request)
    {
        // Get the currently authenticated user (if any).
        $user = Auth::user();

        if ($user) {
            // Update user activity for the user, if applicable.
            $userActivity = UserActivity::where('user_id', $user->id)
                ->whereNull('logout_time')
                ->first();

            if ($userActivity) {
                $userActivity->update([
                    'logout_time' => now(),
                ]);
            }
        }

        // Perform the logout.
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
