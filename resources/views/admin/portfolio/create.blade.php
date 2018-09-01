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
    <div class="card-header">Createa a new portfolio</div>
    <div class="card-body">
      <form action="{{ route('portfolio.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
          <label for="featured">Featured image</label>
          <input type="file" name="featured" class="form-control">
        </div>

        <div class="form-group">
          <label for="title">Client</label>
          <input type="text" name="client" class="form-control">
        </div>

        <div class="form-group">
          <label for="title">Skill</label>
          <input type="text" name="skill" class="form-control">
        </div>

        <div class="form-group">
          <label for="title">Address</label>
          <input type="text" name="address" class="form-control">
        </div>

        <div class="form-group">
          <label for="title">Date</label>
          <input type="text" name="date" class="form-control" placeholder="YYYY/MM/DD">
        </div>


        <div class="form-group">
          <label for="content">Content</label>
          <textarea name="detail" id="summernote" rows="20" class="form-control"></textarea>
        </div>

        <div class="form-group">
          <div class="text-center">
            <button class="btn btn-success" type="submit">Store portfolio</button>
          </div>
        </div>

      </form>
    </div>
  </div>  
</div>

@stop

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

<script>
  $('#summernote').summernote({
        
        tabsize: 2,
        height: 100
      });


</script>

@stop