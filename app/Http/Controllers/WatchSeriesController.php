<?php

namespace Absltcast\Http\Controllers;

use Absltcast\Series;
use Absltcast\Lesson;
use Illuminate\Http\Request;

class WatchSeriesController extends Controller
{
    //
    public function index(Series $series)
    {
        
        if($series->lessons->first() == null)
        {
            return redirect()->back();
        } else {
            return redirect()->route('series.watch', 
            [
                'series' => $series->slug, 
                'lesson' => $series->lessons->first()->id
            ]);
        }
    }

    public function showLesson(Series $series, Lesson $lesson)
    {
        

        return view('watch',[

            'series' => $series,
            'lesson' => $lesson

        ]);
    }
}
