<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

class LoginController extends Controller {
    /**
     * Checks if the given credentials are correct to log in user.
     */
    public function authenticate(array $credentials, bool $remember = false): bool {
        return Auth::attempt($credentials, $remember);
    }

    /**
     * Shows the login view.
     */
    public function create() {
        return view('Auth.login');
    }

    /**
     * Logins in the user by the credentials and redirects to home page.
     */
    public function store(LoginRequest $request) {
        if (!$this->authenticate([
            'email' => $request->email,
            'password' => $request->password
        ], (bool) $request->remember_me)){
            return back()
                ->withInput()
                ->withErrors(['error' => 'Login failed, Invalid email or password!']);
        }

        return redirect(route('home'))->with('success', 'Login successful.');
    }

    /**
     * Logs out the user and redirects to login page.
     */
    public function destroy() {
        Auth::logout();

        return redirect(route('login.create'))->with('success', 'Logout successful.');
    }
}
