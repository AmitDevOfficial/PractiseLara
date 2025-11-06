<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('register',[ClientController::class,'register']);
Route::get('view',[ClientController::class,'view']);
Route::get('delete',[ClientController::class,'delete_data']);
Route::get('update-data',[ClientController::class,'update_data']);
