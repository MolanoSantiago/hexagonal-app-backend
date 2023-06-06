<?php

namespace Src\Application\User\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\RouteServiceProvider as ServiceProvider;

final class RouteServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $appVersion = env('VERSION');
        parent::__construct($app);
        $this->setDependency(
            'api/'. $appVersion .'/users',
            'Src\Application\User\Infrastructure\Controllers',
            'src/Application/User/Infrastructure/Routes/Api.php',
            false
        );
    }
}
