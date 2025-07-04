<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AssessmentController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\ConsentController;
use \App\Http\Controllers\DevelopmentController;
use \App\Http\Controllers\EvaluationController;
use \App\Http\Controllers\LogController;
use \App\Http\Controllers\MediationController;
use \App\Http\Controllers\OutreachController;
use \App\Http\Controllers\SelectionController;
use \App\Http\Controllers\SignController;
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

    Route::get('students/consent/create', [ConsentController::class, 'create'])->name('consents.create');
    Route::post('students/consent/store', [ConsentController::class, 'store'])->name('consents.store');
    Route::get('students/consent', [ConsentController::class, 'index'])->name('consents.index'); 
    Route::get('students/consent/edit/{consent}', [ConsentController::class, 'edit'])->name('consents.edit');
    Route::put('students/consent/update/{consent}', [ConsentController::class, 'update'])->name('consents.update');
    Route::delete('students/consent/destroy', [ConsentController::class, 'destroy'])->name('consents.destroy');
    Route::get('students/consent/{consent}/view', [ConsentController::class, 'view'])->name('consents.view'); 

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

    Route::get('logs/code', [LogController::class, 'code'])->name('logs.code');
    Route::get('logs/create', [LogController::class, 'create'])->name('logs.create');
    Route::post('logs/store', [LogController::class, 'store'])->name('logs.store');
    Route::get('logs', [LogController::class, 'index'])->name('logs.index');         
    Route::get('logs/edit/{log}', [LogController::class, 'edit'])->name('logs.edit');
    Route::put('logs/update/{log}', [LogController::class, 'update'])->name('logs.update');
    Route::delete('logs/destroy', [LogController::class, 'destroy'])->name('logs.destroy');
    Route::get('logs/{log}/view', [LogController::class, 'view'])->name('logs.view');

    Route::get('outreaches/create', [OutreachController::class, 'create'])->name('outreaches.create');
    Route::post('outreaches/store', [OutreachController::class, 'store'])->name('outreaches.store');
    Route::get('outreaches', [OutreachController::class, 'index'])->name('outreaches.index');         
    Route::get('outreaches/edit/{outreach}', [OutreachController::class, 'edit'])->name('outreaches.edit');
    Route::put('outreaches/update/{outreach}', [OutreachController::class, 'update'])->name('outreaches.update');
    Route::delete('outreaches/destroy', [OutreachController::class, 'destroy'])->name('outreaches.destroy');
    Route::get('outreaches/{outreach}/view', [OutreachController::class, 'view'])->name('outreaches.view');

    Route::get('mediations/create', [MediationController::class, 'create'])->name('mediations.create');
    Route::post('mediations/store', [MediationController::class, 'store'])->name('mediations.store');
    Route::get('mediations', [MediationController::class, 'index'])->name('mediations.index');         
    Route::get('mediations/edit/{mediation}', [MediationController::class, 'edit'])->name('mediations.edit');
    Route::put('mediations/update/{mediation}', [MediationController::class, 'update'])->name('mediations.update');
    Route::delete('mediations/destroy', [MediationController::class, 'destroy'])->name('mediations.destroy');
    Route::get('mediations/{mediation}/view', [MediationController::class, 'view'])->name('mediations.view');

    Route::get('signs/create', [SignController::class, 'create'])->name('signs.create');
    Route::post('signs/store', [SignController::class, 'store'])->name('signs.store');
    Route::get('signs', [SignController::class, 'index'])->name('signs.index');         
    Route::get('signs/edit/{sign}', [SignController::class, 'edit'])->name('signs.edit');
    Route::put('signs/update/{sign}', [SignController::class, 'update'])->name('signs.update');
    Route::delete('signs/destroy', [SignController::class, 'destroy'])->name('signs.destroy');
    Route::get('signs/{sign}/view', [SignController::class, 'view'])->name('signs.view');
    
    Route::get('students/developments/create', [DevelopmentController::class, 'create'])->name('developments.create');
    Route::post('students/developments/store', [DevelopmentController::class, 'store'])->name('developments.store');
    Route::get('students/developments', [DevelopmentController::class, 'index'])->name('developments.index');         
    Route::get('students/developments/edit/{development}', [DevelopmentController::class, 'edit'])->name('developments.edit');
    Route::put('students/developments/update/{development}', [DevelopmentController::class, 'update'])->name('developments.update');
    Route::delete('students/developments/destroy', [DevelopmentController::class, 'destroy'])->name('developments.destroy');
    Route::get('students/developments/{development}/view', [DevelopmentController::class, 'view'])->name('developments.view');

    Route::get('evaluations/create', [EvaluationController::class, 'create'])->name('evaluations.create');
    Route::post('evaluations/store', [EvaluationController::class, 'store'])->name('evaluations.store');
    Route::get('evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');         
    Route::get('evaluations/edit/{evaluation}', [EvaluationController::class, 'edit'])->name('evaluations.edit');
    Route::put('evaluations/update/{evaluation}', [EvaluationController::class, 'update'])->name('evaluations.update');
    Route::delete('evaluations/destroy', [EvaluationController::class, 'destroy'])->name('evaluations.destroy');
    Route::get('evaluations/{evaluation}/view', [EvaluationController::class, 'view'])->name('evaluations.view');
    
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