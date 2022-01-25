@extends('common.master')


@section('content')

<form action="{{ route('post.change.password') }}" method="POSt">
  @csrf
  <input type="hidden" name="email" value="{{$datas['email']}}">
  <input type="hidden" name="token" value="{{$datas['token']}}">
  <label for="">Password</label>
  <input type="password" name="password"><br>
  <label for="">Confirm Password</label>
  <input type="password" name="password_confirmation"><br>
  <button class="" type="submit">Update</button>
</form>

@endsection