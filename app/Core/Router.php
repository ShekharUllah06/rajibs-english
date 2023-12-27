<?php

// namespace App\Core;

// class Router
// {
//   protected array $routes = [];

//   public function get(string $uri, $handler, array $middleware = [])
//   {
//     if (is_array($handler) && isset($handler['handler'])) {
//       $handlerString = $handler['handler'];
//       $middleware = array_merge($middleware, $handler['middleware'] ?? []);
//     } else {
//       $handlerString = $handler;
//     }

//     $this->routes['GET'][$uri] = ['handler' => $handlerString, 'middleware' => $middleware];
//   }

//   public function dispatch(string $method, string $uri)
//   {

//     $request = new Request($_GET, $_POST, $_SERVER);
//     $response = new Response();
//     $route = $this->routes[$method][$uri] ?? null;

//     $route = isset($this->routes[$method][$uri]) ? $this->routes[$method][$uri] : null;



//     if ($route !== null) {
//       // Apply middleware for the specific route
//       foreach ($route['middleware'] as $middlewareClass) {
//         $middleware = new $middlewareClass();
//         $response = $middleware->handle($request, $response, function ($request, $response) {
//           return $response;
//         });

//         // If the middleware returns a response, return it immediately
//         if ($response !== null) {
//           $handler = $route['handler'];
//           return $handler;
//           // return $response;
//         }
//       }

//       // Execute the route handler
//       $handler = $route['handler'];
//       return $handler;

//       // Here you can include logic to execute the handler
//       // ...

//     } else {
//       // Route not found, return a 404 response
//       http_response_code(404);
//       return '404 Not Found';
//     }
//   }
// }


namespace App\Core;

class Router
{
    protected array $routes = [];

    public function get(string $uri, $handler, array $middleware = [])
    {
        $this->addRoute('GET', $uri, $handler, $middleware);
    }

    public function post(string $uri, $handler, array $middleware = [])
    {
        $this->addRoute('POST', $uri, $handler, $middleware);
    }

    protected function addRoute(string $method, string $uri, $handler, array $middleware = [])
    {
        if (is_array($handler) && isset($handler['handler'])) {
            $handlerString = $handler['handler'];
            $middleware = array_merge($middleware, $handler['middleware'] ?? []);
        } else {
            $handlerString = $handler;
        }

        $this->routes[$method][$uri] = ['handler' => $handlerString, 'middleware' => $middleware];
    }

    public function dispatch(string $method, string $uri)
    {
        $request = new Request($_GET, $_POST, $_SERVER);
        $response = new Response();
        $route = $this->routes[$method][$uri] ?? null;

        if ($route !== null) {
            foreach ($route['middleware'] as $middlewareClass) {
                $middleware = new $middlewareClass();
                $response = $middleware->handle($request, $response, function ($request, $response) {
                    return $response;
                });

                if ($response !== null) {
                    $handler = $route['handler'];
                    return $handler;
                }
            }

            $handler = $route['handler'];
            return $handler;
        } else {
            http_response_code(404);
            return '404 Not Found';
        }
    }
}

