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
		
		<div class="row gap-y text-center">
			<div class="col-12">
				<vue-player default_lesson="{{ $lesson }}"></vue-player>
				
				<div class="row my-3">
					<div class="mr-auto">
						@if($lesson->getPrevLesson())

							<a href="{{ route('series.watch', ['series' => $series->slug, 'lesson' => $lesson->getPrevLesson()->id]) }}" class="btn btn-info">Prev Lesson</a>

						@endif
					</div>

					<div class="ml-auto">
						@if($lesson->getNextLesson())

							<a href="{{ route('series.watch', ['series' => $series->slug, 'lesson' => $lesson->getNextLesson()->id]) }}" class="btn btn-info">Next Lesson</a>

						@endif
					</div>
				</div>



				
			</div>
		</div>

		<div class="class row gap-y">
			<div class="col-12">
				
			</div>
		</div>

	</div>
</section>

@stop