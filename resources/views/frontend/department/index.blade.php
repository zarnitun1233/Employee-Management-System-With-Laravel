@extends('common.master')

@section('content')
<h1 class="employee-list">Department List</h1>
@if ($message = Session::get('success'))
<div>
  <p class="employee-list-message">{{ $message }}</p>
</div>
@endif
<div class="employee">
  <a href="{{ url('/department/create') }}">Create Department</a><br><br>
  <table class="employee-table">
    <tr>
      <th>No</th>
      <th>Department Name</th>
      <th>Description</th>
      <th>Actions</th>
    </tr>
    @foreach($departments as $department)
    <tr>
      <td>{{ $department->id }}</td>
      <td>{{ $department->name }}</td>
      <td>{{ $department->description }}</td>
      <td>
        <form action="{{ url('/department/delete/'.$department->id) }}" method="POST">
          <a href="{{ url('/department/edit/'.$department->id) }}" class="edit">Edit</a>
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button class="delete">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table><br><br>
  {{ $departments->links() }}
</div>
@endsection