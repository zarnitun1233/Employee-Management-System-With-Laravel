@extends('common.master')

@section('content')
<h1 class="employee-edit">Edit Salary</h1>
<form action="" method="POST" enctype="multipart/form-data" class="employee-edit-form">
  @csrf
  <label for="name">Employee Name</label><br>
  <select name="employee_id" id="name">
    <option value="{{ $salary->employee_id }}">{{ $salary->employee->name }} ({{$department[0]->name}})</option>
    @foreach($employees as $employee)
    <option value="{{ $employee->id }}">{{ $employee->name }} ({{$employee->department->name}})</option>
    @endforeach
  </select><br>
  @error('name')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="amount">Salary Amount</label><br>
  <input type="text" id="amount" name="amount" value="{{ $salary->amount }}"><br>
  @error('amount')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="date">Date</label><br>
  <input type="date" id="date" name="date" value="{{ $salary->date }}"><br>
  @error('date')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <input type="submit" name="submit" value="Update" class="create-employee">
  <a href="{{ url('/salary/list') }}" class="back-create">Back</a>
</form>
@endsection