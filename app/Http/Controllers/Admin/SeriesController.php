<?php

namespace Absltcast\Http\Controllers\Admin;


use Absltcast\Http\Controllers\Controller;
use Absltcast\Http\Requests\CreateSeriesRequest;
use Absltcast\Http\Requests\UpdateSeriesRequest;
use Illuminate\Http\Request;
use Absltcast\Series;



class SeriesController extends Controller
{
   
    public function index()
    {
        return view('admin.series.all')->withSeries(Series::all());
    }


    public function create()
    {
        return view('admin.series.create');
    }


    public function store(CreateSeriesRequest $request)
    {
       return $request->uploadSeriesImage()
                ->storeSeries();
    }

    public function show(Series $series)
    {

        return view('admin.series.index')->withSeries($series);
    }

    public function edit(Series $series)
    {
        return view('admin.series.edit')->withSeries($series);
    }

    public function update(UpdateSeriesRequest $request, Series $series)
    {
        $request->updateSeries($series);   
        session()->flash('success', 'Successfully upated Series');
        return redirect()->route('series.index');
    }

    public function destroy(Series $series)
    {
        foreach($series->lessons as $s){
            $s->forceDelete();
        }
        $series->delete();
        return redirect()->back();

    }
}
