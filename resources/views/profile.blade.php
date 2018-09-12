@extends('layouts.app')

@section('header')

<header class="header text-center text-white" style="background-color: #fc7e81">
	<div class="container">
		<h1 class="display-4 text-uppercase">{{ $user->name }}</h1>
		<p class="fs-20 opacity-70">{{ $user->username }}</p>
		<h1 class="display-4 text-uppercase">{{ $user->getTotalNumberOfCompletedLessons() }}</h1>
		<p class="fs-20 opacity-70">Lessons completed</p>
	</div>
</header>


@endsection


@section('content')

<section class="section" id="section-content">

	<div class="container">
		<header class="section-header">
			<h2>Series being watched...</h2>
			<hr>
		</header>
		<div class="row gap-y">
			<div class="col-12 offset-md-2 col-md-8 mb-30">
				@foreach($series as $s)
    
			      <div class="card overflow-hidden">
			        <div class="card-body">
			          <h5 class="card-title" style="color: #000;">{{ $s->title }}</h5>
			          <p style="color: #000;">{{ $s->description }}</p>
			        </div>

			        <a class="card-hover bg-img" href="{{ route('series', ['series' => $s->slug]) }}" data-animation="slide-left" style="background-image: url({{ asset('storage/' . $s->image_url) }});">
			        </a>
			      </div>

			    @endforeach


			</div>
		</div>

	</div>
	
</section>


<section class="section bg-gray">
	<div class="container">
		<header class="section-header">
			<h2>Edit your profile</h2>
		</header>
	</div>

	<div class="row gap-y">
		<div class="col-12 offset-md-2 col-md-8 mb-30">
			<p class="text-center">
				Course Description
			</p>
		</div>
	</div>

</section>

@endsection