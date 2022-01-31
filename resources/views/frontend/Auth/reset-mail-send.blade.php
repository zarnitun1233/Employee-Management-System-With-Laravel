@extends('common.master')


@section('content')
@if (session('message'))
    {{session('message')}}
@endif
    <form action="{{route('post.mail')}}" method="POST">
      @csrf
      <input type="email" name="email"><br>
      <button type="submit">Send</button>
    </form>
@endsection
