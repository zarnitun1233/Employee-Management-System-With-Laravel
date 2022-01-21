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
                <th>Email</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Duration</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Action</th>
                <th>Accept</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($leaves as $leave)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $leave->Employee->name }}</td>
                <td>{{ $leave->Employee->email }}</td>
                <td>{{ $leave->fromDate }}</td>
                <td>{{ $leave->toDate }}</td>
                <td>{{ $leave->duration }}</td>
                <td>{{ $leave->reason }}</td>
                @if ($leave->status == null)
                   <td>
                     <span class="show-status-pending">Pening</span>
                   </td>
                @else
                  <td class="show-status">
                    <span class="show-status-accept">Accepted</span>
                  </td>
                @endif
                <td>
                  <form action="{{ route('leaves.delete',['id'=>$leave->id]) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="leaves-delete">Delete</button>
                  </form>
                </td>
                <td>
                  <form action="{{ route('leaves.accept',['id'=>$leave->id]) }}" method="POST">
                    @csrf
                    @if ($leave->status == 0)
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
              <a href="list?page={{$page+1}}" class="paginate-btn disabled">
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
            <a href="{{ route('leaves.create') }}" class="create-btn bg-btn">
              Create
            </a>
          </div>
        </div>
        
      </div>
      <div>
      </div>
    @else
    <span>no data</span>
    @endif
@endsection