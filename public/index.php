<?php

use Framework\Http\Request;

use Framework\Http\Kernel;
use Framework\Routing\Router;

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/vendor/autoload.php';


$request = Request::capture();

$router = new Router();

$kernel = new Kernel($router);

$response = $kernel->handle($request);

$response->send();