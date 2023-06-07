<?php

namespace Src\Application\User\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;

final class DependencyServiceProvider extends ServiceProvider
{
    public function __construct($app)
    {
        parent::__construct($app);
        $this->setDependency([
            [
                'useCase' => [
                    \Src\Application\User\Application\Get\UserIndexUseCase::class,
                    \Src\Application\User\Application\Get\UserShowUseCase::class,
                    \Src\Application\User\Application\Store\UserStoreUseCase::class,
                    \Src\Application\User\Application\Update\UserUpdateUseCase::class,
                    \Src\Application\User\Application\Destroy\UserDestroyUseCase::class
                ],
                'contract' => \Src\Application\User\Domain\Contracts\UserRepositoryContract::class,
                'repository' => \Src\Application\User\Infrastructure\Repositories\Eloquent\UserRepository::class
            ]
        ]);
    }
}
