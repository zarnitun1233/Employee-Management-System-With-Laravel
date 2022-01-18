@extends('common.master')

@section('content')
<h1>Edit Employee</h1>
<form action="" method="POST" enctype="multipart/form-data">
  @csrf
  <label for="name">Name</label><br>
  <input type="text" id="name" name="name" value="{{ $employee->name }}"><br>
  @error('name')
  {{ $message }}
  @enderror <br>
  <label for="position">Position</label><br>
  <input type="text" id="position" name="position" value="{{ $employee->position }}"><br>
  @error('position')
  {{ $message }}
  @enderror <br>
  <label for="role">Role</label><br>
  <select name="role" id="role">
    <option value="{{ $employee->role }}">{{ $employee->role }}</option>
    <option value="Employee">Employee</option>
    <option value="Admin">Admin</option>
  </select><br>
  @error('role')
  {{ $message }}
  @enderror <br>
  <label for="age">Age</label><br>
  <input type="number" id="age" name="age" value="{{ $employee->age }}"><br>
  @error('age')
  {{ $message }}
  @enderror <br>
  <label for="email">Email</label><br>
  <input type="email" id="email" name="email" value="{{ $employee->email }}"><br>
  @error('email')
  {{ $message }}
  @enderror <br>
  <label for="image" class="profile profile-edit">Choose Photo <br>
    <input type="file" id="image" name="image">
    <img src="{{ asset('images/' . $employee->image) }}" alt="Profile">
  </label><br><br>
  @error('image')
  {{ $message }}
  @enderror <br>
  <label for="phone">Phone Number</label><br>
  <input type="text" id="phone" name="phone" value="{{ $employee->phone }}"><br>
  @error('phone')
  {{ $message }}
  @enderror <br>
  <label for="dob">Date of Birth</label><br>
  <input type="date" id="dob" name="dob" value="{{ $employee->dob }}"><br>
  @error('dob')
  {{ $message }}
  @enderror <br>
  <label for="address">Address</label><br>
  <input type="text" id="address" name="address" value="{{ $employee->address }}"><br>
  @error('address')
  {{ $message }}
  @enderror <br>
  <label for="department">Department</label><br>
  <select name="department_id" id="department">
    <option value="{{ $employee->department_id }}">Department A</option>
    <option value="1">Department A</option>
    <option value="2">Department B</option>
    <option value="3">Department C</option>
  </select><br>
  @error('department_id')
  {{ $message }}
  @enderror <br>
  <input type="submit" name="submit" value="Edit Employee">
</form>
@endsection