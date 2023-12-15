<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use App\Core\Application;

require_once __DIR__ . '/vendor/autoload.php';

// Initialize the application
// Define the base URL
$baseURL = '/rajibs-english';
$app = new Application(dirname(__DIR__));

// Load routes
$router = $app->getRouter();
$routes = include __DIR__ . '/config/routes.php';

foreach ($routes as $method => $routeList) {
  foreach ($routeList as $uri => $handler) {
    $uri = str_replace('{baseURL}', $baseURL, $uri);
    $router->$method($uri, $handler);
  }
}

// Run the application
$app->run();
