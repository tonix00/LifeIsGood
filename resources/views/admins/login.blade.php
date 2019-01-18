@extends('layouts.admin')

@section('content')
<form action="{{url('/')}}/admin/checkLogin" method="post" class="form">
    {{csrf_field()}}
    <label for="user-id" class="form-title">USER ID</label>
    <input type="text" id="user-id" name="user_id" class="input input-text">
    <label for="password" class="form-title">PASSWORD</label>
    <input type="text" id="password" name="password" class="input input-text">

    @if($message=Session::get('error') || count($errors))
        <div class="alert alert-danger alert-block" style="margin-top: 20px">
            <strong>Error</strong>
        </div>
    @endif
    
    <label for="submit" class="form-button">
        <div class="button">
            <p class="button-text">Login</p>
        </div>
    </label>
    <input type="submit" id="submit" class="input input-submit">
</form>
@endsection