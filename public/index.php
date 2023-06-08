<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

// Agrega estas líneas para configurar el host y el puerto
$host = '0.0.0.0';
$port = $_SERVER['PORT'] ?? 8000;

// Reemplaza la siguiente línea:
$response = $kernel->handle(
    $request = Request::capture()
)->send();

// Con estas líneas:
$request = Request::capture();
$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);
