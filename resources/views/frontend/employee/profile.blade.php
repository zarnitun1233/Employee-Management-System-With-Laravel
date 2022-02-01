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
      <img src="{{ asset('images/' . 'img_avatar2.png') }}" alt="Profile Picture">
    </div>
    <table class="list-table">
      <tr>
        <td>Name</td>
        <td>{{ $employee->name }}</td>
      </tr>
      <tr>
        <td>Position</td>
        <td>{{ $employee->position }}</td>
      </tr>
      <tr>
        <td>Role</td>
        @if ($employee->role == 1)
        <td>Admin</td>
        @else 
        <td>Employee</td>
        @endif
      </tr>
      <tr>
        <td>Age</td>
        <td>{{ $employee->age }}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>{{ $employee->email }}</td>
      </tr>
      <tr>
        <td>Phone</td>
        <td>{{ $employee->phone }}</td>
      </tr>
      <tr>
        <td>Date of Birth</td>
        <td>{{ $employee->dob }}</td>
      </tr>
      <tr>
        <td>Address</td>
        <td>{{ $employee->address }}</td>
      </tr>
      <tr>
        <td>Department</td>
        <td>{{ $employee->department->name }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection