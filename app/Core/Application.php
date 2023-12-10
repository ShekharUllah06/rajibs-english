<?php

namespace App\Core;

class Application
{
  protected string $basePath;
  protected Router $router;

  public function __construct(string $basePath)
  {
    $this->basePath = $basePath;
    $this->router = new Router();
  }

  public function getRouter(): Router
  {
    return $this->router;
  }

  public function middleware(array $middlewares)
  {
    // Implement middleware registration logic here
    // For simplicity, we'll leave it empty in this example
  }

  public function run()
  {
    // Get the requested URI
    $uri = $_SERVER['REQUEST_URI'];

    // Get the request method
    $method = $_SERVER['REQUEST_METHOD'];

    // Load the routes
    $routes = $this->router->loadRoutes();

    // Check if the requested route exists
    if (isset($routes[$method][$uri])) {
      // Extract the controller and method from the route
      $handler = $routes[$method][$uri];
      list($controllerClass, $method) = explode('@', $handler);

      // Create an instance of the controller
      $controller = new $controllerClass();

      // Call the specified method on the controller
      call_user_func([$controller, $method]);
    } else {
      // Output a 404 Not Found response
      http_response_code(404);
      echo '404 Not Found';
    }
  }
}
