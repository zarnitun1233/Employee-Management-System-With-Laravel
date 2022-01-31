
@extends('common.master')

@section('content')
   <form action="{{ route('employee.post.search') }}" method="POST">
    @csrf
    <div>
      <label for="">Name</label>
      <input type="text" name="name">
    </div><br>
    <div>
      <label for="">department</label>
      <select name="department">
        <option value="" selected>Department</option>
        @foreach ($departments as $department)
        <option value="{{$department['name']}}">{{$department['name']}}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label for="">position</label>
      <select name="position">
        <option value="" selected>position</option>
        <option value="Junior">Junior</option>
        <option value="Senior">Senior</option>
        <option value="Sub Leader">Sub Leader</option>
        <option option value="Leader">Leader</option>
        <option value="Manager">Manager</option>
      </select>
    </div><br>
    <div>
      <button type="submit">Search</button>
  </form>
@endsection