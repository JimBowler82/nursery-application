<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/**
 *
 * Web Routes
 *
 */

// No Auth Required
Route::get('users/setpassword/{token}', [UserController::class, 'set_password'])->name('users.set_password');
Route::put('users/{user}/setpassword', [UserController::class, 'update_password'])->name('users.update_password');

// Auth Required Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/', HomepageController::class)->name('home');

    // Users
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Centres
    Route::prefix('centres')->group(function () {
        Route::get('/', [CentreController::class, 'index'])->name('centres.index');
        Route::get('/create', [CentreController::class, 'create'])->name('centres.create');
        Route::post('/', [CentreController::class, 'store'])->name('centres.store');
        Route::get('/{centre}', [CentreController::class, 'show'])->name('centres.show');
        Route::get('/{centre}/edit', [CentreController::class, 'edit'])->name('centres.edit');
        Route::put('/{centre}', [CentreController::class, 'update'])->name('centres.update');
        Route::delete('/{centre}', [CentreController::class, 'destroy'])->name('centres.destroy');
    });

    // Assessments
    Route::prefix('assessments')->group(function () {
        Route::get('/', [AssessmentController::class, 'index'])->name('assessments.index');
        Route::get('/create', [AssessmentController::class, 'create'])->name('assessments.create');
        Route::post('/', [AssessmentController::class, 'store'])->name('assessments.store');
        Route::get('/{assessment}/perform', [AssessmentController::class, 'perform'])->name('assessments.perform');
        Route::get('/{assessment}', [AssessmentController::class, 'show'])->name('assessments.show');
        Route::get('/{assessment}/edit', [AssessmentController::class, 'edit'])->name('assessments.edit');
        Route::put('/{assessment}', [AssessmentController::class, 'update'])->name('assessments.update');
        Route::delete('/{assessment}', [AssessmentController::class, 'destroy'])->name('assessments.destroy');
    });
});





require __DIR__.'/auth.php';
