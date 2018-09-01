<?php

namespace Absltcast\Http\Controllers;

use Illuminate\Http\Request;
use Absltcast\Contact;

class HomeController extends Controller
{
   
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
