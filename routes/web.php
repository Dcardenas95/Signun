<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return to_route('grades.index');
});

Route::prefix('/grades')->group(function () {
    Route::get('/', [GradeController::class, 'index'])->name('grades.index');
    Route::post('/', [GradeController::class, 'store'])->name('grades.store');
    Route::get('/{grade}/edit', [GradeController::class, 'edit'])->name('grades.edit');
    Route::put('/{grade}', [GradeController::class, 'update'])->name('grades.update');
    Route::delete('/{grade}', [GradeController::class, 'destroy'])->name('grades.destroy');
});



