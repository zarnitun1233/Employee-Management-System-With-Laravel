@extends('common.master')

@section('content')
@section('leaves')
<link rel="stylesheet" href="{{ asset('css/leaves.css') }}">
@endsection
<div class="list-design leaves-reason">
  <div class="list-design-container">
    <h1 class="list-title">Reason Detail</h1>
    <table class="list-table">
      <tr>
        <th>Reason</th>
      </tr>
      <tr>
        <td>
          <p>{{ $leave->reason }}</p>
        </td>
      </tr>
    </table>
    <div class="button-group">
      <a href="#" class="back-btn bg-btn" onclick="history.back()">
        Back
      </a>
    </div>
  </div>
</div>
@endsection