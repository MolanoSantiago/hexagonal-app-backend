<?php

use Illuminate\Support\Facades\Route;
use Src\Application\User\Infrastructure\Controllers\UserIndexController;
use Src\Application\User\Infrastructure\Controllers\UserShowController;
use Src\Application\User\Infrastructure\Controllers\UserStoreController;

Route::get('/', UserIndexController::class);
Route::get('/{id}', UserShowController::class);
Route::post('/store', UserStoreController::class);