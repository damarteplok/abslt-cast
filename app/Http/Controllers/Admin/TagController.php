<?php

namespace Absltcast\Http\Controllers\Admin;

use Absltcast\Http\Controllers\Controller;
use Absltcast\Http\Requests\CreateTagRequest;
use Absltcast\Http\Requests\UpdateTagRequest;
use Illuminate\Http\Request;
use Absltcast\tag;

class TagController extends Controller
{

    public function index()
    {
        return view('admin.tag.index')->withTags(tag::all());
    }

    public function store(CreateTagRequest $request)
    {
        return $request->storeTag();
    }

    public function update(UpdateTagRequest $request, tag $tag)
    {
        $tag->update($request->all());
        return $tag->fresh();
    }

    public function destroy(tag $tag)
    {
        $tag->delete();
        return response()->json(['status' => 'ok'], 200);
    }
}
