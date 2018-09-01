@extends('layouts.app')

@section('header')

<!-- Header -->
    <header class="header text-white" style="background-color: #b9a0c9;">
      <div class="container text-center">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>Portfolio</h1>
            <p class="lead-2 opacity-90 mt-6">Customize your Portfolio</p>

          </div>
        </div>

      </div>
    </header><!-- /.header -->

@stop

@section('content')

<div class="col-md-8 offset-md-2">

  <div class="card">
      <div class="card-header">Createa a new photo</div>
      <div class="card-body">
        <form action="{{ route('galleryportfolio.store') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="image">Featured image (u can upload multiple)</label>
            <input type="file" name="filename[]" multiple class="form-control">
          </div>

          <input type="hidden" name="portfolio_id" value="{{ $id }}">
          

          <div class="form-group">
            <div class="text-center">
              <button class="btn btn-success" type="submit">Save photo</button>
            </div>
          </div>

        </form>
      </div>
    </div>  

</div>

@stop