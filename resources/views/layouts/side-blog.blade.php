<div class="col-md-4 col-xl-3">
  <div class="sidebar px-4 py-md-0">

    <h6 class="sidebar-title">Search</h6>
    <form class="input-group" method="GET" action="{{ route('blog.search', ['name' => 'search', 'query' => 'search']) }}">
      <input type="text" class="form-control" name="s" placeholder="Search">
      <div class="input-group-addon">
        <span class="input-group-text"><i class="ti-search"></i></span>
      </div>
    </form>

    <hr>

    <h6 class="sidebar-title">Categories</h6>
    <div class="row link-color-default fs-14 lh-24">
      @foreach($categories as $c)
      <div class="col-6">
      	<a href="{{ route('blog.search', ['name' => 'category', 'query' => $c->id]) }}">{{ $c->title }}</a>
      </div>
      @endforeach
    </div>

    <hr>

    <h6 class="sidebar-title">Top posts</h6>
    
    @foreach($toppost as $t)
    <a class="media text-default align-items-center mb-5" href="{{ route('blog.post', ['slug' => $t->slug]) }}">
      <img class="rounded w-65px mr-4" src="{{ asset('storage/series/' . $t->image_url) }}">
      <div class="media-body small-2 lh-4 mb-0">{!! mb_substr($t->content,0,50) !!}</div>
    </a>
@endforeach
    

    <hr>

    <h6 class="sidebar-title">Tags</h6>
    <div class="gap-multiline-items-1">
    @foreach($tags as $t)
      <a class="badge badge-secondary" href="{{ route('blog.search', ['name' => 'tag', 'query' => $t->id]) }}">{{ $t->tag }}
      </a>
    @endforeach
    </div>

    <hr>

    <h6 class="sidebar-title">About</h6>
    <p class="small-3">The Absolutcast is Id consectetur excepteur labore ut esse nulla laboris quis nulla consectetur.</p>


  </div>
</div>