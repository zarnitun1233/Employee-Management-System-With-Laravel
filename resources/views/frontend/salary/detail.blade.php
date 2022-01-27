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
        <td>Mg Mg</td>
      </tr>
      <tr>
        <td>Age</td>
        <td>11</td>
      </tr>
      <tr>
        <td>Position</td>
        <td>Junior</td>
      </tr>
      <tr>
        <td>Department</td>
        <td>Design</td>
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
        <tr>
          <td>1.1.22</td>
          <td>100000 kyats</td>
        </tr>
      </table>
    </div>
  </div>

</div>
@endsection