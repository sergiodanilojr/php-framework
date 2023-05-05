<?php

use App\Http\Controllers\HomeController;
use Framework\Http\Response;
use Framework\Routing\RouterCollector;

$router = new RouterCollector;

$router->addRoute('GET','/', [HomeController::class,'index']);

$router->addRoute('GET','/me', function(){
    return  new Response("My name is Sérgio Danilo.");
})->name('bagual');

return $router->routes();