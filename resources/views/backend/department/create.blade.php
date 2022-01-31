@extends('common.master')

@section('content')
<h2 class="department-create-header">Create New Department</h2>
<form action="{{ url('/department/create') }}" method="POST" enctype="multipart/form-data" class="create-department-form">
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
      @error('description')
      <p class="validate-description-error">{{ $message }}</p>
      @enderror <br>
      <div class="btn">
        <button type="submit">Create</button>&nbsp;&nbsp;&nbsp;&nbsp;
        <form action="{{ url('/department/list') }}" method="GET">
          <button>Back</button>
        </form>
      </div>
    </table>
  </div>
</form>
<!--<div class="btn">
<button onclick="history.back()">Back</button>
</div>-->
@endsection