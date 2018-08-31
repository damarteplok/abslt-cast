<?php

namespace Absltcast\Http\Controllers;

use Illuminate\Http\Request;
use Absltcast\post;
use Absltcast\category;
use Absltcast\tag;
use Absltcast\ExtraInPost;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('blog.index')->with('posts',post::orderBy('created_at','desc')->simplePaginate(6))
        ->with('categories', category::all())
        ->with('tags', tag::all())
        ->with('toppost', post::orderBy('count','desc')->take(4)->get());
    }


    public function post($slug)
    {   

        $post = post::where('slug',$slug)->first();

        $post->count = $post->count + 1;
        $post->save();

        return view('blog.post')->with('post', $post);
    }

    public function commentPost(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required',
            'message' => 'required'

        ]);

        $comments = ExtraInPost::create([

            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'post_id' => $request->post_id

        ]);

        return $comments->fresh();
    }
    
    public function search($name, $query, Request $request)
    {
        if($name == 'tag')
        {
            $tag = tag::find($query);
            return view('blog.index')->with('posts',$tag->posts()->orderBy('created_at','desc')->simplePaginate(6))
            ->with('categories', category::all())
            ->with('tags', tag::all())
            ->with('toppost', post::orderBy('count','desc')->take(4)->get());

        }else if($name == 'category'){
            $category = category::find($query);
            return view('blog.index')->with('posts',$category->posts()->orderBy('created_at','desc')->simplePaginate(6))
            ->with('categories', category::all())
            ->with('tags', tag::all())
            ->with('toppost', post::orderBy('count','desc')->take(4)->get());
        }else{
            $name = $request->s;
            return view('blog.index')->with('posts', post::where('title','like', '%' . $name . '%')->simplePaginate(6))
            ->with('categories', category::all())
            ->with('tags', tag::all())
            ->with('toppost', post::orderBy('count','desc')->take(4)->get());
        }
    }
}
