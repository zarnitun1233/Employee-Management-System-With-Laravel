@extends('common.master')

@section('content')
<h1 class="employee-edit">Edit Employee</h1>
<form action="" method="POST" enctype="multipart/form-data" class="employee-edit-form">
  @csrf
  <label for="name">Name</label><br>
  <input type="text" id="name" name="name" value="{{ $employee->name }}"><br>
  @error('name')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="position">Position</label><br>
  <input type="text" id="position" name="position" value="{{ $employee->position }}"><br>
  @error('position')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="role">Role</label><br>
  <select name="role" id="role">
    <option value="{{ $employee->role }}">{{ $employee->role }}</option>
    <option value="Employee">Employee</option>
    <option value="Admin">Admin</option>
  </select><br>
  @error('role')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="age">Age</label><br>
  <input type="number" id="age" name="age" value="{{ $employee->age }}"><br>
  @error('age')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="email">Email</label><br>
  <input type="email" id="email" name="email" value="{{ $employee->email }}"><br>
  @error('email')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="image" class="profile profile-edit">Choose Photo <br>
    <input type="file" id="image" name="image">
    <img src="{{ asset('images/' . $employee->image) }}" alt="Profile">
  </label><br><br>
  @error('image')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="phone">Phone Number</label><br>
  <input type="text" id="phone" name="phone" value="{{ $employee->phone }}"><br>
  @error('phone')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="dob">Date of Birth</label><br>
  <input type="date" id="dob" name="dob" value="{{ $employee->dob }}"><br>
  @error('dob')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="address">Address</label><br>
  <input type="text" id="address" name="address" value="{{ $employee->address }}"><br>
  @error('address')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="department">Department</label><br>
  <select name="department_id" id="department">
    <option value="{{ $employee->department->id }}">{{ $employee->department->name }}</option>
    @foreach($departments as $department)
    <option value="{{ $department->id }}">{{ $department->name }}</option>
    @endforeach
  </select><br>
  @error('department_id')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <input type="submit" name="submit" value="Update" class="employee-edit-button">
  <a href="{{ url('/employee/list') }}" class="back-update">Back</a>
</form>
@endsection