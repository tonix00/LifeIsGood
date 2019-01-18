@extends('layouts.page')

@section('content')
<div class="single">
    <img src="{{url('/').$blog->eye_catch_image}}" alt="" class="single-image">
    <div class="l-container u-clear">
        <h1 class="single-title">{{$blog->title}}</h1>
        <time class="single-date" datetime="{{date("d M, Y",strtotime($blog->created_at))}}">{{date("d M, Y",strtotime($blog->created_at))}}</time>
        <p class="single-desc">
        	{{$blog->content}}
        </p>
        <div class="single-button">
        	<a href="{{url('/')}}" class="archive-button">
	            <div class="button">
	                <p class="button-text">Top</p>
	            </div>
        	</a>
        </div>
    </div>
</div>
@endsection