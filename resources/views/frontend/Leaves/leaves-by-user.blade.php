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
        <h2 class="leaves-title">Your's Leaves</h2>
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
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $leave->emp_name }}</td>
              <td>{{ $leave->department_name}}</td>
              <td>{{ $leave->leave_fromDate }}</td>
              <td>{{ $leave->leave_toDate }}</td>
              <td>{{ $leave->leave_duration }}</td>
              <td>
                <a href="{{ route('leaves-reason',['id' => $leave->leave_id]) }}">Detail</a>
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
              <td class="leaves-user-action">
               @if ($leave->leave_status == null)
                <form class="leaves-action-form"  action="{{ route('leaves-delete',['id'=> $leave->leave_id]) }}" method="POST">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="empId" value="{{ $leave->emp_id }}">
                    <button type="submit" class="leaves-delete">Delete</button>
                </form>
                    <a href="{{ route('leaves-edit',['id'=>$leave->leave_id]) }}"  class="leaves-edit">Edit</a>
               @endif
              </td>
            </tr>
            @php
              $i++;    
            @endphp
            @endforeach
          </tbody>
        </table>
        <div class="button-group">
          <a href="{{ auth()->user()->role === '1' ? route('employee-list') :  route('employee-profile',['id'=> auth()->user()->id ])}}" class="back-btn bg-btn">
            Back
          </a>
          {{-- need admin id or user id to create leaves --}}
          <a href="{{ route('leaves-create',['id' => auth()->user()->id ]) }}" class="create-btn bg-btn">
            Create
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@else
<div class="no-data-leaves">
  <div class="no-data-leaves-alert">No Data To Display</div>
</div>
<div class="no-data-btn">
<div class="button-group">
  <a href="{{ auth()->user()->role === '1' ? route('employee-list') :  route('employee-profile',['id'=> auth()->user()->id ])}}" class="back-btn bg-btn">
    Back
  </a>
  {{-- need admin id or user id to create leaves --}}
  <a href="{{ route('leaves-create', auth()->user()->id) }}" class="create-btn bg-btn">
    Create
  </a>
</div>
</div>
@endif
@endsection