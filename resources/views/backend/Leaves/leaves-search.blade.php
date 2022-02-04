@extends('common.master')
@section('leaves')
    <link rel="stylesheet" href="{{ asset('css/leaves.css') }}">
@endsection
@section('content')
    @if (sizeof($employees))
    @php
        $i=1;
    @endphp
    <div class="leaves-list">
      <div class="leaves-list-container">
        <h2 class="leaves-title">Employees Search Result</h2>
        <table class="leaves-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Department</th>
              <th>From Date</th>
              <th>To Date</th>
              <th>Duration</th>
              <th>Reason</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($employees as $leave)
            <tr class="leaves-row">
              <td>{{ $i }}</td>
              <td>{{ $leave->emp_name }}</td>
              <td>{{ $leave->department_name}}</td>
              <td>{{ $leave->leave_fromDate }}</td>
              <td>{{ $leave->leave_toDate }}</td>
              <td>{{ $leave->leave_duration }}</td>
              <td>
                <a href="{{ route('leaves.reason',['id' => $leave->leave_id]) }}">Detail</a>
              </td>
              @if ($leave->leave_status == null)
                 <td>
                   <span class="show-status-pending show-status">Pending</span>
                 </td>
              @else
                <td class="show-status">
                  <span class="show-status-accept show-status">Approved</span>
                </td>
              @endif
              <td>
                <form class="leaves-action-form"  action="{{ route('leaves.delete',['id'=>$leave->leave_id]) }}" method="POST">
                  @method('delete')
                  @csrf
                  <button type="submit" class="leaves-delete">Delete</button>
                </form>
                <form class="leaves-action-form" action="{{ route('leaves.accept',['id'=>$leave->leave_id]) }}" method="POST">
                  @csrf
                  @if ($leave->leave_status == null)
                    <button class="leaves-accept">Accept</button>
                  @else 
                  <button class="leaves-accept" disabled>Accept</button>
                  @endif
                </form>
              </td>
            </tr>
            @php
              $i++;    
            @endphp
            @endforeach
          </tbody>
        </table>
        <div class="button-group">
          <a href="#" class="back-btn bg-btn" onclick="history.back()">
            Back
          </a>
          {{-- need admin id or user id to create leaves --}}
          <a href="#" class="create-btn bg-btn">
            Create
          </a>
        </div>
      </div>
    </div>
    @else
    no data
    @endif
@endsection