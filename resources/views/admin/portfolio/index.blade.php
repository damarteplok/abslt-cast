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
		
		<span>Protfolios</span>
		<a href="{{ route('portfolio.create') }}" class="btn btn-outline-success btn-sm float-right">Add</a>

	</div>

	<div class="card-body">

		<table class="table table-striped">
		  
		  <thead>

		    <tr>
		      <th scope="col">Title</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Delete</th>
		    </tr>

		  </thead>
		  
		  <tbody>

		  	@if($portfolios->count() > 0)

			  	@foreach($portfolios as $p)
			    
			   
			    <tr>
			    
			    	<td>
			    		<a href="{{ route('galleryportfolio.list', ['id' => $p->id]) }}">
			    		{{ $p->title }}</a>
			    	</td>
			    	
			      	<td>
			      		
			      		<a href="{{ route('portfolio.edit', ['id' => $p->id]) }}" class="btn btn-info btn-sm">
			      			edit
			      		</a>
			      	</td>

			      	<td>
			      		
			      		<form action="{{ 
	                        route('portfolio.destroy', 
	                        ['id' => $p->id]) 
	                    }}" 
	                    method="post">
	                        {{ csrf_field() }}
	                        {{ method_field('DELETE') }}
	                        <button 
	                        class="btn btn-sm btn-danger" 
	                        type="submit">Destroy</button>
	                    </form>


			      	</td>



			    </tr>
			    
			    @endforeach

			    

			@else

					<th colspan="3" class="text-center"> No Portfolio</th>

			@endif
		      
		  </tbody>
		</table>

	</div>
	</div>
</div>
@stop