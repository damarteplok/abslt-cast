@extends('layouts.app')

@section('header')



<!-- Header -->
<header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
  <div class="container">

    <div class="row">
      <div class="col-md-8 mx-auto">

        <h1>The #1 Web Screencast</h1>
        <p class="lead-2 opacity-90 mt-6">Absolut-cast is screencast how to be and become idol in just 1 day? month? year? :D</p>
        <hr class="w-10 my-7">
        @guest
        <a class="btn btn-xl btn-round btn-success px-7 mb-3" href="{{ route('register') }}">Sign up Now</a>
        @endguest
        <a class="btn btn-xl btn-round btn-outline-danger px-7 mb-3" href="#">Browse Now</a>

      </div>
    </div>

  </div>
</header><!-- /.header -->


@stop




@section('content')


<section class="section" id="section-intro">
    
    <div class="container">
        

        <header class="section-header">

            <small>Lesson</small>
            <h2>Featured Screencasts</h2>

            <hr>

            
            
        </header>

        <div class="row gap-y">
            
            @forelse($series as $s)

            <div class="col-12">
                <div class="card hover-shadow-7 my-5">
                <div class="row">
                  <div class="col-md-4">
                    <a href="#"><img class="fit-cover position-absolute h-100" src="{{ asset('storage/' . $s->image_url) }}" alt="..."></a>
                  </div>

                  <div class="col-md-8">
                    <div class="p-7">
                      <h4>{{ $s->title }}</h4>
                      <p>{{ $s->description }}</p>
                      <a class="small ls-1" href="{{ route('series', ['series' => $s->slug]) }}">Read More <span class="pl-1">⟶</span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @empty


            @endforelse



            
        

        </div>

    </div>


</section>


@stop