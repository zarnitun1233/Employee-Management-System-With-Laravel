@extends('common.master')

@section('content')
<div class="list-design">
  <div class="list-design-container">
    <h1 class="list-title">{{ $details[0]->name }}'s Salary Detail</h1>
    <h2>Employee Info</h2>
    <div class="employee-info">
    <table class="employee-info-table">
      <tr>
        <td>Name</td>
        <td>{{ $details[0]->name }}</td>
      </tr>
      <tr>
        <td>Age</td>
        <td>{{ $details[0]->age }}</td>
      </tr>
      <tr>
        <td>Position</td>
        <td>{{ $details[0]->position }}</td>
      </tr>
      <tr>
        <td>Department</td>
        <td>{{ $department[0]->name }}</td>
      </tr>
    </table>
    </div>
    <h2>Salary History</h2>
    <div class="employee-salary">
      <table class="employee-salary-table">
        <tr>
          <th>Date</th>
          <th>Salary</th>
        </tr>
        @foreach($details as $detail)
        <tr>
          <td>{{ $detail->date }}</td>
          <td>{{ $detail->amount }}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>

</div>
@endsection