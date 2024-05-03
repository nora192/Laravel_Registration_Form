<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\mailController;
Route::get('/', [userController::class,'register']);
Route::get('/register', [userController::class,'register']);
Route::post('/postForm', [userController::class,'postForm']);
Route::post('/sendEmail', [mailController::class, 'send']);
