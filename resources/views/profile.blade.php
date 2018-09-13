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



	<div class="container">
	<div class="row">
	  <div class="col-4">
	    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Personal Details</a>
	      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Payments &amp; subscriptions</a>
	      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Card Details</a>
	     
	    </div>
	  </div>
	  <div class="col-8">
	    <div class="tab-content" id="v-pills-tabContent">
	      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
	      
		  <vue-personal users="{{ $user }}" username="{{ $user->username }}"></vue-personal>



	      </div>
	      


	      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
	      
	      <vue-subscribe data="{{ auth()->user()->subscriptions->first()->stripe_plan }}"></vue-subscribe>

	      </div>
	      

	      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
	      	
		  <vue-card cardbrand="{{ auth()->user()->card_brand }}" cardlast="{{ auth()->user()->card_last_four }}" emails={{ auth()->user()->email }}></vue-card>

	      </div>
	      
	    </div>
	  </div>
	</div>
	</div>

</section>

@endsection


@section('scripts')

<script src="https://checkout.stripe.com/checkout.js"></script>


@endsection