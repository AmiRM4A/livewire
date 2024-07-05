<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Throwable;
use App\Models\User;
use App\Exceptions\AuthException;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller {
    /**
     * Shows the register view.
     */
    public function create() {
        return view('Auth.register');
    }

    /**
     * Registers the new user and redirects to login page.
     */
    public function store(RegisterRequest $request) {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            if (!$user) {
                throw new AuthException('Unable to create user!');
            }

            Auth::login($user);

            return redirect(route('login.create'))->with('success', 'Registration successful.');
        } catch (Throwable $e){
            return back()
                ->withInput()
                ->withErrors(['error' => config('app.debug') ? $e->getMessage() : 'Registration failed!']);
        }
    }
}
