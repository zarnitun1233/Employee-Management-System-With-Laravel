@extends('common.master')

@section('content')
<div class="list-design">
  <div class="list-design-container">
<h1 class="list-title">Department List</h1>
<div class="create-export">
      <a href="{{ url('/department/create') }}">Create Department</a>
    </div>
@if ($message = Session::get('success'))
<div>
  <p class="show-alert">{{ $message }}</p>
</div>
@endif
  <table class="list-table">
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
          <a href="{{ url('/department/edit/'.$department->id) }}" class="list-edit">Edit</a>
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button class="list-delete">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table><br><br>
</div>
{{ $departments->links() }}
@endsection