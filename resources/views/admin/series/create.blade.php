@extends('layouts.app')


@section('header')

   <!-- Header -->
    <header class="header text-white" style="background-color: #b9a0c9;">
      <div class="container text-center">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>Portfolio</h1>
            <p class="lead-2 opacity-90 mt-6">You can find several product design by our professional team in this section</p>

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

        <form action="{{ route('series.store') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          

          <div class="form-group">
            <input class="form-control form-control-lg" type="text" name="title" placeholder="Your Series title">
          </div>

          <div class="form-group">
            <input class="form-control form-control-lg" type="file" name="image">
          </div>

          <div class="form-group">
            <textarea class="form-control form-control-lg" name="description" rows="4" placeholder="Your Series description"></textarea>
          </div>

          <button class="btn btn-lg btn-primary btn-block" type="submit">Create Series</button>
        </form>

      </div>


     
    </div>


  </div>
</div>

@stop