<?php

use App\Http\Controllers\API\v1\AuthController;
use App\Http\Controllers\API\v1\PriorityController;
use App\Http\Controllers\API\v1\StatusController;
use App\Http\Controllers\API\v1\TaskController;
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

Route::group(['middleware' => ['api']], function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('profile', [AuthController::class, 'profile'])->middleware('auth:api');
        Route::post('register', [AuthController::class, 'register']);

        Route::resource('tasks', TaskController::class)->middleware('auth:api');
        Route::resource('statuses', StatusController::class)->middleware('auth:api');
        Route::resource('priorities', PriorityController::class)->middleware('auth:api');
    });
});
