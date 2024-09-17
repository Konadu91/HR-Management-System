<!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
@extends ('layouts.main')

@section('title','Add New Employee')


@section('content')

<!-- <h1>Create Post</h1> -->
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@include ('employees.form',['action'=>route('employees.store')])





@endsection