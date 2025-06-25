<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\StudentController;
use \App\Http\Controllers\UserController;

Route::get('generate', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});

Route::get('database_migrate', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('config:clear');
        \Illuminate\Support\Facades\Artisan::call('route:clear');
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        echo 'Migrations have run successfully.';
    } catch (\Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
});

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('students/store', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/email/check', [StudentController::class, 'emailcheck'])->name('students.emailcheck');
    Route::get('/students/contact/check', [StudentController::class, 'contactcheck'])->name('students.contactcheck');
    Route::get('students', [StudentController::class, 'index'])->name('students.index');         
    Route::get('students/edit/{student}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('students/update/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('students/destroy', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('students/{student}/view', [StudentController::class, 'view'])->name('students.view');

    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/email/check', [UserController::class, 'emailcheck'])->name('users.emailcheck');
    Route::get('/users/contact/check', [UserController::class, 'contactcheck'])->name('users.contactcheck');
    Route::get('users', [UserController::class, 'index'])->name('users.index');         
    Route::get('users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/destroy', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('users/{user}/view', [UserController::class, 'view'])->name('users.view');

    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile.index');
    Route::put('/profile', [AuthController::class, 'update'])->name('password.update');
});