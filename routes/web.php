<?php

use App\Http\Controllers\AdminController;
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
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');



Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
Route::get('/welcome', [AdminController::class, 'dashboardview'])->name('dashboard.welcome');

});


    Route::middleware(['auth', 'role:student'])->prefix('student')->group(function(){

        Route::get('/register', [StudentController::class, 'studentformview'])->name('student.sregiform');
        Route::post('/save', [StudentController::class, 'store'])->name('student.stsave');
        Route::get('/list', [StudentController::class, 'studentlistview'])->name('student.studentlistview');
        Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
        Route::post('/update', [StudentController::class, 'update'])->name('student.update');
        Route::get('/scardlist', [StudentController::class, 'student_image_view'])->name('student.img_card');
        Route::get('/export', [StudentController::class, 'exportExcel'])->name('student.export');
        Route::get('/student-export-pdf', [StudentController::class, 'exportPdf'])->name('student.export.pdf');
        Route::post('/import', [StudentController::class, 'importExcel'])->name('student.import');

});

Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(function(){

    Route::get('/register',[TeacherController::class,'teacherformview'])->name('teacher.tregiform');
    Route::post('/save',[TeacherController::class,'store'])->name('teacher.tsave');
    Route::get('/list',[TeacherController::class,'teacherlistview'])->name('teacher.teacherlistview');
    Route::get('/delete/{id}',[TeacherController::class,'delete'])->name('teacher.delete');
    Route::get('/edit/{id}',[TeacherController::class,'edit'])->name('teacher.edit');
    Route::post('/update',[TeacherController::class,'update'])->name('teacher.update');
    Route::get('/export', [TeacherController::class, 'export'])->name('teacher.export');
    Route::get('/export', [TeacherController::class, 'exportExcel'])->name('teacher.export');
    Route::get('/teacher-export-pdf', [TeacherController::class, 'exportPdf'])->name('teacher.export.pdf');
    Route::post('/import', [TeacherController::class, 'importExcel'])->name('teacher.import');




});



Route::prefix('subject')->group(function(){
    Route::get('/register',[SubjectController::class,'subjectregiview'])->name('subject.subregiform');
    Route::post('/save',[SubjectController::class,'store'])->name('subject.susave');
    Route::get('/list',[SubjectController::class,'subjectlistview'])->name('subject.subjectlistview');
    Route::get('/delete/{id}',[SubjectController::class,'delete'])->name('subject.delete');
    Route::get('/edit/{id}',[SubjectController::class,'edit'])->name('subject.edit');
    Route::post('/update',[SubjectController::class,'update'])->name('subject.update');
    Route::get('/export', [SubjectController::class, 'exportExcel'])->name('subject.export');
    Route::post('/import', [SubjectController::class, 'importExcel'])->name('subject.import');
    Route::get('/subject-export-pdf', [SubjectController::class, 'exportPdf'])->name('subject.export.pdf');

});

Route::prefix('course')->group(function(){
    Route::get('/register',[CourseController::class,'courseregiview'])->name('course.courseregiform');
    Route::post('/save',[CourseController::class,'store'])->name('course.cusave');
    Route::get('/list',[CourseController::class,'courselistview'])->name('course.courselistview');
    Route::get('/delete/{id}',[CourseController::class,'delete'])->name('course.delete');
    Route::get('/edit/{id}',[CourseController::class,'edit'])->name('course.edit');
    Route::post('/update',[CourseController::class,'update'])->name('course.update');
    Route::get('/export', [CourseController::class, 'export'])->name('course.export');
    Route::get('/export', [CourseController::class, 'exportExcel'])->name('course.export');
    Route::get('/course-export-pdf', [CourseController::class, 'exportPdf'])->name('course.export.pdf');
    Route::post('/import', [CourseController::class, 'importExcel'])->name('course.import');
});


Route::prefix('class')->group(function(){

    Route::get('/register',[ClassController::class,'classregiview'])->name('class.classregiform');
    Route::post('/save',[ClassController::class,'store'])->name('class.clsave');
    Route::get('/list',[ClassController::class,'classlistview'])->name('class.classlistview');
    Route::get('/edit/{id}',[ClassController::class,'edit'])->name('class.edit');
    Route::post('/update',[ClassController::class,'update'])->name('class.update');
    Route::get('/delete/{id}',[ClassController::class,'delete'])->name('class.delete');
    Route::get('/export', [ClassController::class, 'exportExcel'])->name('class.export');
    Route::get('/class-export-pdf', [ClassController::class, 'exportPdf'])->name('class.export.pdf');
    Route::post('/import', [ClassController::class, 'importExcel'])->name('class.import');
});


Route::prefix('grade')->group(function(){

    Route::get('/register',[GradeController::class,'graderegiview'])->name('grade.graderegiform');
    Route::post('/save',[GradeController::class,'store'])->name('grade.grsave');
    Route::get('/list',[GradeController::class,'gradelistview'])->name('grade.gradelistview');
    Route::get('/edit/{id}',[GradeController::class,'edit'])->name('grade.edit');
    Route::post('/update',[GradeController::class,'update'])->name('grade.update');
    Route::get('/delete/{id}',[GradeController::class,'delete'])->name('grade.delete');
    Route::get('/export', [GradeController::class, 'exportExcel'])->name('grade.export');
    Route::get('/grade-export-pdf', [GradeController::class, 'exportPdf'])->name('grade.export.pdf');
    Route::post('/import', [GradeController::class, 'importExcel'])->name('grade.import');
});


