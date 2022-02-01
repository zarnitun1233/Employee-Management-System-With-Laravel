@extends('common.master')

@section('content')
<div class="list-design employee-list">
  <div class="list-design-container">
    <h1 class="list-title">Profile</h1>
    @if ($message = Session::get('success'))
    <div>
      <p class="show-alert">{{ $message }}</p>
    </div>
    @endif
    <div class="image">
      <img src="{{ asset('images/' . $employee->image) }}" alt="Profile Picture">
    </div>
  </div>
</div>
@endsection