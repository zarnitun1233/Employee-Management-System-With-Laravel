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
    <table class="list-table">
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Position</th>
        <th>Role</th>
        <th>Age</th>
        <th>Email</th>
        <th>Image</th>
        <th>Phone</th>
        <th>DOB</th>
        <th>Address</th>
        <th>Department</th>
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
        <td class="age">{{ $employee->age }}</td>
        <td class="email">{{ $employee->email }}</td>
        <td class="profile-home"><img src="{{ asset('images/' . $employee->image) }}" alt="Photo" width="70px" height="50px"></td>
        <td class="phone">{{ $employee->phone }}</td>
        <td class="dob">{{ $employee->dob }}</td>
        <td class="address">{{ $employee->address }}</td>
        <td>{{ $employee->department->name }}</td>
        <td>
          <form action="{{ url('/employee/delete/'.$employee->id) }}" method="POST">
            <a href="{{ url('/employee/edit/'.$employee->id) }}" class="list-edit">Edit</a>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="list-delete">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table><br><br>
  </div>
</div>
@endsection