@extends('common.master')

@section('content')
<h2 class="employee-create-header">Create New Employee</h2>
<form action="" method="POST" enctype="multipart/form-data" class="employee-create-form">
  @csrf
  <table class="employee-table">
    <tr>
      <td class="employee-label"><label for="name">Name: <span>*</span></label></td>
      <td><input type="text" name="name" id="name" value="{{ old('name') ?? ''}}">
        @error('name')
        <span>{{ $message }}</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"> <label for="position">Position:<span>*</span></label></td>
      <td>
        <select name="position" size="1" id="position">
          @php
            $positions = ['Junior','Leader','Sub Leader','Manager','Senior']    
          @endphp
              <option value {{ !old('position') ? 'selected': null}}>Please Choose Your Role</option>
          @foreach ($positions as $name)
              <option value="{{$name}}" 
                {{
                  old('position') === $name ? 'selected' : null
                }}
              >
                {{$name}}
              </option>
          @endforeach
        </select>
        @error('position')
        <span>{{ $message }}</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="role">Role:<span>*</span></label></td>
      <td> <select name="role" size="1" id="role">
          <option value {{ !old('role') ? 'selected': null}}>Please choose your Role</option>
          @php
              $roles = ['0','1']
          @endphp
          @foreach ($roles as $role)
            <option value="{{$role}}" 
                {{
                  old('role') === $role ? 'selected' : null
                }}
              >
                {{$role === '1' ? 'Admin' :'Employee' }}
            </option>
            @endforeach
        </select>
        @error('role')
        <span>{{ $message }}</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="department">Department:<span>*</span></label></td>
      <td><select name="department_id" size="1" id="department">
          <option value {{!old('department_id')  ? 'selected' : null }}>Please choose your Department</option>
          @foreach($departments as $department)
          <option value="{{ $department->id }}" {{ old('department_id') === ''.$department->id.'' ? 'selected' : null }}>{{ $department->name }}</option>
          @endforeach
        </select>
        @error('department_id')
        <span>{{$message}}</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="salary">Salary:<span>*</span></label></td>
      <td class="create-salary"><input type="number" name="salary" id="salary"  value="{{ old('salary') ?? '' }}">
        @error('salary')
        <span>{{ $message }}</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="email">Email:<span>*</span></label></td>
      <td><input type="email" name="email" id="email"  value="{{ old('email') ?? '' }}">
        @error('email')
        <span>{{$message}}</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="pswd">Password:<span>*</span></label></td>
      <td><input type="password" name="password" id="pswd"  value="{{ old('password') ?? '' }}">
        @error('password')
        <span>{{$message}}</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="confirmpswd">Confirm Password:<span>*</span></label></td>
      <td><input type="password" name="confirmPassword" id="confirmpswd" value="{{ old('confirmPassword') ?? '' }}"></td>
    </tr>
    <tr>
      <td class="employee-label"><label for="age">Age:<span>*</span></label></td>
      <td><input type="age" name="age" id="age" value="{{ old('age') ?? '' }}">
        @error('age')
        <span>{{$message}}</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="phone">Phone Number:<span>*</span></label></td>
      <td><input type="tel" name="phone" id="phone" value="{{ old('phone') ?? ''}}">
        @error('phone')
        <span>Phone cannot be empty!</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="dob">Date of Birth:<span>*</span></label></td>
      <td><input type="date" name="dob" id="dob" value="{{ old('dob') ?? '' }}">
        @error('dob')
        <span>{{ $message }}</span>
        @enderror
      </td>
    </tr>
    <tr class="textarea-form">
      <td class="employee-label"><label for="address">Address:<span>*</span></label></td>
      <td><textarea name="address" id="address" >
        {{ old('address') ?? '' }}
      </textarea>
        @error('address')
        <span>{{$message}}</span>
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
    <a href="{{ route('employee-list') }}">Back</a>
  </div>
</form>
@endsection