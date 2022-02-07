<?php
/** register middlewares */
//$app->add(new App\Middlewares\DetermineRequestMiddleware);
//$app->add(new App\Middlewares\OldInputMiddleware($container));

$app->add(new App\Middlewares\ValidationErrorsMiddleware($container));
$app->add(new App\Middlewares\AuthMiddleware($container, [
	//list of ignored route names
	'ignore' => ['home', 'login']
]));