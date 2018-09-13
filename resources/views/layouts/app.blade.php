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
    @yield('css')
    @yield('scripts')

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
    <nav class="navbar navbar-expand-lg navbar-dark navbar-stick-dark" data-navbar="sticky">

      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="#">
            <img class="logo-dark" src="{{ asset('assets/img/logo/abslt-cast.png') }}" alt="logo" width="60" height="60">
            <img class="logo-light" src="{{ asset('assets/img/logo/abslt-cast.png') }}" alt="logo" width="60" height="60">
          </a>
        </div>

        <section class="navbar-mobile">
         

          <ul class="nav nav-navbar ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home </a>
            </li>

            @auth
              @admin
                
                <li class="nav-item">
                  <a class="nav-link" href="#">Admin <span class="arrow"></span></a>
                  <ul class="nav">
          
                    <li class="nav-item">
                      <a class="nav-link" href="#">Blog <span class="arrow"></span></a>
                      <nav class="nav">
                        <a class="nav-link" href="{{ route('category.index') }}">Category</a>
                        <a class="nav-link" href="{{ route('tag.index') }}">Tag</a>
                        <a class="nav-link" href="{{ route('post.index') }}">Post</a>
                      </nav>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="#">Cast <span class="arrow"></span></a>
                      <nav class="nav">
                        <a class="nav-link" href="{{ route('series.index') }}">Series</a>
                        <a class="nav-link" href="{{ route('series.create') }}">New Series</a>
                      </nav>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="#">PortFolio <span class="arrow"></span></a>
                      <nav class="nav">
                        <a class="nav-link" href="{{ route('portfolio.index') }}">Index</a>
                      </nav>
                    </li>

                  </ul>
                </li>

              @else

              @endadmin

            

            @endauth

            <li class="nav-item">
              <a class="nav-link" href="{{ route('blog.index') }}">Blog </a>
              
            </li>

            <li class="nav-item">
              <a class="nav-link" href="http://absolutharam-forum.herokuapp.com/" target="_blank">Forums </a>
              
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/courses/series">Course </a>
              
            </li>

            @if(auth()->check())
            <li class="nav-item">
              <a class="nav-link text-danger" href="{{ route('logout') }}">Logout </a>
              
            </li>
            @endif


          </ul>
        </section>

        @if(auth()->check())
        <a href="{{ route('profile', ['user' => auth()->user()->username]) }}" class="btn btn-xs btn-round btn-outline-primary">{{ auth()->user()->name }}</a>
 
        @else
        <a class="btn btn-xs btn-round btn-success" href="#" data-toggle="modal" data-target="#LoginModal">Sign In</a>
        @endif

      </div>

    </nav><!-- /.navbar -->

        
        
            
    <!-- Header -->
    @yield('header')
    <!-- END Header -->

    <main class="main-content">
        
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
            
          </div>

          <div class="col-md-9">
            <div class="nav nav-bold nav-uppercase justify-content-center justify-content-md-end">
              <a class="nav-link" href="/portfolio">About</a>                  
              <a class="nav-link" href="/terms">Terms</a>
              <a class="nav-link" href="/contact">Contact</a>
            </div>
          </div>
          
          <div class="col-12">
            <hr class="my-0">
          </div>

          <div class="col-md-5 text-center text-md-left">
            <small>© 2018 Abslt-cast. All rights reserved.</small>
          </div>

          <div class="col-md-7 text-center text-md-right">
            <div class="social social-sm social-hover-bg-brand">
              <a class="social-facebook" href="https://www.facebook.com/damar.huda" target="_blank"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="https://github.com/damarteplok" target="_blank"><i class="fa fa-github"></i></a>
              <a class="social-instagram" href="https://www.instagram.com/fardall/" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </footer><!-- /.footer -->

    <button class="btn btn-circle btn-primary scroll-top"><i class="fa fa-angle-up"></i></button>

    </div>

  
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('assets/js/page.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @yield('js')

    


  </body>
</html>
