@extends('common.master')

@section('content')
<div class="list-design">
  <div class="list-design-container salary-detail-container">
    <h1 class="list-title">Salary Detail</h1>
    <div class="employee-info">
    <h2>Employee Info</h2>
    <table class="employee-info-table">
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Position</th>
        <th>Department</th>
      </tr>
      <tr>
        <td>{{ $details[0]->name }}</td>
        <td>{{ $details[0]->age }}</td>
        <td>{{ $details[0]->position }}</td>
        <td>{{ $department[0]->name }}</td>
      </tr>
    </table>
    </div>
    <div class="employee-salary">
    <h2>Salary History</h2>
      <table class="employee-salary-table">
        <tr>
          <th>Date</th>
          <th>Salary</th>
        </tr>
        @foreach($details as $detail)
        <tr>
          <td>{{ date('d-m-Y', strtotime($detail->date)) }}</td>
          <td>{{ $detail->amount }}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
<button onclick="history.back()" class="list-edit-back">Back</button>
@endsection