<?php

namespace Absltcast\Http\Controllers;

use Illuminate\Http\Request;
use Absltcast\Series;
use Absltcast\post;

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
}
