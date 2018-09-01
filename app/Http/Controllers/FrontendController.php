<?php

namespace Absltcast\Http\Controllers;

use Illuminate\Http\Request;
use Absltcast\Series;
use Absltcast\post;
use Absltcast\Portfolio;

class FrontendController extends Controller
{
    //

    public function welcome()
    {
    	return view('welcome')->withSeries(Series::all())
    	->with('posts', post::orderBy('created_at', 'desc')->take(3)->get());
    }
    public function series(Series $series)
    {
    	return view('series')->withSeries($series);
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
    public function portfolioListing()
    {
        return view('portfolio')->with('portfolios', Portfolio::all());
    }
    public function portfolioSingle($slug)
    {
        $p = Portfolio::where('slug', $slug)->first();
        return view ('portfolio-single')->with('portfolio', $p)
        ->with('portfolios', Portfolio::orderBy('created_at', 'desc')->take(4)->get());
    }
}
