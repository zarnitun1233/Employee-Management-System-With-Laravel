@extends('common.master')


@section('content')
@if (session('message'))
    {{session('message')}}
@endif
<div class="reset-pswd">
    <h2>Reset Password Form</h2>
    <form action="{{route('post.mail')}}" method="POST">
      @csrf
      <label for="email">Email:</label>
      <input type="email" name="email"><br>
      @error('empId')
          <p>{{$message}}</p>
      @enderror
      <button type="submit">Send</button>
    </form>
</div>
@endsection
