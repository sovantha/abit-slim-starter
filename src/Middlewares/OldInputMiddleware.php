<?php
namespace App\Middlewares;

final class OldInputMiddleware
{
	protected $container;
    public function __construct($container)
    {
        $this->container = $container;
    }

	public function __invoke($request, $response, $next)
	{
		$this->container->view->addAttribute('old', (object) ($_SESSION['old'] ?? []));
		$_SESSION['old'] = $request->getParams();

		return $next($request, $response);
	}
}