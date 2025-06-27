<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AssessmentController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\LogController;
use \App\Http\Controllers\SelectionController;
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

    Route::get('assessments/create', [AssessmentController::class, 'create'])->name('assessments.create');
    Route::post('assessments/store', [AssessmentController::class, 'store'])->name('assessments.store');
    Route::get('/assessments/email/check', [AssessmentController::class, 'emailcheck'])->name('assessments.emailcheck');
    Route::get('/assessments/contact/check', [AssessmentController::class, 'contactcheck'])->name('assessments.contactcheck');
    Route::get('assessments', [AssessmentController::class, 'index'])->name('assessments.index');         
    Route::get('assessments/edit/{assessment}', [AssessmentController::class, 'edit'])->name('assessments.edit');
    Route::put('assessments/update/{assessment}', [AssessmentController::class, 'update'])->name('assessments.update');
    Route::delete('assessments/destroy', [AssessmentController::class, 'destroy'])->name('assessments.destroy');
    Route::get('assessments/{assessment}/view', [AssessmentController::class, 'view'])->name('assessments.view');

    Route::get('selections/create', [SelectionController::class, 'create'])->name('selections.create');
    Route::post('selections/store', [SelectionController::class, 'store'])->name('selections.store');
    Route::get('selections', [SelectionController::class, 'index'])->name('selections.index');         
    Route::get('selections/edit/{selection}', [SelectionController::class, 'edit'])->name('selections.edit');
    Route::put('selections/update/{selection}', [SelectionController::class, 'update'])->name('selections.update');
    Route::delete('selections/destroy', [SelectionController::class, 'destroy'])->name('selections.destroy');
    Route::get('selections/{selection}/view', [SelectionController::class, 'view'])->name('selections.view');

    Route::get('logs/create', [LogController::class, 'create'])->name('logs.create');
    Route::post('logs/store', [LogController::class, 'store'])->name('logs.store');
    Route::get('logs', [LogController::class, 'index'])->name('logs.index');         
    Route::get('logs/edit/{log}', [LogController::class, 'edit'])->name('logs.edit');
    Route::put('logs/update/{log}', [LogController::class, 'update'])->name('logs.update');
    Route::delete('logs/destroy', [LogController::class, 'destroy'])->name('logs.destroy');
    Route::get('logs/{log}/view', [LogController::class, 'view'])->name('logs.view');
    
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