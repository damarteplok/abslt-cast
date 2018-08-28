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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Series $series_by_id, CreateLessonRequest $request)
    {
        //


        return $series_by_id->lessons()->create($request->all());

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Series $series_by_id, Lesson $lesson, CreateEditRequest $request)
    {
        //
        $lesson->update($request->all());

        return $lesson->fresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series_by_id, Lesson $lesson)
    {
        //
        $lesson->delete();

        return response()->json(['status' => 'ok'], 200);
    }
}
