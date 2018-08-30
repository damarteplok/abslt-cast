<?php

namespace Absltcast\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function terms()
    {
        return view('terms');
    }
    public function contact()
    {
        return view('contact');
    }
    public function message()
    {
        return redirect()->back();
    }
}
