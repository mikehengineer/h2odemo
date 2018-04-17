<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.welcome');
    }

    public function info()
    {
        return view('pages.info');
    }

    public function purchase()
    {
        return view('pages.purchase');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendContact(){

        return redirect('/contact')->with('contactmessage', 'Email has been sent!');
    }

}
