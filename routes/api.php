<?php

use App\Http\Controllers\JobsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(JobsController::class)->group(function () {
    Route::get('/getPersonWithHighestSalary', 'getPersonWithHighestSalary');
    Route::get('/getJobsAndAverageSalary', 'getJobsAndAverageSalary');
    Route::get('/getJobsByPupularity', 'getJobsByPupularity');
    Route::post('/addNewRow','');
});
