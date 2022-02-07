<?php
namespace App\Middlewares;

final class ValidationErrorsMiddleware
{
	protected $container;
    public function __construct($container)
    {
        $this->container = $container;
    }

	public function __invoke($request, $response, $next)
	{
		if(!empty($_SESSION['errors'])) {
			$this->container->view->addAttribute('errors', $_SESSION['errors']);
			unset($_SESSION['errors']);
		}

		return $next($request, $response);
	}
}
