<h2>User Details</h2>
<p><strong>ID:</strong> {{ $user->id }}</p>
<p><strong>Name:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>

@if ($user->employee)
    <h3>Employee Information</h3>
    <p><strong>Position:</strong> {{ $user->employee->position }}</p>
    <p><strong>Leaves:</strong></p>
    <ul>
        @foreach ($user->employee->leaves as $leave)
            <li>{{ $leave->start_date }} - {{ $leave->end_date }}</li>
        @endforeach
    </ul>
@else
    <p>No associated employee.</p>
@endif