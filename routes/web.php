<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;




Route::redirect('/','/login');
Route::get('/login',[AuthController::class, 'getLoginPage'])->name('auth.loginPage')->middleware('guest');

Route::get('/forgot-password',[AuthController::class, 'getForgotPasswordPage'])->name('auth.getForgotPasswordPage')->middleware('guest');
Route::post('/forgot-password',[AuthController::class, 'requestForgotPasswordLink'])->name('auth.requestForgotPasswordLink')->middleware('guest');

Route::get('/reset-password/{token}',[AuthController::class, 'getPasswordResetPage'])->name('password.reset')->middleware('guest');
Route::post('/reset-password',[AuthController::class, 'resetPassword'])->name('auth.resetPassword')->middleware('guest');


Route::post('/login',[AuthController::class, 'authenticate'])->name('auth.login')->middleware('guest');
Route::post('/logout',[AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');


Route::resource('employees', EmployeeController::class)->middleware('auth');
Route::resource('leaves', LeaveController::class)->parameters(['leaves' => 'leave']);

// Route::resource('leaves', LeaveController::class)->middleware('auth');

Route::get('/homepage', function(Request $request) {
    
    $name = $request->query('name');
    $age = request()->query('age');
    $number = request()->query('number');


    return view('homepage', [ 
        'name' => $name,
        'age' => $age,
        'number' => $number,
     ]);

})->name('homepage');