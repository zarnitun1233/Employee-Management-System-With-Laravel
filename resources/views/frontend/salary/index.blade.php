@extends('common.master')

@section('content')
<div class="list-design salary-list">
  <div class="list-design-container">
    <h1 class="list-title">Salary List</h1>
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
        <th>Department</th>
        <th>Salary Amout</th>
        <th>Actions</th>
      </tr>
      @foreach($salaries as $salary)
      <tr>
        <td>{{ $salary->id }}</td>
        <td>{{ $salary->employee->name }}</td>
        <td>{{ $salary->employee->position }}</td>
        <td>{{ $salary->employee->department->name }}</td>
        <td>{{ $salary->amount }}</td>
        <td>
          <form action="{{ url('/salary/delete/'.$salary->id) }}" method="POST">
            <a href="{{ url('/salary/detail/'.$salary->employee->id) }}" class="list-detail">Detail</a>
            <a href="{{ url('/salary/edit/'.$salary->id) }}" class="list-edit">Edit</a>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="list-delete" onclick="confirmation()">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table><br><br>
  </div>
  {{ $salaries->links() }}
</div>
@endsection