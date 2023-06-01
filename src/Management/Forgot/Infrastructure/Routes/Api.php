<?php

use Illuminate\Support\Facades\Route;
use Src\Management\Forgot\Infrastructure\Controllers\ForgotPasswordController;

Route::post('/', ForgotPasswordController::class);