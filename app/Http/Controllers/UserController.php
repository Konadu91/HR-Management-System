<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller

    {
        public function index()
        {
            $users = User::all();
            return view('users.index', compact('users'));
        }
    
        public function create()
        {
            return view('users.create');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
            ]);
    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            return redirect()->route('users.index')->with('success', 'User created successfully.');
        }
    
        public function show(User $user)
        {
            return view('users.show', compact('user'));
        }
    
        public function edit(User $user)
        {
            return view('users.edit', compact('user'));
        }
    
        public function update(Request $request, User $user)
        {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]);
    
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
    
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        }
    
        public function destroy(User $user)
        {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully.');
        }
    }