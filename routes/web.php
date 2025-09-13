<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourseController::class, 'index'])->name('course.index');
Route::get('/formulario', [CourseController::class, 'form'])->name('course.form');
Route::post('/', [CourseController::class, 'create'])->name('course.create');
Route::delete('/', [CourseController::class, 'delete'])->name('course.delete');
Route::put('/', [CourseController::class, 'update'])->name('course.update');