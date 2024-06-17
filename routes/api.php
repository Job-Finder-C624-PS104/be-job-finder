<?php

use App\Http\Controllers\ApplyJob;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\Jobs;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth.api')->group(function() {
    Route::post('/logout', [Authentication::class, 'Logout']);
    Route::get('/jobs/dashboard', [Jobs::class, 'GetDashboardJob']);
    Route::post('/jobs', [Jobs::class, 'CreateJob']);
    Route::post('/jobs/{id}', [Jobs::class, 'EditJob']);
    Route::delete('/jobs/{id}', [Jobs::class, 'DeleteJob']);
    Route::get('/apply-job', [ApplyJob::class, 'GetApplyJob']);
    Route::get('/apply-job/all', [ApplyJob::class, 'GetAllApplyJob']);
    Route::post('/apply-job/{id}', [ApplyJob::class, 'ApplyJob']);
    Route::post('/apply-job/{id}/update', [ApplyJob::class, 'UpdateApplyJob']);
    Route::post('/profile', [ProfileController::class, 'UpdateProfile']);
    Route::get('/profile', [ProfileController::class, 'GetProfile']);
});
