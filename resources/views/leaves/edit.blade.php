@extends('layouts.main')
@section('title', 'Edit ')

@section('content')
    @include('leaves.form', [
        'action' => route('leaves.update', $leave->leaves_id),
        'edit' => true
    ])
@endsection