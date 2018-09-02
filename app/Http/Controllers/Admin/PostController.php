<?php

namespace Absltcast\Http\Controllers\Admin;

use Absltcast\post;
use Absltcast\category;
use Absltcast\tag;
use Auth;
use Absltcast\Http\Controllers\Controller;
use Absltcast\Http\Requests\CreatePostRequest;
use Absltcast\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.post.index')
        ->with('posts', post::all())
        ->with('categories', category::all())
        ->with('tags', tag::all());
    }

    public function store(CreatePostRequest $request)
    {       
        return $request->storePost();
    }

    public function update(UpdatePostRequest $request, $id)
    {
       return $request->updatePost($id);
    }

    public function destroy($id)
    {
      
        $post = Post::find($id);
        $post->delete();
        return response()->json(['status' => 'ok'], 200);

    }
}
