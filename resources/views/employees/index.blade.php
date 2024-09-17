@extends('layouts.main')


@section('title','Employees')



@section('content')

<h1>List of Employee</h1>



<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Email</th>
      <th scope="col">DoB</th>
      <th scope="col">Gender</th>
      <th scope="col">Position</th>
      <th scope="col">Hire Date</th>

      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   
    
     
  </tbody>
  @foreach ($employees as $employee)
  <tr>
      <th scope="row">{{$employee->employee_id}}</th>
      <td>{{$employee->firstname}}</td>
      <td>{{$employee->lastname}}</td>
      <td>{{$employee->email}}</td>
      <td>{{$employee->dob}}</td>
      <td>{{$employee->gender}}</td>
      <td>{{$employee->position}}</td>
      <td>{{$employee->hiredate}}</td>
     
      
       
      <td>
        <a href="{{route('employees.show',$employee->employee_id)}}"class="btn btn-outline-primary">View</a>
        <a href="{{route('employees.edit', $employee->employee_id)}}"class="btn btn-outline-secondary">Edit</a>
        <form action="{{ route('employees.destroy', $employee->employee_id) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
          @csrf
        </form></td>
    </tr>
    @endforeach
</table>
{{-- {{ $employees->links()}} --}}



<div class="d-flex justify-content-left">
<!-- <button type="button" class="btn btn-primary btn-lg">Add Student</button> -->

<a class="btn btn-primary mb-3" href="{{route('employees.create')}}">Add Employee</a>

</div>


@endsection
