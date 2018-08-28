@extends('layouts.app')


@section('header')

<header class="header text-center text-white" style="background-color: #b9a0c9">
	<div class="container">
		<h1 class="display-4">{{ $lesson->title }}</h1>
		<p class="lead-2 mt-6">{{ $series->title }}</p>
	</div>
</header>

@stop


@section('content')

<section class="section" id="section-content">

	<div class="container">

		<div class="row gap-y">
			<div class="col-12">
				
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