<?php

namespace Absltcast\Http\Controllers;

use Illuminate\Http\Request;
use Absltcast\Contact;

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
    public function message(Request $request)
    {

        $this->validate($request, [

            'name' => 'required',
            'email' => 'required',
            'message' => 'required'

        ]);

        Contact::create([

            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message

        ]);

        return response()->json(['status' => 'ok'], 200);
    }
}
