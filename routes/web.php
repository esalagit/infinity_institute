<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LoginController;
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

Route::get('/',[LoginController::class,'loginview'])->name('login.loginwindow');
Route::post('/login-check',[LoginController::class,'logincheck'])->name('login.check');

Route::prefix('student')->group(function(){
    Route::middleware('auth:student')->group(function() {
        Route::get('/welcome', [StudentController::class, 'welcome_view'])->name('student.welcome');
        Route::get('/register', [StudentController::class, 'studentformview'])->name('student.sregiform');
        Route::post('/save', [StudentController::class, 'store'])->name('student.stsave');
        Route::get('/list', [StudentController::class, 'studentlistview'])->name('student.studentlistview');
        Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
        Route::post('/update', [StudentController::class, 'update'])->name('student.update');
        Route::get('/scardlist', [StudentController::class, 'student_image_view'])->name('student.img_card');

    });
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


Route::prefix('class')->group(function(){

    Route::get('/register',[ClassController::class,'classregiview'])->name('class.classregiform');
    Route::post('/save',[ClassController::class,'store'])->name('class.clsave');
    Route::get('/list',[ClassController::class,'classlistview'])->name('class.classlistview');
    Route::get('/edit/{id}',[ClassController::class,'edit'])->name('class.edit');
    Route::post('/update',[ClassController::class,'update'])->name('class.update');
    Route::get('/delete/{id}',[ClassController::class,'delete'])->name('class.delete');
});


Route::prefix('grade')->group(function(){

    Route::get('/register',[GradeController::class,'graderegiview'])->name('grade.graderegiform');
    Route::post('/save',[GradeController::class,'store'])->name('grade.grsave');
    Route::get('/list',[GradeController::class,'gradelistview'])->name('grade.gradelistview');
    Route::get('/edit/{id}',[GradeController::class,'edit'])->name('grade.edit');
    Route::post('/update',[GradeController::class,'update'])->name('grade.update');
    Route::get('/delete/{id}',[GradeController::class,'delete'])->name('grade.delete');
});
