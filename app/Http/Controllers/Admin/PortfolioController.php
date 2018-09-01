<?php

namespace Absltcast\Http\Controllers\Admin;

use Absltcast\Portfolio;
use Absltcast\GalleryPortfolio;
use Illuminate\Http\Request;
use Absltcast\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.portfolio.index')->with('portfolios', Portfolio::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [

            'title' => 'required',
            'featured' => 'required|image|mimes:jpg,jpeg,bmp,png|max:2000',
            'detail' => 'required',
            'date' => 'required',
            'skill' => 'required',
            'address' => 'required',
            'client' => 'required'

        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/portfolios', $featured_new_name);

        $p = Portfolio::create([

            'title' => $request->title,
            'featured' => 'uploads/portfolios/' . $featured_new_name,
            'detail' => $request->detail,
            'date' => $request->date,
            'skill' => $request->skill,
            'address' => $request->address,
            'client' => $request->client,
            'slug' => str_slug($request->title)

        ]);

        return redirect()->route('portfolio.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit')
        ->with('portfolio', $portfolio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'date' => 'required',
            'skill' => 'required',
            'address' => 'required',
            'client' => 'required'

        ]);

        $p = Portfolio::find($id);

        if($request->hasFile('featured'))
        {
            $img = $request->featured;
            $img_new_name = time() . $img->getClientOriginalName();
            $img->move('uploads/products/', $img_new_name);
            $p->featured = 'uploads/products/' . $img_new_name;
        }

        $p->title = $request->title;
        $p->detail = $request->detail;
        $p->date = $request->date;
        $p->skill = $request->skill;
        $p->address = $request->address;
        $p->client = $request->client;

        $p->save();

        return redirect()->route('portfolio.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $p = Portfolio::find($id);
        foreach($p->galleries as $photo)
        {
            $photo->forceDelete();
        }
        $p->delete();
        return redirect()->route('portfolio.index');
    }
}
