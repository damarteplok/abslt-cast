@extends('layouts.app')

@section('header')
<!-- Header -->
<header class="header pt-10 pb-0">
  <div class="container text-center">
    <h1 class="display-4">Let's Get In Touch</h1>
    <p class="lead-2 mt-6">Here are the ways you can contact us with any questions you have</p>
  </div>
</header><!-- /.header -->

@stop


@section('content')


    <!-- Main Content -->
    <main class="main-content">


      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Contact form
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <vue-message></vue-message>



      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Map
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section text-white bg-dark bg-img" style="background-image: url(../assets/img/thumb/14.jpg)" data-overlay="6">
        <div class="container">
          <div class="row gap-y align-items-center">

            <div class="col text-center">
              <p class="text-uppercase small opacity-70 fw-600 ls-1">Head Office</p>
              <h5>wkwkwk land</h5>
              <br>
              <p>jln lurus<br>wkwkwk land, 12345</p>
              <p>Phone: +62 0812 2007 xxxx<br>Email: damarhuda@live.com</p>
              <br>
              <h6>Follow Us</h6>
              <div class="social social-sm social-inverse">
                
                <a class="social-facebook" href="https://facebook.com/damar.huda" target="_blank"><i class="fa fa-facebook"></i></a>
                <a class="social-instagram" href="https://instagram/fardall" target="_blank"><i class="fa fa-instagram"></i></a>
                <a class="social-github" href="https://github.com/damarteplok" target="_blank"><i class="fa fa-github"></i></a>
              </div>
            </div>


          </div>
        </div>
      </section>

    </main><!-- /.main-content -->

@stop



 