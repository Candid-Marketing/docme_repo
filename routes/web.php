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

Route::get('/', [LoginController::class, 'landing'])->name('landing.page');

Route::get('/login', [LoginController::class, 'index'])->name('login');;
Route::post('/login/submit', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/register',[LoginController::class,'register'])->name('register');
Route::get('send-otp',[LoginController::class,'sendotp'])->name('send-otp');
Route::get('show-otp',[LoginController::class,'showotp'])->name('show-otp');
Route::post('verify-otp',[LoginController::class,'verifyotp'])->name('verify-otp');
Route::post('/payment', [LoginController::class, 'proceedToPayment'])->name('payment.proceed');
Route::get('/stripe-payment', [LoginController::class, 'showStripePaymentPage'])->name('stripe.payment');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout.show');

// SuperAdmin Routes
Route::middleware(['auth', 'role:1'])->group(function() {
    Route::get('superadmin/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');
    Route::get('superadmin/stripe', [SuperAdminController::class, 'finance'])->name('superadmin.stripe');
    Route::get('superadmin/profile', [SuperAdminController::class, 'profile'])->name('superadmin.profile');
    Route::get('superadmin/email', [SuperAdminController::class, 'email'])->name('superadmin.email');
    Route::get('superadmin/homepage', [SuperAdminController::class, 'homepage'])->name('superadmin.homepage');
    Route::post('superadmin/homepage', [SuperAdminController::class, 'homestore'])->name('superadmin.homestore');
    Route::get('superadmin/user', [SuperAdminController::class, 'user'])->name('superadmin.user');
    Route::post('superadmin/add-user', [SuperAdminController::class, 'addUser'])->name('superadmin.add-user');
    Route::post('superadmin/stripe-configuration', [SuperAdminController::class, 'stripeupdate'])->name('superadmin.stripe-update');
});

// Admin Routes
Route::middleware(['auth', 'role:2'])->group(function() {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('admin/manage', [AdminController::class, 'manage'])->name('admin.manage');
});

// User Routes
Route::middleware(['auth', 'role:3'])->group(function() {
    Route::get('user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
});
