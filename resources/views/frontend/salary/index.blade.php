@extends('common.master')

@section('content')
<h1>Salary List</h1>
@if ($message = Session::get('success'))
<div>
  <p>{{ $message }}</p>
</div>
@endif

@endsection