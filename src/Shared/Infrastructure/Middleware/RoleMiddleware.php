<?php

namespace Src\Shared\Infrastructure\Middleware;

use Closure;
use Illuminate\Http\Request;
use Src\Management\Login\Application\Auth\LoginAuthenticationRoleUseCase;
use Src\Shared\Infrastructure\Exceptions\AuthException;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;

final class RoleMiddleware
{
    use HttpCodesHelper;

    public function __construct(private readonly LoginAuthenticationRoleUseCase $loginAuthenticationRoleUseCase)
    {
    }

    public function handle(Request $request, Closure $next): mixed
    {
        if(empty($request->header('Authentication'))){
            throw new AuthException('Jwt not exist', $this->badRequest());
        }

        $check = $this->loginAuthenticationRoleUseCase->__invoke(
            $request->header('Authentication'), 
            $request->route()->controller->getMiddleware()[0]['options']['role'] ?? '*'
        );
        
        if(!$check) {
            throw new AuthException('Role not authorized', $this->unauthorized());
        }

        return $next($request);
    }
}
