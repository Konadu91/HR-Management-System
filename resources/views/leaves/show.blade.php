@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Leave Details</h1>

        @if ($leave->employee)
            <p><strong>Employee Name:</strong> {{ $leave->employee->firstname }} {{ $leave->employee->lastname }}</p>
            <p><strong>Position:</strong> {{ $leave->employee->position }}</p>
            <p><strong>Email:</strong> {{ $leave->employee->email }}</p>
        @else
            <p>Employee information is not available.</p>
        @endif

        <h2>Leave Information</h2>
        <p><strong>Start Date:</strong> {{ $leave->start_date }}</p>
        <p><strong>End Date:</strong> {{ $leave->end_date }}</p>
        <p><strong>Reason:</strong> {{ $leave->reason }}</p>

        <a href="{{ route('leaves.index') }}" class="btn btn-primary">Back to Leave List</a>
    </div>
@endsection
