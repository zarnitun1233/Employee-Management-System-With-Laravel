@extends('common.master')

@section('content')
@if (Session::has('msg'))
<p class="employee-list-message">{{ Session::get('msg') }}</p>
@endif
<h2 class="employee-create-header">Create Leaves</h2>
<form action="{{ route('leaves-store') }}" method="POST" enctype="multipart/form-data" class="employee-create-form">
  @csrf
  <div>
    <input type="hidden" name="empId" value="{{ request()->id }}"><br>
  </div><br>
  <table class="employee-table">
    <tr>
      <td class="employee-label"><label for="From Date">From Date</label></td>
      <td><input type="date" name="fromDate"><br>
        @error('fromDate')
        {{ $message }}
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="To Date">To Date</label></td>
      <td><input type="date" name="toDate"><br>
        @error('toDate')
        {{ $message }}
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="Duration">Duration</label></td>
      <td><input type="text" name="duration"><br>
        @error('duration')
        {{ $message }}
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="Reason">Reason</label></td>
      <td><textarea name="reason" id="" cols="30" rows="10"></textarea>
        @error('reason')
        {{ $message }}
        @enderror
      </td>
    </tr>
  </table>
  <div class="btn">
    <button type="submit" name="create">Create</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="" onclick="history.back()">Back</a>
  </div>
</form>
@endsection