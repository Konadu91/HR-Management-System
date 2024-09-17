<!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
@extends ('layouts.main')

@section('title','Create New Leave')


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

@include ('leaves.form',['action'=>route('leaves.store')])





@endsection