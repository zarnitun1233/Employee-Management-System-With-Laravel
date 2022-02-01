@extends('common.master')

@section('content')
@section('leaves')
    <link rel="stylesheet" href="{{ asset('css/leaves.css') }}">
@endsection
    <h2>Reason Detail</h2>
    <p>{{$leave->reason}}</p>

    <div class="button-group">
        <a href="#" class="back-btn bg-btn" onclick="history.back()">
              Back
        </a>
    </div>
@endsection