<div>
    @extends('layouts.main')
    
    
    @section('title','Leaves')
    
    
    
    @section('content')
    
    <h1>List of Leaves</h1>
    
    
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Start Date</th>
          <th scope="col">End Date</th>
          <th scope="col">Reason</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
       
        
    
        @foreach ($leaves as $leave)
        <tr>
          <th scope="row">{{$leave->leaves_id}}</th>
          <td>{{$leave->start_date}}</td>
          <td>{{$leave->end_date}}</td>
          <th>{{$leave->reason}}</th>
          <td>{{$employee->name ??'N/A'}}</td> 
          
          <td>
          <a href="{{route('leaves.show',$leave->leaves_id)}}"class="btn btn-outline-primary">View</a>
            <a href="{{route('leaves.edit',$leave->leaves_id)}}"class="btn btn-outline-secondary">Edit</a>
            <form action="{{ route('leaves.destroy', $leave->leaves_id) }}" method="POST" style="display:inline;">
             
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this subject?')">Delete</button>
              @csrf
            </form></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
    
    
    <div class="d-flex justify-content-left">
    <!-- <button type="button" class="btn btn-primary btn-lg">Add Student</button> -->
    
    <a class="btn btn-primary mb-3" href="{{route('leaves.create')}}">Add Leave</a>
    
    </div>
    
    
    @endsection
    
    </div>
    