<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ServiceController;
use App\Models\Developer;
use Illuminate\Support\Facades\Route;
use Spatie\SlackAlerts\Facades\SlackAlert;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { 

    SlackAlert::message(" *KrediBank Service Monitoring:* _https://cba.thekredibank.com_. has zero-downtime");
});

