<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('auth.home');
})->name('home');

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/account', function () {
    return view('auth.account');
})->name('account');

Route::get('/account-new', [AccountController::class, 'index'])->name('account.new');
Route::post('/account-update', [AccountController::class, 'update'])->name('account.update');
Route::post('/account-password', [AccountController::class, 'changePassword'])->name('account.password');

use App\Http\Controllers\DashboardController;

Route::get('/dashboard-1', [DashboardController::class, 'index'])->name('dashboard.1');

Route::get('/dashboard-2', function () {
    return view('auth.dashboard-2');
})->name('dashboard.2');

Route::get('/calendar', function () {
    return view('auth.calendar');
})->name('calendar');

Route::get('/learning', function () {
    return view('auth.learning');
})->name('learning');

Route::get('/learning-p2', function () {
    return view('auth.learning-p2');
})->name('learning.p2');

Route::get('/payment-method', function () {
    return view('auth.payment-method');
})->name('payment.method');

Route::get('/shopping-cart', function () {
    return view('auth.shopping-cart');
})->name('shopping.cart');

Route::get('/transaction', function () {
    return view('auth.transaction');
})->name('transaction');

Route::get('/refund', function () {
    return view('auth.refund');
})->name('refund');

Route::get('/courses', function () {
    return view('auth.courses');
})->name('courses');

Route::get('/search', function () {
    return view('auth.search');
})->name('search');

Route::get('/free-courses', function () {
    return view('auth.free-courses');
})->name('free.courses');

Route::get('/course-detail', function () {
    return view('auth.course-detail');
})->name('course.detail');

Route::get('/change-password', function () {
    return view('auth.change-password');
})->name('password.change');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('password.reset');

Route::get('/verify', function () {
    return view('auth.verify');
})->name('verification.notice');

// POST Routes for UI Flow Demo
Route::post('/login', function () {
    return redirect()->route('home'); // Flow: Login -> Home
})->name('login.post');

Route::post('/forgot-password', function () {
    return redirect()->route('verification.notice'); // Flow: Forgot -> Verify
})->name('password.email');

Route::post('/verify', function () {
    return redirect()->route('password.reset'); // Flow: Verify -> Reset Password
})->name('verification.verify');

Route::post('/reset-password', function () {
    return redirect()->route('login'); // Flow: Reset -> Login
})->name('password.update');

Route::post('/register', function () {
    return redirect()->route('login'); // Flow: Register -> Login
})->name('register.post');

Route::get('/all-courses', function () {
    return view('auth.category');
})->name('category');

Route::get('/all', function () {
    return view('auth.all');
})->name('all');

Route::get('/modules', function () {
    return view('auth.modules');
})->name('modules');

Route::get('/recommendations', function () {
    return view('auth.recommendations');
})->name('recommendations');

Route::get('/testimonials', function () {
    return view('auth.testimonials');
})->name('testimonials');

Route::get('/reviews', function () {
    return view('auth.reviews');
})->name('reviews');
