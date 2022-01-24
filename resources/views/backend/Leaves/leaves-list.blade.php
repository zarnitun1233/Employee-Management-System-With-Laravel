@extends('common.master')

@section('content')
@php
 $i=1;    
@endphp
    @if (Session::has('msg'))
        <p>{{ Session::get('msg') }}</p>
    @endif
    @if ($leaves)
      <table>
        <thead>
          <tr>
            <th>No</th>
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
            <td>{{ $leave->fromDate }}</td>
            <td>{{ $leave->toDate }}</td>
            <td>{{ $leave->duration }}</td>
            <td>{{ $leave->reason }}</td>
            @if ($leave->status == 0)
               <td>pending</td>
            @else
              <td>Accept</td>
            @endif
            <td>
              <form action="{{ route('leaves.delete',['id'=>$leave->id]) }}" method="POST">
                @method('delete')
                @csrf
                <button type="submit">Delete</button>
              </form>
            </td>
            <td>
              <form action="{{ route('leaves.accept',['id'=>$leave->id]) }}" method="POST">
                @csrf
                @if ($leave->status == 0)
                  <button class="">Accept</button>
                @else 
                <button class="" disabled>Accept</button>
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
     
    @else
    <span>no data</span>
    @endif
@endsection