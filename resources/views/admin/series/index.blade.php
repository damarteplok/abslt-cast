@extends('layouts.app')


@section('header')

   <!-- Header -->
    <header class="header text-white" style="background-color: #b9a0c9;">
      <div class="container text-center">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>{{ $series->title }}</h1>
            <p class="lead-2 opacity-90 mt-6">Customize your series lesson</p>

          </div>
        </div>

      </div>
    </header><!-- /.header -->


@stop



@section('content')


<div class="section">
  <div class="container">

    <div class="row gap-y">
      
      <div class="col">

            
        <vue-lessons default_lessons="{{ $series->lessons }}" series_id="{{ $series->id }}" ></vue-lessons>        

      </div>

    </div>


  </div>
</div>

@stop