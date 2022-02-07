@extends('common.master')

@section('content')
<form action="{{ route('employee-post-search') }}" method="POST" class="form-inline">
    @csrf
    <div class="emp-search">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div><br>
    <div class="emp-search">
        <label for="dept">Department</label>
        <select name="department">
            <option value="" selected>Select Department</option>
            @foreach ($departments as $department)
            <option value="{{$department['id']}}">{{$department['name']}}</option>
            @endforeach
        </select>
    </div>
    <div class="emp-search">
        <label for="position">Position</label>
        <select name="position">
            <option value="" selected>Select Position</option>
            <option value="Junior">Junior</option>
            <option value="Senior">Senior</option>
            <option value="Sub Leader">Sub Leader</option>
            <option option value="Leader">Leader</option>
            <option value="Manager">Manager</option>
        </select>
    </div>
    <div class="emp-search">
        <label for="jd">Join Date</label>
        <input type="date" name="jd" id="jd">
    </div>
    <div>
        <button type="submit">Search</button>
    </div>
</form>
@if (Session::has('datas'))
@if (sizeof(Session::get('datas')) === 0)
<div class="not-found-data">No Search Data</div>
@endif
@endif
@if (!Session::has('datas'))
      <div class="show-no-data">No Data To Display</div>
    @endif
<div class="list-design">
    <div class="list-design-container">
        <table class="list-table">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Position</th>
                <th>role</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Department</th>
                <th>Join Date</th>
            </tr>
            @if (Session::has('datas'))
            @php
            $employees = Session::get('datas');
            $i = 1;
            @endphp
            @if (sizeof($employees))
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $employee['name'] }}</td>
                    <td>{{ $employee['position'] }}</td>
                    <td>{{ $employee['role'] === '1' ? 'Admin' : 'Employee' }}</td>
                    <td>{{ $employee['dob'] }}</td>
                    <td>{{ $employee['address'] }}</td>
                    <td>{{ $employee['department_name']}}</td>
                    <td>{{ explode(" ",$employee['created_at'])[0] }}</td>
                </tr>
                @php
                $i++;
                @endphp
                @endforeach
            </tbody>
            @endif
            @endif
        </table>
    </div>
    <div class="btn">
    <a href="{{ route('employee-list') }}" class="back-button">Back</a>
  </div>
@endsection