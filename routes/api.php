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
    Route::get('/hire/jobs/dashboard', [Jobs::class, 'GetDashboardJob']);
    Route::get('/hire/jobs', [Jobs::class, 'GetDashboardAllJob']);
    Route::post('/hire/jobs', [Jobs::class, 'CreateJob']);
    Route::post('/hire/jobs/{id}', [Jobs::class, 'EditJob']);
    Route::delete('/hire/jobs/{id}', [Jobs::class, 'DeleteJob']);
    Route::get('/hire/report', [Jobs::class, 'GetReport']);
    Route::get('/worker/apply-job', [ApplyJob::class, 'GetApplyJob']);
    Route::get('/hire/apply-job/all', [ApplyJob::class, 'GetAllApplyJob']);
    Route::post('/worker/apply-job/{id}', [ApplyJob::class, 'ApplyJob']);
    Route::post('/hire/apply-job/{id}/update', [ApplyJob::class, 'UpdateApplyJob']);
    Route::get('/admin/dashboard', [Jobs::class, 'GetDashboardJobAdmin']);
    Route::get('/admin/jobs', [Jobs::class, 'GetAllJobAdmin']);
    Route::get('/admin/all-user', [Jobs::class, 'GetAllUser']);
    Route::get('/admin/report', [Jobs::class, 'GetReportAdmin']);
    Route::post('/profile', [ProfileController::class, 'UpdateProfile']);
    Route::get('/profile', [ProfileController::class, 'GetProfile']);
});
