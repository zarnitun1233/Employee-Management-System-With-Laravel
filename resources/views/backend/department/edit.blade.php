@extends('common.master')

@section('content')
<h2 class="employee-create-header">Edit Department</h2>
<form action="" method="POST" enctype="multipart/form-data" class="employee-create-form">
  @csrf
  <table class="employee-table">
    <tr>
      <td class="employee-label"><label for="name">Department Name: <span>*</span></label></td>
      <td>
        <select name="name" id="name">
          <option value="{{ $dep->name }}">{{ $dep->name }}</option>
          @foreach($departments as $department)
            <option value="{{ $department->name }}">{{ $department->name }}</option>
          @endforeach
        </select>
      </td>
    </tr>
    <tr class="textarea-form">
      <td class="employee-label"><label for="description">Description:<span>*</span></label></td>
      <td><textarea name="description" id="description">{{ $dep->description }}</textarea>
      </td>
    </tr>
    </table>
  <div class="btn">
    <button type="submit">Create</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ url('/department/list') }}">Back</a>
  </div>
</form>
@endsection
