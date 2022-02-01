@extends('common.master')

@section('content')
<h1 class="employee-edit">Edit Salary</h1>
<form action="" method="POST" enctype="multipart/form-data" class="employee-edit-form">
  @csrf
  <label for="name">Employee Name</label><br>
  <input type="text" name="name" id="name" value="{{ $salary->employee->name }}" readonly><br>
  @error('name')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="department">Department Name</label><br>
  <input type="text" id="department" name="department" value="{{ $department[0]->name }}" readonly><br><br>
  <label for="position">Position</label><br>
  <input type="text" id="position" name="position" value="{{ $salary->employee->position }}" readonly><br><br>
  <label for="amount">Salary Amount</label><br>
  <input type="text" id="amount" name="amount" value="{{ $salary->amount }}"><br>
  @error('amount')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="date">Date</label><br>
  <input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>"><br>
  @error('date')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <input type="submit" name="submit" value="Update" class="create-employee">
  <a href="{{ url('/salary/list') }}" class="back-create">Back</a>
</form>
@endsection