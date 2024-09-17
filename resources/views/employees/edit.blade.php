@extends('layouts.main')
@section('title', 'Edit ' . $employee->name)

@section('content')
    @include('employees.form', [
        'action' => route('employees.update', $employee->employee_id),
        'edit' => true
    ])
@endsection