<?php
namespace App\Middlewares;

final class AuthMiddleware
{
    private $container;
    private $options;
    public function __construct($container, $options)
    {
        $this->container = $container;
        $this->options = $options;
    }

    public function __invoke($request, $response, $next)
    {
        $route = $request->getAttribute('route');
        $isIgnored = in_array($route->getName(), $this->options['ignore']);
        if ($isIgnored) {
            return $next($request, $response);
        }


        if (!$this->container->userService->check()) {
            if($request->isXhr()) {
                return $response->withStatus(401);
            }

            return $response->withRedirect($this->container->router->pathFor('login'));
        }

        $auth = $this->container->userService->user();
        if($auth->role !== 'admin') {
            $routes = $this->options['roles'][$auth->role];
            $path = explode('/', $request->getUri()->getPath())[1];
            if (!in_array("/$path", $routes)) {
                $this->container->flash->addMessage('error', "You don't have permission to access this page.");
                return $response->withRedirect($this->container->router->pathFor('home'));
            }
        }

        return $next($request, $response);
    }
}
