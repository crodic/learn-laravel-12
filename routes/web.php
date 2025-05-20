<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;


Route::prefix("/classes")->controller(ClassesController::class)->name("classes.")->group(function (){
    Route::get('/', "index")->name("home");
    Route::get("/create", "create")->name("create");
    Route::post("/", "store")->name("store");
    Route::get("/show/{id}", "show")->name("show");
    Route::get("/delete/{id}", "destroy")->name("destroy");
    Route::get("/edit/{id}", "edit")->name("edit");
    Route::put("/update/{id}", "update")->name("update");
});

Route::prefix("/students")->controller(StudentsController::class)->name("students.")->group(function (){
    Route::get("/create/{classId}", "create")->name("create");
    Route::post("/", "store")->name("store");
    Route::get("/delete/{id}", "destroy")->name("destroy");
    Route::get("/edit/{studentId}", "edit")->name("edit");
    Route::put("/update/{id}", "update")->name("update");
});
