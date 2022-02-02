@extends('common.master')

@section('content')
<h2 class="employee-create-header">Edit Employee</h2>
<form action="" method="POST" enctype="multipart/form-data" class="employee-create-form">
  @csrf
  <table class="employee-table">
    <tr>
      <td class="employee-label"><label for="name">Name</label></label></td>
      <td><input type="text" id="name" name="name" value="{{ $employee->name }}"><br>
        @error('name')
        <p class="validate-employee-error">{{ $message }}</p>
        @enderror <br>
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="position">Position</label></label></td>
      <td>@if (auth()->user()->role == 1)
        <select name="position" id="position">
          <option value="{{ $employee->position }}">{{ $employee->position }}</option>
          <option value="Junior">Junior</option>
          <option value="Senior">Senior</option>
          <option value="Sub Leader">Sub Leader</option>
          <option value="Leader">Leader</option>
          <option value="Manager">Manager</option>
        </select><br>
        @error('position')
        <p class="validate-employee-error">{{ $message }}</p>
        @enderror <br>
        @else
        <input type="text" value="{{ $employee->position }}" readonly class="readonly" name="position"><br><br>
        @endif
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="role">Role</label></label></td>
      <td> @if (auth()->user()->role == 1)
        <select name="role" id="role">
          <option value="{{ $employee->role }}">
            @if ($employee->role == 1)
            Admin
            @else Employee
            @endif
          </option>
          <option value="Employee">Employee</option>
          <option value="Admin">Admin</option>
        </select><br>
        @error('role')
        <p class="validate-employee-error">{{ $message }}</p>
        @enderror <br>
        @else
        @if ($employee->role == 1)
        <?php $role = "Admin"; ?>
        @else
        <?php $role = "Employee"; ?>
        @endif
        <input type="text" value="{{ $role }}" readonly class="readonly" name="role"><br><br>
        @endif
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="department">Department</label></label></td>
      <td>@if (auth()->user()->role == 1)
        <select name="department_id" id="department">
          <option value="{{ $employee->department->id }}">{{ $employee->department->name }}</option>
          @foreach($departments as $department)
          <option value="{{ $department->id }}">{{ $department->name }}</option>
          @endforeach
        </select><br>
        @error('department_id')
        <p class="validate-employee-error">{{ $message }}</p>
        @enderror <br>
        @else
        <select name="department_id" id="department" class="selectreadonly">
          <option value="{{ $employee->department->id }}">{{ $employee->department->name }}</option>
        </select><br><br>
        @endif
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="email">Email</label></label></td>
      <td><input type="email" id="email" name="email" value="{{ $employee->email }}"><br>
        @error('email')
        <p class="validate-employee-error">{{ $message }}</p>
        @enderror <br>
      </td>
    </tr>
    <td class="employee-label"><label for="age">Age</label></label></td>
    <td class="edit-employee"><input type="number" id="age" name="age" value="{{ $employee->age }}"><br>
      @error('age')
      <p class="validate-employee-error">{{ $message }}</p>
      @enderror <br>
    </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="phone">Phone Number</label></label></td>
      <td><input type="text" id="phone" name="phone" value="{{ $employee->phone }}"><br>
        @error('phone')
        <p class="validate-employee-error">{{ $message }}</p>
        @enderror <br>
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="dob">Date of Birth</label></label></td>
      <td><input type="date" id="dob" name="dob" value="{{ $employee->dob }}"><br>
        @error('dob')
        <p class="validate-employee-error">{{ $message }}</p>
        @enderror <br>
      </td>
    </tr>
    <tr class="textarea-form">
      <td class="employee-label"><label for="address">Address</label></label></td>
      <td><textarea name="address" id="address" cols="20" rows="5" style="resize:none;">{{ $employee->address }}</textarea><br>
        @error('address')
        <p class="validate-employee-error">{{ $message }}</p>
        @enderror <br>
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="image" class="profile profile-edit">Choose Photo</label></td>
      <td><input type="file" id="image" name="image">
        <img src="{{ asset('images/' . $employee->image) }}" alt="Profile">
        </label><br><br>
        @error('image')
        <p class="validate-employee-error">{{ $message }}</p>
        @enderror <br>
      </td>
    </tr>
    @if (auth()->user()->id == request()->route('id'))
    <tr>
      <td class="employee-label"><label for="password">New Password</label></td>
      <td><input type="password" id="password" name="password"><br></td>
    </tr>
    <tr>
      <td class="employee-label"><label for="confirmPassword">Confirm New Password</label></td>
      <td><input type="password" id="confirmPassword" name="confirmPassword"><br>
        @error('confirmPassword')
        <p class="validate-employee-error">{{ $message }}</p>
        @enderror
      </td>
    </tr>
    @endif
  </table>
  <div class="btn">
    <button type="submit">Update</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ url('/employee/list') }}">Back</a>
  </div>
</form>
@endsection