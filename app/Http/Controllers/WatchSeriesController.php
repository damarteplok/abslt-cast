<?php

namespace Absltcast\Http\Controllers;


use Absltcast\Series;
use Absltcast\Lesson;
use Illuminate\Http\Request;

class WatchSeriesController extends Controller
{
    public function index(Series $series)
    {   
        
        $user = auth()->user();

        if($user->hasStartedSeries($series))
        {
            return redirect()->route('series.watch', 
            [
                'series' => $series->slug, 
                'lesson' => $user->getNextLessonToWatch($series)
            ]);
        

        }

            return redirect()->route('series.watch', 
            [
                'series' => $series->slug, 
                'lesson' => $series->lessons->first()->id
            ]);
        
    }

    public function showLesson(Series $series, Lesson $lesson)
    {
        if($lesson->premium == 1)
        {
            if(!auth()->user()->subscribedToPlan(['monthly', 'yearly'])) {
                return redirect('subscribe');
            }else {
                return view('watch',[
                    'series' => $series,
                    'lesson' => $lesson
                ]);        
            }    
        }
        
        
        return view('watch',[
            'series' => $series,
            'lesson' => $lesson
        ]);
    }

    public function completeLesson(Lesson $lesson)
    {
        auth()->user()->completeLesson($lesson);
        return response()->json([
            'status' =>'ok'
        ]);
    }
}
