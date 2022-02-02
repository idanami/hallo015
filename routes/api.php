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
    Route::get('/getPersonWithHighestSalary/{job}', 'getPersonWithHighestSalary');
    Route::get('/getJobsAndAverageSalary', 'getJobsAndAverageSalary');
    Route::get('/getJobsByPopularity', 'getJobsByPupularity');
    Route::post('/addNewRowOrUpdate','addNewRowOrUpdate');
});
