<?php

namespace Absltcast\Http\Controllers\Admin;

use Absltcast\Series;
use Absltcast\lesson;
use Absltcast\Http\Controllers\Controller;
use Absltcast\Http\Requests\CreateLessonRequest;
use Absltcast\Http\Requests\CreateEditRequest;
use Illuminate\Http\Request;


class LessonsController extends Controller
{
    
    public function store(Series $series_by_id, CreateLessonRequest $request)
    {
        return $series_by_id->lessons()->create($request->all());
    }

    public function update(Series $series_by_id, Lesson $lesson, CreateEditRequest $request)
    {
        $lesson->update($request->all());
        return $lesson->fresh();
    }

    public function destroy(Series $series_by_id, Lesson $lesson)
    {
        //
        $lesson->delete();

        return response()->json(['status' => 'ok'], 200);
    }
}
