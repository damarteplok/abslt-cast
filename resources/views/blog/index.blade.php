@extends('layouts.app')

@section('header')

<!-- Header -->
<header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
  <div class="container">

    <div class="row">
      <div class="col-md-8 mx-auto">

        <h1>Latest Blog Posts</h1>
        <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

      </div>
    </div>

  </div>
</header><!-- /.header -->

@stop


@section('content')

<!-- Main Content -->
<main class="main-content">
  <div class="section bg-gray">
    <div class="container">
      <div class="row">

		
        <div class="col-md-8 col-xl-9">
          <div class="row gap-y">

			@if($posts->count() > 0)

			@foreach($posts as $p)
            <div class="col-md-6">
              <div class="card border hover-shadow-6 mb-6">
                <a href="#"><img class="card-img-top" src="{{ asset('storage/series/' . $p->image_url) }}" alt="{{ $p->title }}"></a>
                <div class="p-6 text-center">
                  <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">{{ $p->categories->title}}</a></p>
                  <h5 class="mb-0"><a class="text-dark" href="#">{{ $p->title }}</a></h5>
                </div>
              </div>
            </div>
            @endforeach

			{!! $posts->render() !!}
            
            @else
         	<p>No post</p>
			@endif

          </div>
        	

      
        </div>



        <div class="col-md-4 col-xl-3">
          <div class="sidebar px-4 py-md-0">

            <h6 class="sidebar-title">Search</h6>
            <form class="input-group" target="#" method="GET">
              <input type="text" class="form-control" name="s" placeholder="Search">
              <div class="input-group-addon">
                <span class="input-group-text"><i class="ti-search"></i></span>
              </div>
            </form>

            <hr>

            <h6 class="sidebar-title">Categories</h6>
            <div class="row link-color-default fs-14 lh-24">
              @foreach($categories as $c)
              <div class="col-6">
              	<a href="#">{{ $c->title }}</a>
              </div>
              @endforeach
            </div>

            <hr>

            <h6 class="sidebar-title">Top posts</h6>

            @foreach($toppost as $t)
            <a class="media text-default align-items-center mb-5" href="blog-single.html">
              <img class="rounded w-65px mr-4" src="{{ asset('storage/public/series/' . $t->image_url) }}">
              <p class="media-body small-2 lh-4 mb-0">{!! mb_substr($t->content,0,50) !!}</p>
            </a>
			@endforeach
            

            <hr>

            <h6 class="sidebar-title">Tags</h6>
            <div class="gap-multiline-items-1">
            @foreach($tags as $t)
              <a class="badge badge-secondary" href="#">{{ $t->tag }}
              </a>
            @endforeach
            </div>
			
            <hr>

            <h6 class="sidebar-title">About</h6>
            <p class="small-3">The Absolutcast is Id consectetur excepteur labore ut esse nulla laboris quis nulla consectetur.</p>


          </div>
        </div>

      </div>
    </div>
  </div>
</main>




@stop






