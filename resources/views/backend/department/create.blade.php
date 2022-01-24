@extends('common.master')

@section('content')
<h1 class="employee-create">Create Department</h1>
<form action="" method="POST" enctype="multipart/form-data" class="employee-create-form">
  @csrf
  <label for="name">Department Name</label><br>
  <input type="text" id="name" name="name"><br>
  @error('name')
  <p class="validate-department-error">{{ $message }}</p>
  @enderror <br>
  <label for="position">Description</label><br>
  <input type="text" id="description" name="description"><br>
  @error('position')
  <p class="validate-description-error">{{ $message }}</p>
  @enderror <br>
  <input type="submit" name="submit" value="Create" class="create-department">
  <a href="{{ url('/department/list') }}" class="back-create">Back</a>
</form>
@endsection