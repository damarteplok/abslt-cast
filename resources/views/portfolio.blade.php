@extends('layouts.app')

@section('header')

<!-- Header -->
<header class="header text-white" style="background-color: #b9a0c9;">
  <div class="container text-center">

    <div class="row">
      <div class="col-md-8 mx-auto">

        <h1>Portfolio</h1>
        <p class="lead-2 opacity-90 mt-6">You can find several project by me in this section</p>

      </div>
    </div>

  </div>
</header><!-- /.header -->


@stop

@section('content')


<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Portfolio
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
<section class="section overflow-hidden">
<div class="container">

  <div data-provide="shuffle">
    <ul class="nav nav-center nav-bold nav-uppercase nav-slash mb-7" data-shuffle="filter">
      <li class="nav-item">
        <a class="nav-link active" href="#" data-shuffle="button">All</a>
      </li>
    </ul>

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


</div>
</section>


@stop