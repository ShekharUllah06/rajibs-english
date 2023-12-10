<?php

use App\Core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

// Initialize the application
$app = new Application(dirname(__DIR__));

// Load routes
$router = $app->getRouter();
$routes = include __DIR__ . '/../config/routes.php';

foreach ($routes as $method => $routeList) {
  foreach ($routeList as $uri => $handler) {
    $router->$method($uri, $handler);
  }
}

// Run the application
$app->run();
