<?php

use App\Http\Controllers\Admin\AssignSubjectController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\SchoolClassController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/admission', [AdmissionController::class, 'create'])->name('admission.create');
Route::get('/', [AdmissionController::class, 'create'])->name('admission.create');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // role & permission
    Route::resource('/permissions', PermissionController::class)->only(['index', 'create', 'edit']);
    Route::resource('/roles', RoleController::class)->only(['index', 'create', 'show', 'edit']);

    Route::resource('/class', SchoolClassController::class);
    Route::resource('/school', SchoolController::class);
    Route::resource('/subject', SubjectController::class);
    Route::resource('/assign-subject', AssignSubjectController::class)->only(['index', 'create', 'show', 'edit']);
    Route::resource('/chapter', ChapterController::class)->only(['index', 'create', 'show', 'edit']);
    Route::resource('/students', StudentController::class);
    Route::resource('/questions', QuestionController::class);
});

require __DIR__.'/auth.php';
