<?php

namespace Absltcast\Http\Controllers\Admin;

use Absltcast\Portfolio;
use Absltcast\GalleryPortfolio;
use Absltcast\Http\Requests\CreatePortfolioRequest;
use Absltcast\Http\Requests\UpdatePortfolioRequest;
use Illuminate\Http\Request;
use Absltcast\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('admin.portfolio.index')->with('portfolios', Portfolio::all());
    }
    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(CreatePortfolioRequest $request)
    {
        return $request->storePortfolio();
    }

    public function edit($id)
    {
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit')->with('portfolio', $portfolio);
    }

    public function update(UpdatePortfolioRequest $request, $id)
    {
        return $request->updatePortfolio($id);
    }

    public function destroy($id)
    {
        $p = Portfolio::find($id);
        foreach($p->galleries as $photo)
        {
            $photo->forceDelete();
        }
        $p->delete();
        return redirect()->route('portfolio.index');
    }
}
