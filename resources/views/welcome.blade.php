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

            <small>Lastest Article</small>
            <h2>Featured Blog</h2>

            <hr>
  
        </header>

        <div class="row gap-y">


          @foreach($posts as $p)

          <div class="col-md-6 col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
            <a class="card shadow-1 hover-shadow-7" href="demo/bootstrap.html" target="_blank">
              <div class="card-img-top">
                <img src="{{ asset('/storage/series/' . $p->image_url) }}" alt="Card image cap">
                <div class="badges">
                  
                  <a class="badge badge-info" href="{{ route('blog.search', ['name' => 'category', 'query' => $p->categories->id]) }}">{{ $p->categories->title }}</a>
                  
                </div>
              </div>
              <div class="card-body">
                <h5 class="card-title">{{ $p->title }}</h5>
                {!! mb_substr($p->content, 0, 100) !!}
                <a class="fs-12 fw-600" href="{{ route('blog.post', ['slug' => $p->slug]) }}">Read more <i class="fa fa-angle-right pl-1"></i></a>
              </div>
            </a>
          </div>

          @endforeach

   

        </div>

    </div>


</section>


<section class="section text-white bg-primary">
  <div class="container">
    <header class="section-header">
      <small>Lastest Lesson</small>
      <h2>Featured Screencast</h2>
     
    </header>

    
    
    <div class="owl-carousel">

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

