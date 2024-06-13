<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(["prefix"=> "blog-posts"], function () {
    Route::get("", [BlogPostController::class, 'findAll']); 
    Route::get("{id}", [BlogPostController::class, 'find']);
    Route::group(['middleware'=> 'custom.auth'], function () {
    Route::post("", [BlogPostController::class, 'create']);
    Route::delete("{id}", [BlogPostController::class, 'delete']);
    Route::patch("{id}", [BlogPostController::class, 'update']);
    });
});
Route::group(["prefix"=> "auth"], function () {
    Route::post("login", [AuthController::class, 'login']);
    Route::post("register", [AuthController::class, 'register']);
});