<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FacultyController;

Route::redirect('/', '/departments');

Route::resources([
    'departments' => DepartmentController::class,
    'students'    => StudentController::class,
    'teachers'    => TeacherController::class,
    'faculties'   => FacultyController::class,
]);
