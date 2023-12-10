<?php

namespace App\Core;

class Router
{
  protected array $routes = [];

  public function get(string $uri, string $handler)
  {
    $this->routes['GET'][$uri] = $handler;
  }

  public function post(string $uri, string $handler)
  {
    $this->routes['POST'][$uri] = $handler;
  }

  public function loadRoutes()
  {
    return $this->routes;
  }
}
