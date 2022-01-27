@extends('common.master')

@section('content')
  <h1 class="create-employee-header">Create New Employee</h1>
  <div class="create-employee">
   <form action="" method="POST" enctype="multipart/form-data" class="create-employee-form" >
  @csrf
  <label for="name">Name:</label>
  <input type="text" name="empname" ><br>
  @error('name')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="position">Position:</label>
      <select name="position" size="1" id="position">
        <option value="junior">Junior</option>
        <option value="Senior">Senior</option>
        <option value="sub-leader">Sub Leader</option>
        <option value="leader">Leader</option>
        <option value="manager">Manager</option>
      </select><br>
  @error('position')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="role">Role:</label>
      <select name="employeerole" size="1" id="employeerole">
        <option value="employee">Employee</option>
        <option value="admin">Admin</option>
      </select><br>
  @error('role')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="department">Department:</label>
      <select name="department" size="1" id="department">
        <option value="marketing">Marketing</option>
        <option value="hr">Human Resource</option>
        <option value="Software">Software</option>
        <option value="hardware">Hardware</option>
        <option value="finance">Finance</option>
      </select><br>
    @foreach($departments as $department)
    <option value="{{$department->id }}">{{$department->name }}</option>
    @endforeach
  </select><br>
  @error('department_id')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="email">Email:</label>
      <input type="email" name="email"><br>
  @error('email')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="pswd">Password:</label>
      <input type="password" name="pswd"><br>
  @error('password')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="confirmpswd">Confirm Password:</label>
      <input type="password" name="confirmpswd"><br>
  @error('confirmPassword')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="age">Age:</label>
      <input type="number" name="age"><br>
  @error('age')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="mobile">Phone Number:</label>
      <input type="tel" name="mobile" id="mobile"><br>
  @error('phone')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <label for="dob">Date of Birth:</label>
      <input type="date" name="dob" id="dob"><br>
  @error('dob')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <p class="textarea-form">
        <label for="address">Address:</label>
        <textarea name="address" id="address"></textarea>
      </p><br>
  @error('address')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>

  <label for="choosephoto">Choose Photo:</label>
      <input type="file" id="choosephoto">
    <!--<img src="{{ asset('images/' . 'profile.png') }}" alt="Profile">-->
  </label><br><br>
  @error('image')
  <p class="validate-employee-error">{{ $message }}</p>
  @enderror <br>
  <div class="btn">
        <button type="submit"  name="submit"><a href="">Create</a></button>&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="cancel"><a href="{{ url('/employee/list') }}">Back</a></button>
      </div>
</form>
@endsection