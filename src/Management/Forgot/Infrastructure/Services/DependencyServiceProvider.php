<?php

namespace Src\Management\Forgot\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;

final class DependencyServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        parent::__construct($app);
        $this->setDependency([
            [
                'useCase' => [
                    \Src\Management\Forgot\Application\Mail\ForgotPasswordUseCase::class,
                ],
                'contract' => \Src\Management\Forgot\Domain\Contracts\ForgotMailableContract::class,
                'repository' => \Src\Management\Forgot\Infrastructure\Repositories\Mail\ForgotMailable::class
            ]
        ]);
    }
}
