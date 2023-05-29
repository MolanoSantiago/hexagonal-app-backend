<?php

namespace Src\Shared\Infrastructure\Services;

use Illuminate\Support\ServiceProvider as Service;

class DependencyServiceProvider extends Service
{

    private array $dependencies;

    public function setDependecy(array $dependencies): void
    {
        $this->dependencies = $dependencies;
    }

    public function register(): void
    {
        foreach ($this->dependencies as $value) {
            $this->app
                ->when($value['useCase'])
                ->needs($value['contract'])
                ->give($value['repository']);
        }
    }
}
