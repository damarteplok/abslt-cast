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
        //dd(is_null(auth()->user()->subscriptions));
       //$plans = ['plan_DaeJ4Ws8aYwghv', 'plan_DaeMKW8TVKvNZD'];
        //dd(!auth()->user()->subscribedToPlan('plan_DaeJ4Ws8aYwghv'));
        if($lesson->premium == 1)
        {
            // if(!auth()->user()->subscribedToPlan(['plan_DaeJ4Ws8aYwghv', 'plan_DaeMKW8TVKvNZD'])) {
            //     return redirect('subscribe');
            if(is_null(auth()->user()->subscriptions))
            {
                return redirect('subscribe');
            }
            //foreach ( $plans as $plan) {
            if (auth()->user()->subscriptions()->first()->stripe_plan == 'plan_DaeMKW8TVKvNZD' || auth()->user()->subscriptions()->first()->stripe_plan == 'plan_DaeJ4Ws8aYwghv' ) {
                return view('watch',[
                    'series' => $series,
                    'lesson' => $lesson
                ]);
            } 
                //dd('tes');
            return redirect('subscribe');
            //}
            // if(!auth()->user()->subscribedToPlan(['plan_DaeJ4Ws8aYwghv', 'plan_DaeMKW8TVKvNZD'])) {
            //     return redirect('subscribe');
            // }else {
            //     return view('watch',[
            //         'series' => $series,
            //         'lesson' => $lesson
            //     ]);        
            // }    
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
