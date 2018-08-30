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
      <section class="section">
        <div class="container">

          <div class="row">
            <form class="col-lg-6 mx-auto p-6 bg-gray rounded" action=".#" method="POST" data-form="mailer">
              <div class="alert alert-success d-on-success">We received your message and will contact you back soon.</div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <input class="form-control form-control-lg" type="text" name="name" placeholder="Your Name">
                </div>

                <div class="form-group col-md-6">
                  <input class="form-control form-control-lg" type="email" name="email" placeholder="Your Email Address">
                </div>
              </div>


              <div class="form-group">
                <textarea class="form-control form-control-lg" rows="4" placeholder="Your Message" name="message"></textarea>
              </div>

              <div class="text-center">
                <button class="btn btn-lg btn-primary" type="submit">Submit Inquiry</button>
              </div>
            </form>
          </div>

        </div>
      </section>



      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Map
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section text-white bg-dark bg-img" style="background-image: url(../assets/img/thumb/14.jpg)" data-overlay="6">
        <div class="container">
          <div class="row gap-y align-items-center">

            <div class="col-md-5">
              <p class="text-uppercase small opacity-70 fw-600 ls-1">Head Office</p>
              <h5>wkwkwk land</h5>
              <br>
              <p>jln lurus<br>wkwkwk land, 12345</p>
              <p>Phone: +62 0812 2007 xxxx<br>Email: damarhuda@live.com</p>
              <br>
              <h6>Follow Us</h6>
              <div class="social social-sm social-inverse">
                
                <a class="social-facebook" href="facebook.com/damar.huda" target="_blank"><i class="fa fa-facebook"></i></a>
                <a class="social-instagram" href="instagram/fardall" target="_blank"><i class="fa fa-instagram"></i></a>
                <a class="social-github" href="github.com/damarteplok" target="_blank"><i class="fa fa-github"></i></a>
              </div>
            </div>


            <div class="col-md-7">
              <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCbVt9yCu2Ji6HMp0MLxduoMFxBZkYlrEI'></script><div style='overflow:hidden;height:400px;width:520px;'><div id='gmap_canvas' style='height:400px;width:520px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://add-map.com/'>google widgets</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=d4c0299524be9d21e6b04335f83bb1cedfe9dd73'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(-6.981199699999999,110.4123846),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-6.981199699999999,110.4123846)});infowindow = new google.maps.InfoWindow({content:'<strong></strong><br>sma 3 semarang<br>50123 Semarang<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>

          </div>
        </div>
      </section>

    </main><!-- /.main-content -->

@stop



 