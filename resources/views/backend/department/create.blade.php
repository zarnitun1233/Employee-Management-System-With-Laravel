@extends('common.master')

@section('content')
<h2 class="department-create-header">Create New Department</h2>
<!--<form action="" method="POST" enctype="multipart/form-data" class="create-department-form">-->
<div class="department-create-form">
<table class="department-create-table">
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
  <!--<input type="submit" name="submit" value="Create" class="create-department">
  <a href="{{ url('/department/list') }}" class="back-create">Back</a>-->
  <div class="btn">
        <button type="submit"><a href="">Create</a></button>&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="cancel"><a href="{{ url('/department/list') }}">Back</a></button>
        </div>
</form>
@endsection