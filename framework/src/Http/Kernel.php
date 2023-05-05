<?php

namespace Framework\Http;

use Exception;
use FastRoute\RouteCollector;
use Framework\Routing\RouterInterface;

use function FastRoute\simpleDispatcher;

class Kernel
{

    public function __construct(protected RouterInterface $router)
    {
    }

    public function handle(Request $request): Response
    {

        try {
            [$routeHandler, $vars] = $this->router->dispatch($request);

            $response = call_user_func_array($routeHandler, $vars);
        } catch (HttpException $exception) {
            $response = new Response($exception->getMessage(), $exception->statusCode());
        }

        return $response;
    }
}
