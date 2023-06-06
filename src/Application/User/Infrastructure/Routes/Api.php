<?php

use Illuminate\Support\Facades\Route;
use Src\Application\User\Infrastructure\Controllers\UserIndexController;
use Src\Application\User\Infrastructure\Controllers\UserShowController;

Route::get('/', UserIndexController::class);
Route::get('/{id}', UserShowController::class);