<?php

namespace Absltcast\Http\Controllers\Admin;

use Absltcast\post;
use Absltcast\category;
use Absltcast\tag;
use Auth;
use Absltcast\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = post::all()->toJson();
        $categories = category::all()->toJson();
        $tags = tag::all()->toJson();
        
        return view('admin.post.index')
        ->with('posts', $posts)
        ->with('categories', $categories)
        ->with('tags', $tags);

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
    public function store(Request $request)
    {
        
        $this->validate($request, [

            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'tag' => 'required',
            'image_url' => 'required'

        ]);
        
        if($request->get('image_url'))
       {
          $image = $request->get('image_url');
          $name = time() . '-' . str_slug($request->title).'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

          \Image::make($request->get('image_url'))->save(storage_path('app/public/series/').$name);
        }

       
       $image= new post();
       $image->image_url = $name;
       $image->title = $request->title;
       $image->category_id = $request->category_id;
       $image->user_id = Auth::id();
       $image->content = $request->content;
       $image->slug = str_slug($request->title);
       

       $image->save();

        
       $image->tags()->attach($request->tag);

       return $image;

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
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [

            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',

        ]);
        
        if($request->get('image_url'))
       
       {
          $image = $request->get('image_url');
          $name = time() . '-' . str_slug($request->title).'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];

          \Image::make($request->get('image_url'))->save(storage_path('app/public/series/').$name);
          $image= post::find($id);

           $image->image_url = $name;
         
           $image->save();  
        }

       
       $image= post::find($id);
       
       $image->title = $request->title;
       $image->category_id = $request->category_id;
       $image->user_id = Auth::id();
       $image->content = $request->content;
       $image->slug = str_slug($request->title);
       

       $image->save();

        
       $image->tags()->sync($request->tag);

       return $image;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();

        return response()->json(['status' => 'ok'], 200);

    }
}
