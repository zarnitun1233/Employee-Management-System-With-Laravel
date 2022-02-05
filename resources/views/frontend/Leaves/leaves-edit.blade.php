@extends('common.master')

@section('content')
    @if (Session::has('msg'))
        <p>{{ Session::get('msg') }}</p>
    @endif
    @if($leave)
    <form action="{{ route('leaves-update',['id'=>$leave->id]) }}" method="POST" >
      @method('put')
      @csrf
      <div>
        <input type="hidden" name="empId" value="{{ $leave->employee_id }}">
      </div>
      <div>
        <label for="From Date">From Date</label>
        <input type="date" name="fromDate" value="{{ $leave->fromDate }}"><br>
        @error('fromDate')
          {{ $message }}
        @enderror
      </div><br>
      <div>
        <label for="To Date">To Date</label>
        <input type="date" name="toDate" value="{{ $leave->toDate }}"><br>
        @error('toDate')
          {{ $message }}
        @enderror
      </div><br>
      <div>
        <label for="Duration">Duration</label>
        <input type="text" name="duration" value="{{ $leave->duration }}"><br>
        @error('duration')
            {{ $message }}
        @enderror
      </div><br>
      <div>
        <label for="Reason">Reason</label>
        <textarea name="reason" id="" cols="30" rows="10" >{{ $leave->reason }}</textarea>
        @error('reason')
            {{ $message }}
        @enderror
      </div><br>
      <div>
        <button type="submit" name="create">Create</button>
      </div><br>
    </form>
    <div>
      <button onclick="history.back()">Back</button>
    </div><br>
    @endif
@endsection

