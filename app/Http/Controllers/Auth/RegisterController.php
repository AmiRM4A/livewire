<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller {
    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('Auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request) {
        dd($request->all());
    }
}
