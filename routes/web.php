<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DisciplineController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourseController::class, 'index'])->name('course.index')->middleware('auth');
Route::get('/formulario', [CourseController::class, 'form'])->name('course.form')->middleware('auth');
Route::post('/', [CourseController::class, 'create'])->name('course.create')->middleware('auth');
Route::delete('/', [CourseController::class, 'delete'])->name('course.delete')->middleware('auth');
Route::put('/', [CourseController::class, 'update'])->name('course.update')->middleware('auth');

Route::prefix('professor')->group(function () {
  Route::get('/', [TeacherController::class, 'index'])->name('teacher.index')->middleware('auth');
  Route::get('/formulario', [TeacherController::class, 'form'])->name('teacher.form')->middleware('auth');
  Route::post('/', [TeacherController::class, 'create'])->name('teacher.create')->middleware('auth');
  Route::delete('/', [TeacherController::class, 'delete'])->name('teacher.delete')->middleware('auth');
  Route::put('/', [TeacherController::class, 'update'])->name('teacher.update')->middleware('auth');
});

Route::prefix('discipline')->group(function () {
  Route::get('/', [DisciplineController::class, 'index'])->name('discipline.index')->middleware('auth');
  Route::get('/formulario', [DisciplineController::class, 'form'])->name('discipline.form')->middleware('auth');
  Route::post('/', [DisciplineController::class, 'create'])->name('discipline.create')->middleware('auth');
  Route::delete('/', [DisciplineController::class, 'delete'])->name('discipline.delete')->middleware('auth');
  Route::put('/', [DisciplineController::class, 'update'])->name('discipline.update')->middleware('auth');
});

Route::controller(AuthController::class)->group(function () {
  Route::get('/login', 'index')->name('login')->middleware('guest');
  Route::post('/login', 'login')->name('auth.login')->middleware('guest');
  Route::get('/register', 'register')->name('register')->middleware('guest');
  Route::post('/register', 'createUser')->name('auth.register')->middleware('guest');
  Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});