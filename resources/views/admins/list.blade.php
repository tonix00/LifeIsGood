@extends('layouts.admin')

@section('content')
    @if($message = Session::get('success'))
    <div class="alert alert-success" style="margin-top: 20px">
        {{$message}}
    </div>
    @endif
    <a href="{{url('/')}}/admin/post" class="l-main-button">
        <div class="button">
            <p class="button-text">New Article</p>
        </div>
    </a>
    <ul class="archive archive-admin">

        @if(count($blogs)>0)
            @foreach($blogs as $blog)
            <li class="archive-item">
                <a href="{{url('/')}}/admin/editable/{{$blog->id}}" class="post-article">
                    <time class="post-article-date" datetime="2016-9-16">{{date("d M, Y",strtotime($blog->created_at))}}</time>
                    <h1 class="post-article-title">{{$blog->title}}</h1>
                </a>
            </li>
            @endforeach
        @endif

    </ul>
@endsection