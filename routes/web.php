<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DisciplineController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourseController::class, 'index'])->name('course.index');
Route::get('/formulario', [CourseController::class, 'form'])->name('course.form');
Route::post('/', [CourseController::class, 'create'])->name('course.create');
Route::delete('/', [CourseController::class, 'delete'])->name('course.delete');
Route::put('/', [CourseController::class, 'update'])->name('course.update');

Route::prefix('professor')->group(function () {
  Route::get('/', [TeacherController::class, 'index'])->name('teacher.index');
  Route::get('/formulario', [TeacherController::class, 'form'])->name('teacher.form');
  Route::post('/', [TeacherController::class, 'create'])->name('teacher.create');
  Route::delete('/', [TeacherController::class, 'delete'])->name('teacher.delete');
  Route::put('/', [TeacherController::class, 'update'])->name('teacher.update');
});

Route::prefix('discipline')->group(function () {
  Route::get('/', [DisciplineController::class, 'index'])->name('discipline.index');
  Route::get('/formulario', [DisciplineController::class, 'form'])->name('discipline.form');
  Route::post('/', [DisciplineController::class, 'create'])->name('discipline.create');
  Route::delete('/', [DisciplineController::class, 'delete'])->name('discipline.delete');
  Route::put('/', [DisciplineController::class, 'update'])->name('discipline.update');
});