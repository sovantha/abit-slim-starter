<?php
/** register data services */
$container['userService']					= function($c) { return new App\Services\UserService($c); };


/** register controllers */
$container['HomeController']                = function($c) { return new App\Controllers\HomeController($c); };
