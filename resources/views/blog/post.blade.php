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
    <p>{{ $post->created_at->toFormattedDateString()}} <a href="{{ route('blog.search', ['name' => 'category', 'query' => $post->categories->id]) }}">{{ $post->categories->title }}</a> <i class="fa fa-eye" aria-hidden="true"></i> {{ $post->count }}</p>
  </div>


  <div class="text-center my-8">
    <img class="rounded-md" src="{{ asset('/storage/series/' . $post->image_url) }}" alt="{{ $post->title }}">
  </div>


  <div class="row">
    <div class="col-lg-8 mx-auto">

      <div class="lead">{!! mb_substr($post->description, 0,100) !!}</div>

      <hr class="w-100px">

      {!! $post->description !!}

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

  <nav class="flexbox mt-5">
    @if($next == !null)
    <a class="btn btn-white" href="{{ route('blog.post', ['slug' => $next->slug]) }}"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
    @else
    
    @endif
    @if($prev == !null)
    <a class="btn btn-white" href="{{ route('blog.post', ['slug' => $prev->slug]) }}">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
    @else
    @endif
  </nav>


</div>
</div>


<vue-comment default_comments="{{ $post->extra }}" post_id="{{ $post->id }}"></vue-comment>


</main>


@stop