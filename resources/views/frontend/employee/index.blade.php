@extends('common.master')

@section('content')
<h1>Employee List</h1>
@if ($message = Session::get('success'))
<div>
  <p>{{ $message }}</p>
</div>
@endif
<a href="{{ url('/employee/create') }}">Create Employee</a><br><br>
<table class="employee-table">
  <tr>
    <th>No</th>
    <th>Name</th>
    <th>Position</th>
    <th>Role</th>
    <th>Age</th>
    <th>Email</th>
    <th>Image</th>
    <th>Phone</th>
    <th>Date of Birth</th>
    <th>Address</th>
    <th>Department</th>
    <th>Actions</th>
  </tr>
  @foreach($employees as $employee)
  <tr>
    <td>{{ $employee->id }}</td>
    <td>{{ $employee->name }}</td>
    <td>{{ $employee->position }}</td>
    <td>{{ $employee->role }}</td>
    <td>{{ $employee->age }}</td>
    <td>{{ $employee->email }}</td>
    <td class="profile-home"><img src="{{ asset('images/' . $employee->image) }}" alt="Photo" width="50px" height="50px"></td>
    <td>{{ $employee->phone }}</td>
    <td>{{ $employee->dob }}</td>
    <td>{{ $employee->address }}</td>
    <td>{{ $employee->department_id }}</td>
    <td>
      <form action="{{ url('/employee/delete/'.$employee->id) }}" method="POST">
        <a href="{{ url('/employee/edit/'.$employee->id) }}">Edit</a>
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection