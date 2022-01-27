@extends('common.master')


@section('content')
<form action="{{ route('post.change.password') }}" method="POST">
  @csrf
  <input type="hidden" name="email" value="{{ request()->email }}">
  <input type="hidden" name="token" value="{{ request()->token }}">
  <label for="">Password</label>
  @error('email')
      <span>{{ $message }}</span>
  @enderror
  <input type="password" name="password"><br>
  @error('password')
     <span>{{ $message }}</span>
  @enderror
  <label for="">Confirm Password</label>
  <input type="password" name="password_confirmation"><br>
  @error('password_confirmation')
  <span>{{ $message }}</span>
  @enderror
  <button class="" type="submit">Update</button>
</form>

@endsection