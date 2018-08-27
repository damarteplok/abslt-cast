@extends('layouts.app')


@section('header')

   <!-- Header -->
    <header class="header text-white" style="background-color: #b9a0c9;">
      <div class="container text-center">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>Edit Series: {{ $series->title }}</h1>
            <p class="lead-2 opacity-90 mt-6">Create your series</p>

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

        <form action="{{ route('series.update', ['series' => $series->slug]) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          

          <div class="form-group">
            <input class="form-control form-control-lg" type="text" name="title" placeholder="Your Series title" value="{{ $series->title }}">
          </div>

          <div class="form-group">
            <input class="form-control form-control-lg" type="file" name="image">
          </div>

          <div class="form-group">
            <textarea class="form-control form-control-lg" name="description" rows="4" placeholder="Your Series description">{{ $series->description }}</textarea>
          </div>

          <button class="btn btn-lg btn-primary btn-block" type="submit">Update Series</button>
        </form>

      </div>


     
    </div>


  </div>
</div>

@stop