@extends('layouts.app')


@section('header')

<header class="header text-center text-white" style="background-color: #b9a0c9">
	<div class="container">
		<h1 class="display-4 text-uppercase">{{ $lesson->title }}</h1>
		<p class="lead-2 mt-6">{{ $series->title }}</p>
	</div>
</header>

@stop


@section('content')



<section class="section bg-gray">
	<div class="container">

		@php
			$nextLesson = $lesson->getNextLesson();
			$prevLesson = $lesson->getPrevLesson();
		@endphp

		
		<div class="row gap-y text-center">
			<div class="col-12">
				<vue-player default_lesson="{{ $lesson }}" 
				
				@if($nextLesson)

				next_lesson_url="{{ route('series.watch', ['series' => $series->slug, 'lesson' => $nextLesson->id]) }}"

				@endif

				></vue-player>
				
				<div class="row my-3">
					<div class="mr-auto">
						@if($prevLesson)

							<a href="{{ route('series.watch', ['series' => $series->slug, 'lesson' => $prevLesson->id]) }}" class="btn btn-info">Prev Lesson</a>

						@endif
					</div>

					<div class="ml-auto">
						@if($nextLesson)

							<a href="{{ route('series.watch', ['series' => $series->slug, 'lesson' => $nextLesson->id]) }}" class="btn btn-info">Next Lesson</a>

						@endif
					</div>
				</div>



				
			</div>


		</div>

		<div class="class row gap-y">
			<div class="col-12">
				<ul class="list-group">
					@foreach($series->getOrderedLessons() as $l)

						<li class="list-group-item
						
						@if($l->id == $lesson->id)
							active
						@endif

						"
						@if($l->id == $lesson->id)
							style="background-color: #fff;
							color: #757575;"
						@endif
						>
						@if(auth()->user()->hasCompletedLesson($l))
							<b><small>COMPLETED</small></b>
						@endif

							<a href="{{ route('series.watch', ['series' => $series->slug, 'lesson' => $l->id]) }}">{{ $l->title }}</a>
						</li>

					@endforeach
				</ul>	
			</div>
		</div>

	</div>
</section>

@stop