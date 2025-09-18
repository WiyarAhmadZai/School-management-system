<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/students', function () {
        return view('students.index');
    })->name('students.index');

    Route::get('/teachers', function () {
        return view('teachers.index');
    })->name('teachers.index');

    Route::get('/courses', function () {
        return view('courses.index');
    })->name('courses.index');

    Route::get('/grades', function () {
        return view('grades.index');
    })->name('grades.index');

    Route::get('/profile', function () {
        return view('profile.edit');
    })->name('profile.edit');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});
