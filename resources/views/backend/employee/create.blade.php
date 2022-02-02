@extends('common.master')

@section('content')
<h2 class="employee-create-header">Create New Employee</h2>
<form action="" method="POST" enctype="multipart/form-data" class="employee-create-form">
  @csrf
  <table class="employee-table">
    <tr>
      <td class="employee-label"><label for="name">Name: <span>*</span></label></td>
      <td><input type="text" name="name" id="name">
        @error('name')
        <span>Name cannot be empty!</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"> <label for="position">Position:<span>*</span></label></td>
      <td><select name="position" size="1" id="position">
          <option value="">Please choose your Position</option>
          <option value="Junior">Junior</option>
          <option value="Senior">Senior</option>
          <option value="Sub Leader">Sub Leader</option>
          <option value="Leader">Leader</option>
          <option value="Manager">Manager</option>
        </select>
        @error('position')
        <span>Position cannot be empty!</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="role">Role:<span>*</span></label></td>
      <td> <select name="role" size="1" id="role">
          <option value="">Please choose your Role</option>
          <option value="0">Employee</option>
          <option value="1">Admin</option>
        </select>
        @error('role')
        <span>Role cannot be empty!</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="department">Department:<span>*</span></label></td>
      <td><select name="department_id" size="1" id="department">
          <option value="">Please choose your Department</option>
          @foreach($departments as $department)
          <option value="{{ $department->id }}">{{ $department->name }}</option>
          @endforeach
        </select>
        @error('department_id')
        <span>Department cannot be empty!</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="salary">Salary:<span>*</span></label></td>
      <td><input type="number" name="salary" id="salary">
        @error('salary')
        <span>Salary cannot be empty!</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="email">Email:<span>*</span></label></td>
      <td><input type="email" name="email" id="email">
        @error('email')
        <span>Email cannot be empty!</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="pswd">Password:<span>*</span></label></td>
      <td><input type="password" name="password" id="pswd">
        @error('password')
        <span>Password cannot be empty!</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="confirmpswd">Confirm Password:<span>*</span></label></td>
      <td><input type="password" name="confirmPassword" id="confirmpswd"></td>
    </tr>
    <tr>
      <td class="employee-label"><label for="age">Age:<span>*</span></label></td>
      <td><input type="age" name="age" id="age">
        @error('age')
        <span>Age cannot be empty!</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="phone">Phone Number:<span>*</span></label></td>
      <td><input type="tel" name="phone" id="phone">
        @error('phone')
        <span>Phone cannot be empty!</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="dob">Date of Birth:<span>*</span></label></td>
      <td><input type="date" name="dob" id="dob">
        @error('dob')
        <span>Date of Birth cannot be empty!</span>
        @enderror
      </td>
    </tr>
    <tr class="textarea-form">
      <td class="employee-label"><label for="address">Address:<span>*</span></label></td>
      <td><textarea name="address" id="address"></textarea>
        @error('address')
        <span>Address cannot be empty!</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"> <label for="choosephoto">Choose Photo:<span>*</span></label></td>
      <td><input type="file" id="choosephoto" name="image">
        @error('image')
        <span>Image cannot be empty!</span>
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