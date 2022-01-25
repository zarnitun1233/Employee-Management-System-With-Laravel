@extends('common.master')

@section('content')
<h1 class="employee-list">Salary List</h1>
@if ($message = Session::get('success'))
<div>
  <p class="employee-list-message">{{ $message }}</p>
</div>
@endif
<div class="employee">
  <a href="{{ url('/salary/create') }}">Create Salary</a><br><br>
  <table class="employee-table">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Position</th>
      <th>Salary Amout</th>
      <th>Date</th>
      <th>Actions</th>
    </tr>
    @foreach($salaries as $salary)
    <tr>
      <td>{{ $salary->id }}</td>
      <td>{{ $salary->employee->name }}</td>
      <td>{{ $salary->employee->position }}</td>
      <td>{{ $salary->amount }}</td>
      <td>{{ $salary->date }}</td>
      <td>
        <form action="{{ url('/salary/delete/'.$salary->id) }}" method="POST">
          <a href="{{ url('/salary/edit/'.$salary->id) }}" class="edit">Edit</a>
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button class="delete">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table><br><br>
  {{ $salaries->links() }}
</div>
@endsection