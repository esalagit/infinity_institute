<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/',[StudentController::class,'welcomeview'])->name('student.welcome');

Route::prefix('student')->group(function(){

    Route::get('/register',[StudentController::class,'studentformview'])->name('student.sregiform');
    Route::post('/save',[StudentController::class,'store'])->name('student.stsave');
    Route::get('/list',[StudentController::class,'studentlistview'])->name('student.studentlistview');
    Route::get('/delete/{id}',[StudentController::class,'delete'])->name('student.delete');
    Route::get('/edit/{id}',[StudentController::class,'edit'])->name('student.edit');
    Route::post('/update',[StudentController::class,'update'])->name('student.update');


});

Route::prefix('teacher')->group(function(){
    Route::get('/register',[TeacherController::class,'teacherformview'])->name('teacher.tregiform');
    Route::post('/save',[TeacherController::class,'store'])->name('teacher.tsave');
    Route::get('/list',[TeacherController::class,'teacherlistview'])->name('teacher.teacherlistview');
    Route::get('/delete/{id}',[TeacherController::class,'delete'])->name('teacher.delete');
    Route::get('/edit/{id}',[TeacherController::class,'edit'])->name('teacher.edit');
    Route::post('/update',[TeacherController::class,'update'])->name('teacher.update');
});



Route::prefix('subject')->group(function(){
    Route::get('/register',[SubjectController::class,'subjectregiview'])->name('subject.subregiform');
    Route::post('/save',[SubjectController::class,'store'])->name('subject.susave');
    Route::get('/list',[SubjectController::class,'subjectlistview'])->name('subject.subjectlistview');
    Route::get('/delete/{id}',[SubjectController::class,'delete'])->name('subject.delete');
    Route::get('/edit/{id}',[SubjectController::class,'edit'])->name('subject.edit');
    Route::post('/update',[SubjectController::class,'update'])->name('subject.update');
});

Route::prefix('course')->group(function(){
    Route::get('/register',[CourseController::class,'courseregiview'])->name('course.courseregiform');
    Route::post('/save',[CourseController::class,'store'])->name('course.cusave');
    Route::get('/list',[CourseController::class,'courselistview'])->name('course.courselistview');
    Route::get('/delete/{id}',[CourseController::class,'delete'])->name('course.delete');
    Route::get('/edit/{id}',[CourseController::class,'edit'])->name('course.edit');
    Route::post('/update',[CourseController::class,'update'])->name('course.update');

});
