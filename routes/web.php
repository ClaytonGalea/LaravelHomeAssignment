<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;

//This will register the resourceful routes for colleges and students
//Automaytically generates all CRUD routes
//(index, create, store, edit, update, show, destroy)
Route::resource('colleges',CollegeController::class);
Route::resource('students',StudentController::class);
Route::get('/', function () {
    return view('welcome');
});
