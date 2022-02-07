@extends('common.master')


@section('content')
@if ($message = Session::get('success'))
  <div>
    <p class="employee-list-message">{{ $message }}</p>
  </div>
  @endif
@if ($message = Session::get('fail'))
  <div>
    <p class="employee-list-message alert-error">{{ $message }}</p>
  </div>
  @endif
<div class="login-form">
    <h2>Login Form</h2>
  <form action="" method="post">
    @csrf
    <div class="imgcontainer">
      <img src="{{ asset('images/' . 'img_avatar2.png') }}" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
      <span class="psw"><a href="{{ route('reset.password') }}">Forgot password?</a></span>
    </div>
  </form>
  </div>

    @endsection