<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\DepartmentController;



Route::group(['middleware' => ['guest']], function () {

    //Route For Handing Guest Opration

    Route::get('/', [AuthController::class, 'showLogin'])->name('login');;

    Route::post('do-login', [AuthController::class, 'doLogin']);
});
Route::group(['middleware' => ['auth']], function () {

    //Authentication Routes

    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('home', [AuthController::class, 'home'])->name('home');

    //Roles And Permissions

    Route::get('view-role', [PermissionController::class,'rolePermissions'])->name('roles-permissions');

    Route::get('edit-role/{id}', [PermissionController::class,'editRole']);

    Route::post('edit-role-update/{id}', [PermissionController::class,'processEditRole']);

    Route::get('add-role', [PermissionController::class,'addRole']);

    Route::post('add-role', [PermissionController::class,'processAddRole'])->name('add-role');

    // Question Handing Route

    Route::get('add-question', [QuestionController::class,'AddQuestion'])->name('question');

    Route::post('upload-questions-theory', [QuestionController::class,'UploadQuestionStudentTheory'])->name('upload-question-theory');

    Route::post('upload-questions-practical', [QuestionController::class,'UploadQuestionStudentPractical'])->name('upload-question-practical');

    Route::get('view-theory-question', [QuestionController::class,'ViewQuestionTheory'])->name('view-theory-question');

    Route::get('view-practical-question', [QuestionController::class,'ViewQuestionPractical'])->name('view-practical-question');
   
    Route::get('add-department', [DepartmentController::class,'create'])->name('add-department');

    Route::post('add-department', [DepartmentController::class,'store'])->name('add-department');

    Route::get('view-department', [DepartmentController::class,'index'])->name('view-department');

    // Route::get('departments.edit', [DepartmentController::class,'edit'])->name('departments.edit');

    // Route::put('departments.update', [DepartmentController::class,'update'])->name('departments.update');

    // Route::delete('departments.destroy', [DepartmentController::class,'destroy'])->name('departments.destroy');



    Route::get('departments/{department}.edit', [DepartmentController::class,'edit'])->name('departments.edit');

    Route::put('departments/{department}.update', [DepartmentController::class,'update'])->name('departments.update');

    Route::delete('departments/{department}.destroy', [DepartmentController::class,'destroy'])->name('departments.destroy');







    // routes/web.php
// Route::get('/departments/{department}/edit', 'DepartmentController@edit')->name('departments.edit');
// Route::put('/departments/{department}', 'DepartmentController@update')->name('departments.update');
// Route::delete('/departments/{department}', 'DepartmentController@destroy')->name('departments.destroy');



   



    //Students Handling Route

    Route::get('add-students', [StudentsController::class,'AddStudents'])->name('students');

    Route::post('upload-students', [StudentsController::class,'UploadStudents'])->name('upload-students');

    Route::get('view-students', [StudentsController::class,'ViewStudents'])->name('view-students');
    
});