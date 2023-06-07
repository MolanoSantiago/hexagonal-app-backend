<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\Application\Home\Infrastructure\Controllers\HomeController;
use Src\Application\Home\Infrastructure\Controllers\StatusController;

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

$appVersion = env('VERSION');

Route::get('/', static function () use ($appVersion) {
    return redirect('api/'. $appVersion);
});

Route::get('/'. $appVersion, HomeController::class);
Route::get('/'. $appVersion .'/status', StatusController::class);
