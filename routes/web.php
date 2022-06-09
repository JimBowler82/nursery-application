<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// No Auth Required
Route::get('users/setpassword/{token}', [UserController::class, 'set_password'])->name('users.set_password');
Route::put('users/{user}/setpassword', [UserController::class, 'update_password'])->name('users.update_password');

// Auth Required Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    // Users
    Route::resource('users', UserController::class)->except(['update', 'edit', 'show']);
    Route::resource('users', UserController::class)->only(['update', 'edit', 'show']);

    // Assessments
    Route::resource('assessments', AssessmentController::class);

    // Centres
    Route::resource('centres', CentreController::class);

    // Reports
    Route::resource('reports', ReportController::class);
});





require __DIR__.'/auth.php';
