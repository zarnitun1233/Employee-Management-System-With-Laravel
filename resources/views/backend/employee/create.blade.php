@extends('common.master')

@section('content')
<h1>Create Employee</h1>
<form action="" method="POST" enctype="multipart/form-data">
  @csrf
  <label for="name">Name</label><br>
  <input type="text" id="name" name="name"><br>
  @error('name')
  {{ $message }}
  @enderror <br>
  <label for="position">Position</label><br>
  <input type="text" id="position" name="position"><br>
  @error('position')
  {{ $message }}
  @enderror <br>
  <label for="role">Role</label><br>
  <select name="role" id="role">
    <option value="0">Employee</option>
    <option value="1">Admin</option>
  </select><br>
  @error('role')
  {{ $message }}
  @enderror <br>
  <label for="age">Age</label><br>
  <input type="number" id="age" name="age"><br>
  @error('age')
  {{ $message }}
  @enderror <br>
  <label for="email">Email</label><br>
  <input type="email" id="email" name="email"><br>
  @error('email')
  {{ $message }}
  @enderror <br>
  <label for="password">Password</label><br>
  <input type="password" id="password" name="password"><br>
  @error('password')
  {{ $message }}
  @enderror <br>
  <label for="confirmPassword">Confirm Password</label><br>
  <input type="password" id="confirmPassword" name="confirmPassword"><br>
  @error('confirmPassword')
  {{ $message }}
  @enderror <br>
  <label for="image" class="profile">Choose Photo <br>
    <input type="file" id="image" name="image">
    <img src="{{ asset('images/' . 'profile.png') }}" alt="Profile">
  </label><br><br>
  @error('image')
  {{ $message }}
  @enderror <br>
  <label for="phone">Phone Number</label><br>
  <input type="text" id="phone" name="phone"><br>
  @error('phone')
  {{ $message }}
  @enderror <br>
  <label for="dob">Date of Birth</label><br>
  <input type="date" id="dob" name="dob"><br>
  @error('dob')
  {{ $message }}
  @enderror <br>
  <label for="address">Address</label><br>
  <input type="text" id="address" name="address"><br>
  @error('address')
  {{ $message }}
  @enderror <br>
  <label for="department">Department</label><br>
  <select name="department_id" id="department">
    @foreach($departments as $department)
    <option value="{{$department->id }}">{{$department->name }}</option>
    @endforeach
  </select><br>
  @error('department_id')
  {{ $message }}
  @enderror <br>
  <input type="submit" name="submit" value="Create">
  <a href="{{ url('/employee/list') }}">Back</a>
</form>
@endsection