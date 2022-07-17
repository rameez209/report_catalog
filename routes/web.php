<?php

use App\Models\Report;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Common Resource Routes:
// index - Show all reports
// show - show single report
// create - show form to create new report
// store - Store new report
// edit = show form to edit report
// update - update report 
// destroy - delete report

// All Report
Route::get('/', [ReportController::class, 'index']);

// Show Create Form
Route::get('/reports/create', [ReportController::class, 'create'])->middleware('auth');

// Store Report Data
Route::post('/reports', [ReportController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->middleware('auth');

// Update Report
Route::PUT('/reports/{report}', [ReportController::class, 'update'])->middleware('auth');

// Delete report
Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->middleware('auth');

// Manage reports
Route::get('/reports/manage', [ReportController::class, 'manage'])->middleware('auth');

// Single Report
Route::get('/reports/{report}', [ReportController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

