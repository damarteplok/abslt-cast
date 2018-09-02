@extends('layouts.app')

@section('header')

<!-- Header -->
<header class="header text-center pb-0">
  <div class="container">
    <h1 class="display-4">{{ $portfolio->title }}</h1>
    
  </div>
</header><!-- /.header -->


@stop


@section('content')


<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Project details
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
<section class="section bb-1">
<div class="container">

  <div class="row">
    <div class="col-md-8 mb-6 mb-md-0">
      <img src="{{ asset('/storage/' . $portfolio->featured) }}" alt="project image">
      
      <div class="mt-5">
      	
      	<div class="owl-carousel">

		    @foreach($portfolio->galleries as $s)
		    
		      <a href="{{ asset('/storage/' . $s->filename) }}" data-provide="lightbox">
		        <img src="{{ asset('/storage/' . $s->filename) }}" alt="...">
		      </a>

		    @endforeach
	    
	    </div>

      </div>
    </div>


    <div class="col-md-4">
      <h5>Project detail</h5>

      <div>{!! $portfolio->detail !!}</div>

      <ul class="project-detail mt-7">
        <li>
          <strong>Client</strong>
          <span>{{ $portfolio->client }}</span>
        </li>

        <li>
          <strong>Date</strong>
          <span>{{ $portfolio->date }}</span>
        </li>

        <li>
          <strong>Skills</strong>
          <span>{{ $portfolio->skill }}</span>
        </li>

        <li>
          <strong>Address</strong>
          <a href="{{ $portfolio->address }}">{{ $portfolio->address}}</a>
        </li>

        <li>
          <strong>Note</strong>
          <span>Using Free Hosting Heroku-app, so its lag</span>
        </li>
      </ul>
    </div>
  </div>

</div>
</section>


 <!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Related projects
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
<section class="section">
<div class="container">

  <h5 class="mb-6">LastestProjects</h5>

    <div class="row gap-y gap-2" data-shuffle="list">
	@foreach($portfolios as $p)
      <div class="col-6 col-lg-3" data-shuffle="item">
        <a class="portfolio-1" href="{{ route('portfolio.single', ['slug' => $p->slug]) }}">
          <img src="{{ asset('/storage/' . $p->featured) }}" alt="screenshot">
          <div class="portfolio-detail">
            <h5>{{ $p->title }}</h5>
            <p>{{ $p->skill }}</p>
          </div>
        </a>
      </div>
    @endforeach

    </div>


</div>
</section>

@stop

@section('css')

<link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css') }}">


@stop


@section('js')

<script src="{{ asset('/js/owl.carousel.js') }}"></script>
<script src="{{ asset('/js/owl.autoplay.js') }}"></script>

<script>
  
  $('.owl-carousel').owlCarousel({
      autoplay:true,
      autoplayTimeout:1000,
      autoplayHoverPause:true,
      loop:true,
      margin:10,
      nav:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:4
          }
      }
  })
</script>

@stop