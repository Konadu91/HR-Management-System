<?php

// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Leave;
// use App\Models\Employee;

// use App\Models\User;

// class LeaveController extends Controller

//     {
//         public function index(Request $request)
//         {
//             $leaves = Leave::all();
//             return view('leaves.index', compact('leaves'));
//         }
    
//         public function create()
//         {
//             $employees = Employee::all(); // Fetch all employees from the database

//             // dd('$employees');
//             return view('leaves.create', compact('employees')); // Pass employees to the view
//         }
    
//         public function store(Request $request)
//         {
//             $request->validate([
//                 'employee_id' => 'required|exists:employees,employee_id',
//                 'start_date' => 'required|date',
//                 'end_date' => 'required|date|after:start_date',
//                 'reason' => 'required|string',
//             ]);

//             $user = auth()->user();
            

//             if ($user->isEmployee()) {
//                 if ($user->employee) { // Check if the user has an employee record
//                     $leave = new Leave;
//                     $leave->start_date = $request->start_date;
//                     $leave->end_date = $request->end_date;
//                     $leave->reason = $request->reason;
//                     $leave->employee_id = $user->employee->employee_id; // Safely access employee_id
//                     $leave->save();
    
//             return redirect()->route('leaves.index')->with('success', 'Leave created successfully.');
//         }
//         else {
//             return redirect()->back()->with('error', 'You are not authorized to create leave requests.');
//         }
//     }
// }
    
// public function show(Leave $leave)
// {
//     // Eager load the employee relationship
    
//     return view('leaves.show', compact('leave'));
// }



//         public function edit(Leave $leave)
//         {
//             return view('leaves.edit', compact('leave'));
//         }
        
//         public function update(Request $request, Leave $leave)
//         {
//             $request->validate([
//                 'start_date' => 'required|date',
//                 'end_date' => 'required|date|after:start_date',
//                 'reason' => 'required|string',
//             ]);
        
//             $leave->update([
//                 'start_date' => $request->start_date,
//                 'end_date' => $request->end_date,
//                 'reason' => $request->reason,
//             ]);
        
//             return redirect()->route('leaves.index', $leave)->with('success', 'Leave updated successfully.');
//         }
        
//         public function destroy(Leave $leave)
//         {
//             $leave->delete();
//             return redirect()->route('leaves.index')->with('success', 'Leave deleted successfully.');
//         }    }




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Employee;

class LeaveController extends Controller
{
    public function index(Request $request)
    {
        $leaves = Leave::with('employee')->get(); // Eager load the employee relationship
        return view('leaves.index', compact('leaves'));
    }

    public function create()
    {
        $employees = Employee::all(); // Fetch all employees from the database
        return view('leaves.create', compact('leaves', 'employees')); // Pass employees to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'reason' => 'required|string',
        ]);

        $user = auth()->user();

        if ($user->isEmployee()) {
            if ($user->employee) { // Check if the user has an employee record
                $leave = new Leave;
                $leave->start_date = $request->start_date;
                $leave->end_date = $request->end_date;
                $leave->reason = $request->reason;
                $leave->employee_id = $user->employee->employee_id; // Safely access employee_id
                $leave->save();

                return redirect()->route('leaves.index')->with('success', 'Leave created successfully.');
            } else {
                return redirect()->back()->with('error', 'You are not authorized to create leave requests.');
            }
        } else {
            // Handle case where the user is not an employee
            return redirect()->back()->with('error', 'You are not authorized to create leave requests.');
        }
    }

    public function show($id)
    {
        $leave = Leave::with('employee')->find($id);

        // Check if leave exists
        if (!$leave) {
            return redirect()->route('leaves.index')->with('error', 'Leave not found.');
        }

        return view('leaves.show', compact('leave'));
    }

    public function edit(Leave $leave)
    {
        return view('leaves.edit', compact('leave'));
    }

    public function update(Request $request, Leave $leave)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'reason' => 'required|string',
        ]);

        $leave->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
        ]);

        return redirect()->route('leaves.index')->with('success', 'Leave updated successfully.');
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();
        return redirect()->route('leaves.index')->with('success', 'Leave deleted successfully.');
    }
}
