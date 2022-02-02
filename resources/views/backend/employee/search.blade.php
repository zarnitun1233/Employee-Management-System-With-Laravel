
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
            <option value="" selected>Select Department</option>
            @foreach ($departments as $department)
            <option value="{{$department['id']}}">{{$department['name']}}</option>
            @endforeach
        </select>
        </div>
        <div>
        <label for="">position</label>
        <select name="position">
            <option value="" selected>Select Position</option>
            <option value="Junior">Junior</option>
            <option value="Senior">Senior</option>
            <option value="Sub Leader">Sub Leader</option>
            <option option value="Leader">Leader</option>
            <option value="Manager">Manager</option>
        </select>
        <div>
            <label for="">Join Date</label>
            <input type="date" name="join_date">
        </div><br>
        </div><br>
        <div>
        <button type="submit">Search</button>
        </div>
    </form>
    @if (Session::has('datas'))
        @if (sizeof(Session::get('datas')) === 0)
            <span>No Data</span>
        @endif
    @endif
    <table>
        <thead>
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
        </thead>
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
                        <td>{{ $employee['created_at'] }}</td>
                    </tr>  
                    @php 
                        $i++;    
                    @endphp
                @endforeach
            </tbody>
            @endif
        @endif 
    </table> 
@endsection