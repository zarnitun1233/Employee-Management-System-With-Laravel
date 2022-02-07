@extends('common.master')

@section('content')
@if (Session::has('msg'))
<p>{{ Session::get('msg') }}</p>
@endif
@if($leave)
<h2 class="employee-create-header create-department-header">Edit Leaves</h2>
<form action="{{ route('leaves-update',['id'=>$leave->id]) }}" method="POST" enctype="multipart/form-data" class="employee-create-form create-department">
  @method('put')
  @csrf
  <div>
    <input type="hidden" name="empId" value="{{ old('empId') ?? $leave->employee_id }}">
  </div>
  <table class="employee-table">
    <tr>
      <td class="employee-label"><label for="From Date">From Date</label></td>
      <td><input type="date" name="fromDate" value="{{ old('fromDate') ?? $leave->fromDate }}"><br>
        @error('fromDate')
        {{ $message }}
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="To Date">To Date</label></td>
      <td><input type="date" name="toDate" value="{{ old('toDate') ?? $leave->toDate }}"><br>
        @error('toDate')
        {{ $message }}
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="Duration">Duration</label></td>
      <td><input type="text" name="duration" value="{{ old('duration') ?? ($errors->has('duration') ? '' : $leave->duration ) }}"><br>
        @error('duration')
        {{ $message }}
        @enderror
      </td>
    </tr>
    <tr class="textarea-form">
      <td class="employee-label"><label for="Reason">Reason</label></label></td>
      <td><textarea name="reason" id="" cols="30" rows="10">{{ old('reaon') ?? ($errors->has('reason') ? '' : $leave->reason ) }}</textarea>
        @error('reason')
        {{ $message }}
        @enderror</textarea>
      </td>
    </tr>
  </table>
  <div class="btn">
    <button type="submit">Create</button>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="#" onclick="history.back()">Back</a>
  </div>
</form>
@endif
@endsection