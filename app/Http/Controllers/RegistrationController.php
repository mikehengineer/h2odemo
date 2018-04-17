<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
                'password' => 'required|confirmed',
                'email' => 'required'
        ]);

        $user = User::create([
                'name' => request('name'),
                'password' => bcrypt(request('password')),
                'email' => request('email')
        ]);

        auth()->login($user);
        \Mail::to($user)->send(new Welcome);
        session()->flash('message', 'Thank you for registering. A confirmation email has been sent to ' . $user->email );

        return redirect('/home');
    }
}
