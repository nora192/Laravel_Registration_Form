<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
// Route::get('/', [userController::class,'register']);
Route::get('/register', [userController::class,'register']);
Route::post('/postForm', [userController::class,'postForm']);

