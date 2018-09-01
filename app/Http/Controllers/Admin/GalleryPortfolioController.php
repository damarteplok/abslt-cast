<?php

namespace Absltcast\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Absltcast\Http\Controllers\Controller;
use Absltcast\Portfolio;
use Absltcast\GalleryPortfolio;

class GalleryPortfolioController extends Controller
{
    //
    public function list($id)
    {
    	$galleries = GalleryPortfolio::where('portfolio_id', $id)->get();
        $portfolioId = $id;
    	return view('admin.galleryPortfolio.index')
    	->with('galleries', $galleries)
        ->with('portfolioId', $portfolioId);
    }

    public function create($id)
    {
    	return view('admin.galleryPortfolio.create')->with('id', $id);
    }

    public function store(Request $request)
    {

        foreach($request->filename as $photo)
        {
            $photo_new_name = time().$photo->getClientOriginalName();

            $photo->move('uploads/galleryPortfolio', $photo_new_name);

            
            GalleryPortfolio::create([
                'portfolio_id' => $request->portfolio_id,
                'filename' => 'uploads/galleryPortfolio/' . $photo_new_name,
            ]);
        }

        return redirect()->route('galleryportfolio.list', ['id' => $request->portfolio_id]);

        
    }

    public function destroy($id)
    {
    	GalleryPortfolio::destroy($id);
    	return redirect()->back();
    }


}
