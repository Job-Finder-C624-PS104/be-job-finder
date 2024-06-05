<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\Jobs;
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

Route::post('/login', [Authentication::class, 'Login']);
Route::post('/register', [Authentication::class, 'Register']);
Route::get('/jobs', [Jobs::class, 'GetAllJob']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [Authentication::class, 'Logout']);
    Route::post('/jobs', [Jobs::class, 'CreateJob']);
});
