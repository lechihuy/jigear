<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\LoginRequest;

class LoginController extends Controller
{   
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Show the login form.
     * 
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle to attempt login.
     * 
     * @param \App\Http\Requests\Admin\LoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        if (Auth::attempt($this->credentials($request), $request->filled('remember'))) {
            $request->session()->regenerate();

            return response()->json(['message' => __('auth.succeeded')]);
        }

        return response()->json(['message' => __('auth.failed')], 401);
    }

    /**
     * Get the credentials for the attempt.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'admin';

        return $credentials;
    }

    /**
     * Logout the current authenticated user.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.auth.login');
    }
}
