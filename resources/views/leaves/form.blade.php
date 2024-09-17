<form class="container-sm" action="{{$action}}" method="POST" enctype="multipart/form-data">
    @csrf

    <h4>Select Employee</h4>
    <div class="form-group">
        <select name="employee_id" class="form-control" id="employee_id" required>
            <option value="">Select Employee</option>
            @foreach($employees as $employee)
            <option value="{{ $employee->employee_id }}">{{ $employee->firstname }}</option>
        @endforeach
        
        </select>
    </div>




    <div class="form-group">
        <x-textfield name="start_date" label="Start Date" type="date" placeholder="Enter leave start date" />

    </div>

    <div class="form-group">
        <x-textfield name="end_date" label="End Date" type="date" placeholder="Enter leave end date" />

    </div>

    <div class="form-group">
        <x-textfield name="reason" label="Reason" type="text" placeholder="Enter reason for leave" />

    </div>

    @isset($edit)
        @method('PATCH')
    @endisset

    <button type="submit" class="btn btn-primary">Submit</button>
</form>