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
        return redirect()->route('series.watch', 
        [
            'series' => $series->slug, 
            'lesson' => $series->lessons->first()->id
        ]);
    }

    public function showLesson(Series $series, Lesson $lesson)
    {
        
        dd($lesson);

        return view('watch',[

            'series' => $series,
            'lesson' => $lesson

        ]);
    }
}
