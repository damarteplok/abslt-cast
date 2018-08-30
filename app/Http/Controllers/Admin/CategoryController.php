<?php

namespace Absltcast\Http\Controllers\Admin;

use Absltcast\category;
use Absltcast\Http\Controllers\Controller;
use Absltcast\Http\Requests\CreateCategoryRequest;
use Absltcast\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Session;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.category.index')->with('categories', category::all());
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
    public function store(CreateCategoryRequest $request)
    {   

        return $request->storeCategory();
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
    public function update(UpdateCategoryRequest $request,category $category)
    {
        //
        $category->update($request->all());
        return $category->fresh();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
        
    {
        //
        $categories = category::find($category);
        foreach($categories->posts as $c)
        {
            $c->forceDelete();
        }

        $categories->delete();

        return response()->json(['status' => 'ok'], 200);

    }
}
