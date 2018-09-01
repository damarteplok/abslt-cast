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

	<div class="card-header">
		
		<span>GalleryPortfolio</span>
		<a href="{{ route('galleryportfolio.create', ['id' => $portfolioId]) }}" class="btn btn-outline-success btn-sm float-right">Add</a>

	</div>

	<div class="card-body">

		<table class="table table-striped">
		  
		  <thead>

		    <tr>
		      <th scope="col">Filename</th>
		      
		      <th scope="col">Delete</th>
		    </tr>

		  </thead>
		  
		  <tbody>

		  	@if($galleries->count() > 0)

			  	@foreach($galleries as $p)
			    
			    <tr>
			    
			    	<td>{{ $p->filename }}</td>
			    	
			      

			      	<td>

			      		<a href="{{ route('galleryportfolio.destroy', ['id' => $p->id]) }}" class="btn btn-danger btn-sm">
			      			Destroy
			      		</a>
			      		

			      	</td>



			    </tr>
			    
			    @endforeach

			    

			@else

					<th colspan="3" class="text-center"> No Gallery</th>

			@endif
		      
		  </tbody>
		</table>

	</div>
	</div>
</div>
@stop