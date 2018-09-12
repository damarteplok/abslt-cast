@extends('layouts.app')


@section('header')

<header class="header text-white h-fullscreen pb-80" style="background-image: url({{ asset('storage/' . $series->image_url) }});" data-overlay="9">
  <div class="container text-center">

    <div class="row h-100">
      <div class="col-lg-8 mx-auto align-self-center">

        <p class="opacity-70 text-uppercase small ls-1">Series</p>
        <h1 class="display-4 mt-7 mb-8">{{ $series->title }}</h1>


        @auth
        	
			@hasStartedSeries($series)
        		<a href="{{ route('series.learning', $series->slug) }}" class="btn btn-round btn-primary">continue learning</a>

        	@else

        		<a href="{{ route('series.learning', $series->slug) }}" class="btn btn-round btn-primary">start learning</a>

        	@endhasStartedSeries
        @else

        	<a href="" class="btn btn-round btn-primary">start learning</a>

        @endauth
        

      </div>

      <div class="col-12 align-self-end text-center">
        <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
      </div>

    </div>

  </div>
</header><!-- /.header -->

@stop


@section('content')

<section class="section" id="section-content">

	<div class="container">
		<header class="section-header">
			<small><strong>COURSE DESCRIPTION</strong></small>
			<h2>What's this course about?</h2>
			<hr>
		</header>

		<div class="row gap-y">
			<div class="col-12 offset-md-2 col-md-8 mb-30">
				<p class="text-center">
					{{ $series->description }}
				</p>
			</div>
		</div>
	</div>
	
</section>

<section class="section bg-gray">
	<div class="container">
		<header class="section-header">
			<h2>Video</h2>
			<hr>
			<p class="lead"></p>
		</header>
	</div>
</section>

@stop