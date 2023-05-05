<?php

use App\Http\Controllers\HomeController;
use Framework\Routing\RouterCollector;

$router= new RouterCollector;

$router->addRoute('GET','/others', [HomeController::class,'index']);

return $router->routes();