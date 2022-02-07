<?php
/** get container */
$container = $app->getContainer();

/** eloquent */
$container['db'] = function($c) {
	$capsule = new \Illuminate\Database\Capsule\Manager;
	$capsule->addConnection($c->get('settings')['eloquent']);
	$capsule->bootEloquent();
	$capsule->setAsGlobal();

	return $capsule;
};


/** php view */
$container['view'] = function($c) {
	return new \Slim\Views\PhpRenderer(__DIR__ . '/../resources/views/', [
		'title' => 'Page',
		'scripts' => '',
		'dev_mode' => $c->settings['mode'],
		'app_info' => $c->app_info,
		'flash' => $c->flash,
		'auth' => $c->userService->user(),
	], 'layout.php');
};

/** debugger */
$container['debugger'] = function($c) use($app) {
	if($c->settings['debugger']) {
		$provider = new \Kitchenu\Debugbar\ServiceProvider();
		$provider->register($app);
		$c->debugbar->addCollector(new App\Utils\DebugBarEloquentCollector($c->db));
    }
    return true;
};

/** validator configuration */
$container['validator'] = function($c) {
	return new App\Validation\Validator;
};

/** flash messages configuration */
$container['flash'] = function($c) {
  return new \Slim\Flash\Messages;
};

/** auth alias */
$container['auth'] = function($c) {
   return $c->userService;
};

/** csrf configuration */
$container['csrf'] = function($c) {
   return new \Slim\Csrf\Guard;
};

