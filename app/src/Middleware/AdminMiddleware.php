<?php

namespace App\Middleware;

use Closure;

use Symplefony\IMiddleware;
use App\Controller\AuthController;

use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response\RedirectResponse;

class AdminMiddleware implements IMiddleware
{
    public function handle(ServerRequestInterface $request, Closure $next): mixed
    {
        if (AuthController::isAdmin()) {
            return $next($request);
        }

        return new RedirectResponse('/');
    }
}
