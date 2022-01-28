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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var data_date = <?php echo $date; ?>;
  var data_salary = <?php echo $salary; ?>;
  var barChartData = {
    labels: data_date,
    datasets: [{
      label: 'Salary',
      backgroundColor: "#04AA6D",
      data: data_salary
    }]
  };
  window.onload = function() {
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx, {
      type: 'bar',
      data: barChartData,
      options: {
        elements: {
          rectangle: {
            borderWidth: 2,
            borderColor: 'rgb(0, 255, 0)',
            borderSkipped: 'bottom'
          }
        },
        responsive: true,
        title: {
          display: true,
          text: 'Salary History'
        }
      }
    });
  };
</script>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Salary History By Graph</div>
        <div class="panel-body">
          <canvas id="canvas"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection