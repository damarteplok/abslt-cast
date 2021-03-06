<?php

namespace Absltcast\Http\Controllers;

use Illuminate\Http\Request;
use Absltcast\Series;
use Absltcast\post;
use Absltcast\Portfolio;
use Absltcast\Contact;

class FrontendController extends Controller
{

    public function welcome()
    {
    	return view('welcome')->withSeries(Series::all())
    	->with('posts', post::orderBy('created_at', 'desc')->take(3)->get());
    }
    public function series(Series $series)
    {
        $series->count = $series->count + 1;
        $series->save();
        
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
    public function course()
    {
        return view('course');
    }
    public function courseIndex($key, $search)
    {
        if($key == 'latest' && $search == 'Search')
        {
            $data = Series::orderBy('id')->paginate(5);
            return response()->json($data);

        }elseif($key == 'latest' && $search != 'Search')
        {
            $data = Series::orderBy('id')->where('title', 'like', '%' .$search . '%')->paginate(5);
            return response()->json($data);

        }elseif($key == 'popular' && $search == 'Search'){

            $data = Series::orderBy('count', 'desc')->paginate(5);
            return response()->json($data);

        }elseif($key == 'top' && $search == 'Search'){
            
            $data = Series::orderBy('id')->paginate(5);
            return response()->json($data);

        }elseif($key == 'popular' && $search != 'Search')
        {
            $data = Series::orderBy('count', 'desc')->where('title', 'like', '%' .$search . '%')->paginate(5);
            return response()->json($data);

        }elseif($key == 'top' && $search != 'Search')
        {
            $data = Series::orderBy('id')->where('title', 'like', '%' .$search . '%')->paginate(5);
            return response()->json($data);
        }
        
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
