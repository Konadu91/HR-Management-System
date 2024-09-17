<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeeWelcome;

use App\Models\User;
use Illuminate\Validation\Rule;


class EmployeeController extends Controller
{
   
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'position' => 'required|string',
            'firstname' => 'required|alpha|min:3|max:50',
            'lastname' => 'required|alpha|max:100|min:3',
            'dob' => 'required|before:2000-01-01',
            'gender' => 'required|in:male,female,other',
            'hiredate' => 'required|string',
            'user_id' => ['required','alpha_num'],
            'email' => ['required','email','max:150'],
        ]);

        $employee = new Employee;
        $employee->position = $request->position;
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->email = $request->email;
        $employee->dob= $request->dob;
        $employee->gender = $request->gender;
        $employee->hiredate = $request->hiredate;
        $employee->phone = $request->phone;
        $employee->user_id = auth()->user()->id; // Assuming authenticated user is creating the employee
        $employee->save();

        Mail::to($employee->email)->send(new EmployeeWelcome($employee));


        

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }
    
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }
    
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'phone' => 'required|string',
            'position' => 'required|string',
            'firstname' => 'required|alpha|min:3|max:50',
            'lastname' => 'required|alpha|max:100|min:3',
            'dob' => 'required|before:2000-01-01',
            'gender' => 'required|in:male,female,other',
            'hiredate' => 'required|string',
            'user_id' => ['required','alpha_num'],
            'email' => ['required','email','max:150'],
        ]);
    
        $employee->update([
            'phone' => $request->phone,
            'position' => $request->position,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'dob' => $request->dob,
            'hiredate' => $request->hiredate,
            'user_id' => $request->user_id,
            'gender' => $request->gender,
        ]);
    
        return redirect()->route('employees.show', $employee)->with('success', 'Employee updated successfully.');
    }
    
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }}