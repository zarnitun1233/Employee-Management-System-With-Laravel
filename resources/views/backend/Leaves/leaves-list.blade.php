@extends('common.master')
@section('leaves')
    <link rel="stylesheet" href="{{ asset('css/leaves.css') }}">
@endsection
@section('content')
@php
 $i=1;    
@endphp
    @if (!empty($leaves && $leaves->count()))
    @php
    $page = request()->query('page');
    @endphp
      <div class="leaves-list">
        <div class="leaves-list-container">
          <h2 class="leaves-title">Employees Leaves List</h2>
          <form action="{{ route('leaves-searchByName') }}" class="leaves-search" method="POST">
            @csrf
            <div class="leaves-input">
              <input type="search" name="name" id="leaves-search" placeholder="Search by name">
            </div>
            <div class="leaves-input">
              <button type="submit ">Search</button>
            </div>
          </form>
          @if (Session::has('msg'))
          <div class="show-alert">
            {{Session::get('msg')}}
          </div>
          @endif
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
              @foreach ($leaves as $leave)
              <tr class="leaves-row">
                <td>{{ $i }}</td>
                <td>{{ $leave->emp_name }}</td>
                <td>{{ $leave->department_name }}</td>
                <td>{{ $leave->fromDate }}</td>
                <td>{{ $leave->toDate }}</td>
                <td>{{ $leave->duration }}</td>
                <td>
                  <a href="{{ route('leaves-reason',['id' => $leave->id]) }}">Detail</a>
                </td>
                @if ($leave->status == null)
                   <td>
                     <span class="show-status-pending show-status">Pending</span>
                   </td>
                @else
                  <td class="show-status">
                    <span class="show-status-accept show-status">Approved</span>
                  </td>
                @endif
                <td>
                  <form class="leaves-action-form"  action="{{ route('leaves-delete',['id'=>$leave->id]) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="leaves-delete {{$leave->status !==  null ? 'disabled' :'' }}">Delete</button>
                  </form>
                  <form class="leaves-action-form" action="{{ route('leaves-accept',['id'=>$leave->id]) }}" method="POST">
                    @csrf
                    @if ($leave->status == null)
                      <button class="leaves-accept">Accept</button>
                    @else 
                    <button class="leaves-accept disabled">Accept</button>
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
          <div class="paginate-row">
            @if ($leaves->previousPageUrl())
            <div class="previous">
              <a href="list?page={{$page-1}}" class="paginate-btn">
                Previous
              </a>
            </div>
            @endif
            <div class="previous">
              <a href="list?page={{$page}}" class="paginate-btn current">
                {{$page}}
              </a>
            </div>
            @if ($leaves->nextPageUrl())
            <div class="previous">
              <a href="list?page={{$page+1}}" class="paginate-btn">
                {{$page+1}}
              </a>
            </div>
            <div class="previous">
              <a href="list?page={{$page+1}}" class="paginate-btn">
                Next
              </a>
            </div>
            @endif
          </div>
          <div class="button-group">
            <a href="#" class="back-btn bg-btn" onclick="history.back()">
              Back
            </a>
            {{-- need admin id or user id to create leaves --}}
            <a href="{{ route('leaves-create', auth()->user()->id) }}" class="create-btn bg-btn">
              Create
            </a>
          </div>
        </div>
      </div>
    @else
    <span>no data</span>
    @endif
    <script src="{{ asset('js/Leaves/leaves.js') }}"></script>
@endsection