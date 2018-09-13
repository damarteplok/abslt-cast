@extends('layouts.app')

@section('header')

<header class="header text-center text-white" style="background-color: #fc7e81">
	<div class="container">
		<h1 class="display-4 text-uppercase">Subscribe to our channels</h1>
	</div>
</header>


@endsection


@section('content')

<section class="section" id="section-vtab">

	<div class="container">
		<vue-stripe emails={{ auth()->user()->email }}></vue-stripe>
	</div>
	
</section>


@endsection


@section('scripts')

<script src="https://checkout.stripe.com/checkout.js"></script>


@endsection