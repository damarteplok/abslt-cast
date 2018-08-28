<?php

namespace Absltcast\Http\Controllers;

use Illuminate\Http\Request;
use Absltcast\Series;

class FrontendController extends Controller
{
    //

    public function welcome()
    {
    	return view('welcome')->withSeries(Series::all());
    }

    public function series(Series $series)
    {
    	return view('series')->withSeries($series);
    }
}
