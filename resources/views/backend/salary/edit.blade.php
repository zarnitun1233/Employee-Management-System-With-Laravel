@extends('common.master')

@section('content')
<h2 class="employee-create-header">Edit Salary</h2>
<form action="" method="POST" enctype="multipart/form-data" class="employee-create-form">
  @csrf
  <table class="employee-table">
    <tr>
      <td class="employee-label"><label for="name">Employee Name</label></label></td>
      <td><input type="text" name="name" id="name" value="{{ $salary->employee->name }}" readonly><br>
  @error('name')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="department">Department Name</label></label></td>
      <td><input type="text" id="department" name="department" value="{{ $department[0]->name }}" readonly><br><br>
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="position">Position</label></td>
      <td><input type="text" id="position" name="position" value="{{ $salary->employee->position }}" readonly><br><br>
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="amount">Salary Amount</label></td>
      <td><input type="text" id="amount" name="amount" value="{{ $salary->amount }}"><br>
  @error('amount')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="date">Date</label></td>
      <td><input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>"><br>
  @error('date')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
      </td>
    </tr>
  </table>
  <div class="btn">
    <button type="submit">Create</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ url('/salary/list') }}">Back</a>
  </div>
</form>
@endsection