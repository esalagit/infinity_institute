<?php

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


Route::get('/sregister',[StudentController::class,'studentformview'])->name('student.sregiform');
Route::post('/ssave',[StudentController::class,'store'])->name('student.stsave');
Route::get('/slist',[StudentController::class,'studentlistview'])->name('student.studentlistview');

