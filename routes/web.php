<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FinanceController;

/*
|---------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});


Route::get('/login', [LoginController::class, 'index'])->name('login.show');
Route::post('/login/submit', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register',[LoginController::class,'register'])->name('register');
Route::get('send-otp',[LoginController::class,'sendotp'])->name('send-otp');
Route::get('show-otp',[LoginController::class,'showotp'])->name('show-otp');
Route::post('verify-otp',[LoginController::class,'verifyotp'])->name('verify-otp');
// SuperAdmin Routes
Route::middleware(['auth', 'role:1'])->group(function() {
    Route::get('superadmin/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');
    Route::get('superadmin/stripe', [SuperAdminController::class, 'finance'])->name('superadmin.stripe');
    Route::get('superadmin/profile', [SuperAdminController::class, 'profile'])->name('superadmin.profile');
    Route::get('superadmin/email', [SuperAdminController::class, 'email'])->name('superadmin.email');
    Route::get('superadmin/homepage', [SuperAdminController::class, 'homepage'])->name('superadmin.homepage');
});

// Admin Routes
Route::middleware(['auth', 'role:2'])->group(function() {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
});

// User Routes
Route::middleware(['auth', 'role:3'])->group(function() {
    Route::get('user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
});
