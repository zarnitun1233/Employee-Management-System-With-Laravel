@extends('common.master')


@section('content')
    <form action="{{route('post.mail')}}" method="POST">
      @csrf
      <input type="email" name="email"><br>
      @error('empId')
          <p>{{$message}}</p>
      @enderror
      <button type="submit">Send</button>
    </form>
@endsection
