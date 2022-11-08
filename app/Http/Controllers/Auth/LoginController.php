<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo()
    {
        $role = Auth()->user()->user_type;
        if ($role == 'admin') {
            return 'admin/dashboard';
        } elseif ($role == 'manager') {
            return 'manager/dashboard';
        } elseif ($role == 'general_manager') {
            return 'general/dashboard';
        } elseif ($role == 'employee') {
            return 'employee/dashboard';
        } else {
            return back();
        }
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

    public function authenticated(Request $request, $user)
    {
        Employee::query()->update(['days' => round(date('L') == 1 ? (21/366)*(date('z') + 1) : (21/365)*(date('z') + 1),2)]);

        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);
    }
}
