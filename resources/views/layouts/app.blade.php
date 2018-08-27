<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Abslt-cast</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('ssets/img/favicon.png') }}">

    <!--  Open Graph Tags -->
    <meta property="og:title" content="TheSaaS">
    <meta property="og:description" content="A responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4.">
    <meta property="og:image" content="http://thetheme.io/thesaas/assets/img/og-img.jpg">
    <meta property="og:url" content="http://thetheme.io/thesaas/">
    <meta name="twitter:card" content="summary_large_image">
  </head>

  <body>
    
    <div id="app">

   

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="#">
            <img class="logo-dark" src="{{ asset('assets/img/logo/abslt-cast.png') }}" alt="logo" width="60" height="60">
            <img class="logo-light" src="{{ asset('assets/img/logo/abslt-cast.png') }}" alt="logo" width="60" height="60">
          </a>
        </div>

        <section class="navbar-mobile">
          <nav class="nav nav-navbar ml-auto">
            <a class="nav-link active" href="/">Home</a>
            
            @auth
            <a class="nav-link" href="{{ route('series.index') }}">All Series</a>
            <a class="nav-link" href="{{ route('series.create') }}">Create Series</a>
            @endauth
            
            <a class="nav-link" href="#">Forums</a>
            <a class="nav-link" href="#">Course</a>
            
          
          </nav>
        </section>

        @if(auth()->check())
        <button class="btn btn-xs btn-round btn-outline-primary">{{ auth()->user()->name }}</button>
        
        @else
        <a class="btn btn-xs btn-round btn-success" href="#" data-toggle="modal" data-target="#LoginModal">Sign In</a>
        @endif

      </div>

    </nav><!-- /.navbar -->

        
        
            
        <!-- Header -->
        @yield('header')
        <!-- END Header -->

        <main class="main-content">
            
            <vue-noty></vue-noty>

            @yield('content')
            
        </main>
    

        

        @if(!auth()->check())
            <vue-login></vue-login>
        @endif

        <!-- Footer -->
        <footer class="footer bg-gray">
          <div class="container">
            <div class="row gap-y align-items-center">


              <div class="col-md-3 text-center text-md-left">
                <small>© 2018 Abslt-cast. All rights reserved.</small>
              </div>

              <div class="col-md-9 text-center text-md-right">
                <div class="social social-sm social-hover-bg-brand">
                  <a class="social-facebook" href="#"><i class="fa fa-facebook"></i></a>
                  <a class="social-twitter" href="#"><i class="fa fa-twitter"></i></a>
                  <a class="social-instagram" href="#"><i class="fa fa-instagram"></i></a>
                </div>
              </div>

            </div>
          </div>
        </footer><!-- /.footer -->

    </div>

  
    <!-- Scripts -->

    <script src="{{ asset('assets/js/page.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>


  </body>
</html>
