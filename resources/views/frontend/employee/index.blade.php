@extends('common.master')

@section('content')
<div class="list-design employee-list">
  <div class="list-design-container">
    <h1 class="list-title">Employee List</h1>
    <div class="create-export">
<<<<<<< HEAD
    <a href="{{ url('/employee/search') }}" class="search-btn">Search</a>
      <a href="{{ url('/employee/create') }}">Create Employee</a>
      <a href="{{ url('/export') }}">Export</a>
=======
    <a href="{{ route('employee-search') }}">Search</a>
      <a href="{{ route('employee-create') }}">Create Employee</a>
      <a href="{{ route('export') }}">Export</a>
>>>>>>> 145486d18ec01eef53324d345a1a835cb3c1a793
    </div>
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
          <form action="{{ route('employee-delete', $employee->id) }}" method="POST" class="btn">
            <a href="{{ route('employee-edit', $employee->id) }}" class="list-edit">Edit</a>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="list-delete" onclick="confirmation()" >Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table><br><br>
  </div>
  {{ $employees->links() }}
</div>
<script>
  function confirmation(){
    var result = confirm("Are you sure to delete?");
    if(result){
        // Delete logic goes here
    }
}
</script>
@endsection