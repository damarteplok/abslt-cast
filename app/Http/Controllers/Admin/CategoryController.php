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
 
    public function index()
    {
        //
        return view('admin.category.index')->with('categories', category::all());
    }

    public function store(CreateCategoryRequest $request)
    {   

        return $request->storeCategory();
    }

    public function update(UpdateCategoryRequest $request,category $category)
    {
        //
        $category->update($request->all());
        return $category->fresh();

    }

    public function destroy($category)
        
    {
        
        $categories = category::find($category);
        foreach($categories->posts as $c)
        {
            $c->forceDelete();
        }

        $categories->delete();

        return response()->json(['status' => 'ok'], 200);

    }
}
