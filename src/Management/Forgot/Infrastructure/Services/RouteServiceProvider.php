<?php

namespace Src\Management\Forgot\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\RouteServiceProvider as ServiceProvider;

final class RouteServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        $appVersion = env('VERSION');
        parent::__construct($app);
        $this->setDependency(
            'api/'. $appVersion .'/forgotPassword',
            'Src\Management\Forgot\Infrastructure\Controllers',
            'src/Management/Forgot/Infrastructure/Routes/Api.php',
            true
        );
    }
}
