@extends('common.master')

@section('content')
<h2 class="employee-create-header change-pwd-header">Change New Password</h2>
<form action="{{ route('post-change-password') }}" method="POST" enctype="multipart/form-data" class="employee-create-form change-pwd-form">
  @csrf
  <table class="employee-table">
    <input type="hidden" name="email" value="{{ request()->email }}">
    <input type="hidden" name="token" value="{{ request()->token ?? ' ' }}">
    <tr>
      <td class="employee-label"><label for="">Password</label></td>
      <td><input type="password" name="password"><br>
        @error('password')
        <span>{{ $message }}</span>
        @enderror
      </td>
    </tr>
    <tr>
      <td class="employee-label"><label for="">Confirm Password</label></td>
      <td><input type="password" name="password_confirmation"><br>
        @error('password_confirmation')
        <span>{{ $message }}</span>
        @enderror
      </td>
    </tr>
  </table>
  <div class="btn">
    <button type="submit">Update</button>&nbsp;&nbsp;&nbsp;&nbsp;
  </div>
</form>
@endsection