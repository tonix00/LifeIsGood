@extends('layouts.admin')

@section('content')
<form action="{{url('/')}}/admin/editpost/{{$id}}" class="form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="id" value="{{$id}}" />
    {{csrf_field()}}
    <label for="image" class="form-title">EYE CATCH IMAGE
        <div class="form-file u-clear" id="upload">
            {{$blog->eye_catch_image}}<span class="form-file-button">UPLOAD</span>
        </div>
    </label>
    <input type="file" id="image" name="select_file" class="input input-image" style="display: none;">
    <label for="title" class="form-title">TITLE</label>
    <div class="form-body">
        <input type="text" id="title" name="title" class="input input-text" value="{{$blog->title}}" />
    </div>
    <label for="contents" class="form-title">CONTENTS</label>
    <div class="form-textarea">
        <textarea id="inquiry" cols="30" rows="10" name="content" class="input input-contents">{{$blog->content}}</textarea>
    </div>
    @if(count($errors)>0)
        <div class="alert alert-danger alert-block" style="margin-top: 20px">
            <strong>Error</strong>
        </div>
    @endif
    <label for="submit" class="form-button">
        <div class="button">
            <p class="button-text">Submit</p>
        </div>
    </label>
    <input type="submit" id="submit" class="input input-submit">
    <a href="/admin" class="form-button">
        <div class="button">
            <p class="button-text">Back</p>
        </div>
    </a>
</form>
<script src="{{url('/')}}/js/upload.js"></script>
@endsection