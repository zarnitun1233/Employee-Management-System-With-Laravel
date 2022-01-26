@extends('common.master')

@section('content')
<div class="employee">
  <h1 class="employee-list">Employee List</h1>
  @if ($message = Session::get('success'))
  <div>
    <p class="employee-list-message">{{ $message }}</p>
  </div>
  @endif
  <div class="create-export">
    <a href="{{ url('/employee/create') }}">Create Employee</a>
    <a href="{{ url('/export') }}">Export</a>
  </div>
  <br><br>
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
      <th>Department Name</th>
      <th>Actions</th>
    </tr>
    @foreach($employees as $employee)
    <tr>
      <td>{{ $employee->id }}</td>
      <td>{{ $employee->name }}</td>
      <td>{{ $employee->position }}</td>
      @if ($employee->role == 0)
      <td>Employee</td>
      @else
      <td>Admin</td>
      @endif
      <td>{{ $employee->age }}</td>
      <td>{{ $employee->email }}</td>
      <td class="profile-home"><img src="{{ asset('images/' . $employee->image) }}" alt="Photo" width="70px" height="50px"></td>
      <td>{{ $employee->phone }}</td>
      <td>{{ $employee->dob }}</td>
      <td>{{ $employee->address }}</td>
      <td>{{ $employee->department->name }}</td>
      <td>
        <form action="{{ url('/employee/delete/'.$employee->id) }}" method="POST">
          <a href="{{ url('/employee/edit/'.$employee->id) }}" class="edit">Edit</a>
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button class="delete">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table><br><br>
  {{ $employees->links() }}
</div>
@endsection