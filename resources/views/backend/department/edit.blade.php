@extends('common.master')

@section('content')
<h1>Edit Employee</h1>
<form action="" method="POST" enctype="multipart/form-data">
  @csrf
  <label for="name">Department Name</label><br>
  <input type="text" id="name" name="name" value="{{ $department->name }}"><br>
  @error('name')
  {{ $message }}
  @enderror <br>
  <label for="position">Description</label><br>
  <input type="text" id="descriiption" name="descriiption" value="{{ $department->descriiption }}"><br>
  @error('descriiption')
  {{ $message }}
  @enderror <br>
  <input type="submit" name="submit" value="Edit Employee">
</form>
@endsection
