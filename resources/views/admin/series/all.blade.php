@extends('layouts.app')


@section('header')

   <!-- Header -->
    <header class="header text-white" style="background-color: #b9a0c9;">
      <div class="container text-center">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>All Series</h1>
            <p class="lead-2 opacity-90 mt-6">You can find all series in this page</p>

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

        <table class="table table-hover">
          <thead>
            <th>Title</th>
            <th style="text-align: right;">Edit</th>
            <th style="text-align: right;">Delete</th>
          </thead>
          <tbody>
            @forelse($series as $s)
              <tr> 
                <td>
                  <a href="{{ route('series.show', ['series' => $s->slug]) }}">
                  {{ $s->title }}
                  </a>
                </td>
                <td style="text-align: right;">
                  <a href="{{ route('series.edit', ['series' => $s->slug]) }}" class="btn btn-outline-info btn-sm">Edit</a>
                </td>
                <td style="text-align: right;">
                  
                  <form action="{{ route('series.destroy', ['series' => $s->slug]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger btn-sm">Delete</button>
                  </form>
                  
                </td>
              </tr>
            @empty
              <p class="text-center">No Series Yet</p>
            @endforelse
          </tbody>    
        </table>
      
      </div>


     
    </div>


  </div>
</div>

@stop