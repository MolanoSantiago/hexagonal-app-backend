<?php

namespace Src\Shared\Infrastructure\Middleware;

use Closure;
use Illuminate\Http\Request;
use Src\Management\Login\Application\Auth\LoginAuthenticationCheckUseCase;
use Src\Shared\Infrastructure\Exceptions\AuthException;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;

final class AuthMiddleware
{
    use HttpCodesHelper;

    public function __construct(private readonly LoginAuthenticationCheckUseCase $loginAuthenticationCheckUseCase)
    {
        
    }

    public function handle(Request $request, Closure $next): mixed
    {
        if(empty($request->header('Authentication'))){
            throw new AuthException('Jwt not exist', $this->badRequest());
        }

        $check = $this->loginAuthenticationCheckUseCase->__invoke($request->header('Authentication'));
        
        if(!$check){
            throw new AuthException('Invalid token or invalid user or expired token', $this->unauthorized());
        }
        
        return $next($request);
    }
}