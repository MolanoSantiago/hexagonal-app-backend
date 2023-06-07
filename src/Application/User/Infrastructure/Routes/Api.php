<?php

use Illuminate\Support\Facades\Route;
use Src\Application\User\Infrastructure\Controllers\UserDestroyController;
use Src\Application\User\Infrastructure\Controllers\UserIndexController;
use Src\Application\User\Infrastructure\Controllers\UserShowController;
use Src\Application\User\Infrastructure\Controllers\UserStoreController;
use Src\Application\User\Infrastructure\Controllers\UserUpdateController;

Route::get('/', UserIndexController::class);
Route::get('/{id}', UserShowController::class);
Route::post('/', UserStoreController::class);
Route::put('/{id}', UserUpdateController::class);
Route::delete('/{id}', UserDestroyController::class);