@extends('common.master')


@section('content')
    @if (Session::has('msg'))
        <p>{{ Session::get('msg') }}</p>
    @endif
    <form action="{{ route('leaves.store') }}" method="POST" >
      @csrf
      <div>
        <input type="hidden" name="empId" value="{{ request()->id }}"><br>
      </div><br>
      <div>
        <label for="From Date">From Date</label>
        <input type="date" name="fromDate"><br>
        @error('fromDate')
          {{ $message }}
        @enderror
      </div><br>
      <div>
        <label for="To Date">To Date</label>
        <input type="date" name="toDate"><br>
        @error('toDate')
          {{ $message }}
        @enderror
      </div><br>
      <div>
        <label for="Duration">Duration</label>
        <input type="text" name="duration"><br>
        @error('duration')
            {{ $message }}
        @enderror
      </div><br>
      <div>
        <label for="Reason">Reason</label>
        <textarea name="reason" id="" cols="30" rows="10"></textarea>
        @error('reason')
            {{ $message }}
        @enderror
      </div><br>
      <div>
        <button type="submit" name="create">Create</button>
      </div><br>
    </form>
@endsection