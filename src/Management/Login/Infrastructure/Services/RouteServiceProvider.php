<?php

namespace Src\Management\Login\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\RouteServiceProvider as ServiceProvider;

final class RouteServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $appVersion = env('VERSION');
        parent::__construct($app);
        $this->setDependency(
            'api/'. $appVersion .'/login',
            'Src\Management\Login\Infrastructure\Controllers',
            'src/Management/Login/Infrastructure/Routes/Api.php',
            true
        );
    }
}
