<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ServiceController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/register-developer', [DeveloperController::class, 'register']);
Route::get('/register-service', [ServiceController::class, 'register']);
Route::get('/notification', [NotificationController::class, 'notification']);
