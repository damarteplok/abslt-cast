@extends('layouts.app')

@section('header')

<header class="header text-center text-white" style="background-color: #fc7e81">
	<div class="container">
		<h1 class="display-4 text-uppercase">Name</h1>
		<p class="lead-2 mt-6">Name</p>
		<h1 class="display-4 text-uppercase"> total lesson</h1>
		<p class="lead-2 mt-6">Lessons completed</p>
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