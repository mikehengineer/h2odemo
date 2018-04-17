<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        if (!auth()->attempt(request(['name', 'password']))) {
            return back()->withErrors([
                'message' => 'Login credentials invalid.']);
        }

        return redirect('/home')->with('message', 'You\'re logged in!');

    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
