@extends('common.master')

@section('content')
<!--<h2 class="department-create-header">Create New Department</h2>
<form action="{{ url('/department/create') }}" method="POST" enctype="multipart/form-data" class="create-department-form">
  <div class="department-create-form">
    <table class="department-create-table">
      @csrf
      <label for="name">Department Name</label><br>
      <input type="text" id="name" name="name"><br>
      @error('name')
      <p class="validate-department-error">{{ $message }}</p>
      @enderror <br>
      <label for="position">Description</label><br>
      <input type="text" id="description" name="description"><br>
      @error('description')
      <p class="validate-description-error">{{ $message }}</p>
      @enderror <br>
      <div class="btn">
        <button type="submit">Create</button>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{ url('/department/list') }}">Back</a>
      </div>
    </table>
  </div>
</form>-->
<h2 class="employee-create-header">Create New Department</h2>
<form action="" method="POST" enctype="multipart/form-data" class="employee-create-form">
  @csrf
  <table class="employee-table">
    <tr>
      <td class="employee-label"><label for="name">Department Name: <span>*</span></label></td>
      <td><input type="text" name="name" id="name">
        @error('name')
        <span>Department Name cannot be empty!</span>
        @enderror
      </td>
    </tr>
    <tr class="textarea-form">
      <td class="employee-label"><label for="description">Description:<span>*</span></label></td>
      <td><textarea name="description" id="description"></textarea>
        @error('description')
        <span>Description cannot be empty!</span>
        @enderror
      </td>
    </tr>
    </table>
  <div class="btn">
    <button type="submit">Create</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ url('/employee/list') }}">Back</a>
  </div>
</form>
@endsection