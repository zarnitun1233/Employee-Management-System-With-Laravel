@extends('common.master')

@section('content')
<h2 class="employee-create-header create-department-header">Edit Department</h2>
<form action="" method="POST" enctype="multipart/form-data" class="employee-create-form create-department">
  @csrf
  <table class="employee-table">
    <tr>
      <td class="employee-label"><label for="name">Department Name: <span>*</span></label></td>
      <td><input type="text" name="name" id="name" value="{{ $dep->name }}"></td>
    </tr>
    <tr class="textarea-form">
      <td class="employee-label"><label for="description">Description:<span>*</span></label></td>
      <td><textarea name="description" id="description">{{ $dep->description }}</textarea>
      </td>
    </tr>
    </table>
  <div class="btn">
    <button type="submit">Update</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ route('department-list') }}">Back</a>
  </div>
</form>
@endsection
