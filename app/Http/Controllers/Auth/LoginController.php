<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

class LoginController extends Controller {
    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('Auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request) {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        dd('logout');
    }
}
