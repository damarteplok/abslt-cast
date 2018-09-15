@extends('layouts.app')


@section('header')

<!-- Header -->
<header class="header bg-fixed text-center text-white" style="background-image: url({{ asset('assets/img/bg/6.jpg') }})" data-overlay="5">
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
                <a href="{{ route('blog.post', ['slug' => $p->slug]) }}"><img class="card-img-top" src="{{ asset('storage/series/' . $p->image_url) }}" alt="{{ $p->title }}"></a>
                <div class="p-6 text-center">
                  <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="{{ route('blog.search', ['name' => 'category', 'query' => $p->categories->id]) }}">{{ $p->categories->title}}</a></p>
                  <h5 class="mb-0"><a class="text-dark" href="{{ route('blog.post', ['slug' => $p->slug]) }}">{{ $p->title }}</a></h5>
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
		
		@include('layouts.side-blog')


        

      </div>
    </div>
  </div>
</main>




@stop






