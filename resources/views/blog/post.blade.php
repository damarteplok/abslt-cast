@extends('layouts.app')

@section('header')


@stop


@section('content')


<main class="main-content">


<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Blog content
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
<div class="section">
<div class="container">

  <div class="text-center mt-8">
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->created_at->toFormattedDateString()}} <a href="{{ route('blog.search', ['name' => 'category', 'query' => $post->categories->id]) }}">{{ $post->categories->title }}</a></p>
  </div>


  <div class="text-center my-8">
    <img class="rounded-md" src="{{ asset('/storage/series/' . $post->image_url) }}" alt="{{ $post->title }}">
  </div>


  <div class="row">
    <div class="col-lg-8 mx-auto">

      <div class="lead">{!! mb_substr($post->content, 0,100) !!}</div>

      <hr class="w-100px">

      {!! $post->content !!}

    </div>
  </div>




  <div class="row">
    <div class="col-lg-8 mx-auto">

    
      <div class="gap-xy-2 mt-6">
      	@foreach($post->tags as $tag)
        <a class="badge badge-pill badge-secondary" href="{{ route('blog.search', ['name' => 'tag', 'query' => $tag->id]) }}">{{ $tag->tag }}</a>
        @endforeach
      </div>

    </div>
  </div>


</div>
</div>


<vue-comment default_comments="{{ $post->extra }}" post_id="{{ $post->id }}"></vue-comment>


</main>


@stop