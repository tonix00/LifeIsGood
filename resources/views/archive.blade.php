@extends('layouts.page')

@section('content')
<div class="page-number">
    Page <span>{{$blogs->currentPage()}}/{{$totalPage}}</span>
</div>

<div class="archive">
    <ul class="archive-list">
        @if(count($blogs)>0)
            @foreach($blogs as $blog)

		        <li class="archive-item">
		            <article class="card">
		                <a href="{{url('/')}}/detail/{{$blog->id}}" class="card-link">
		                    <img src="{{url('/').$blog->eye_catch_image}}" alt="" class="card-image">
		                    <div class="card-bottom">
		                        <h1 class="card-title">{{$blog->title}}</h1>
		                        <time class="card-date" datetime="{{date("d M, Y",strtotime($blog->created_at))}}">
		                            {{date("d M, Y",strtotime($blog->created_at))}}
		                        </time>
		                    </div>
		                </a>
		            </article>
		        </li>
		        
		    @endforeach
		@endif
 
    </ul>
</div>
<div class="paginate">
{{ $blogs->links('vendor.pagination.custom') }}
</div>
@endsection


