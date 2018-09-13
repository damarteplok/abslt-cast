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

  <body class="layout-centered bg-img" style="background-image: url(../assets/img/bg/4.jpg);">


    <!-- Main Content -->
    <main class="main-content">

      <div class="bg-white rounded shadow-7 w-400 mw-100 px-6 pt-6 pb-0">
        <h5 class="mb-7">Sign into your account</h5>

        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf
          <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email" required>
          </div>

          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>

          <div class="form-group flexbox py-3">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" name="remember" checked>
              <label class="custom-control-label">Remember me</label>
            </div>

            <a class="text-muted small-2" href="{{ route('password.request') }}">Forgot password?</a>
          </div>

          <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Login</button>
          </div>
        </form>

        <div class="divider">Or Login With</div>
        <div class="text-center mx-auto">
          <a class="btn btn-circle btn-sm btn-facebook mr-2" href="/login/github"><i class="fa fa-github"></i></a>
          
        </div>

        <hr class="w-30">

        <p class="text-center text-muted small-2">Don't have an account? <a href="/register">Register here</a></p>
        <div class="divider"><a href="/">Back</a></div>
      </div>

    </main><!-- /.main-content -->


    <!-- Scripts -->

    <script src="{{ asset('assets/js/page.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

  </body>
</html>






