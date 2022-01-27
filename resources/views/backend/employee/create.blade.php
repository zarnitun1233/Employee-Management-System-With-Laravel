@extends('common.master')

@section('content')
<h1 class="employee-create employee">Create Employee</h1>
<form action="" method="POST" enctype="multipart/form-data" class="employee-create-form">
  @csrf
  <label for="name">Name</label><br>
  <input type="text" id="name" name="name"><br>
  @error('name')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="position">Position</label><br>
  <select name="position" id="position">
    <option value="Junior">Junior</option>
    <option value="Senior">Senior</option>
    <option value="Sub Leader">Sub Leader</option>
    <option value="Leader">Leader</option>
    <option value="Manager">Manager</option>
  </select><br>
  @error('position')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="role">Role</label><br>
  <select name="role" id="role">
    <option value="0">Employee</option>
    <option value="1">Admin</option>
  </select><br>
  @error('role')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="age">Age</label><br>
  <input type="number" id="age" name="age"><br>
  @error('age')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="email">Email</label><br>
  <input type="email" id="email" name="email"><br>
  @error('email')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="password">Password</label><br>
  <input type="password" id="password" name="password"><br>
  @error('password')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="confirmPassword">Confirm Password</label><br>
  <input type="password" id="confirmPassword" name="confirmPassword"><br>
  @error('confirmPassword')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="image" class="profile">Choose Photo <br>
    <input type="file" id="image" name="image">
    <img src="{{ asset('images/' . 'profile.png') }}" alt="Profile">
  </label><br><br>
  @error('image')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="phone">Phone Number</label><br>
  <input type="text" id="phone" name="phone"><br>
  @error('phone')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="dob">Date of Birth</label><br>
  <input type="date" id="dob" name="dob"><br>
  @error('dob')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="address">Address</label><br>
  <textarea name="address" id="address" cols="20" rows="5" style="resize:none;"></textarea><br>
  @error('address')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="department">Department</label><br>
  <select name="department_id" id="department">
    @foreach($departments as $department)
    <option value="{{$department->id }}">{{$department->name }}</option>
    @endforeach
  </select><br>
  @error('department_id')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <input type="submit" name="submit" value="Create" class="create-employee">
  <a href="{{ url('/employee/list') }}" class="back-create">Back</a>
</form>
@endsection