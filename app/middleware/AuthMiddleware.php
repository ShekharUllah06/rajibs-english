<?php
// app/Middleware/AuthMiddleware.php

// app/Middleware/AuthMiddleware.php

namespace App\Middleware;

use App\Core\Request;
use App\Core\Response;

class AuthMiddleware implements MiddlewareInterface
{
  public function handle(Request $request, Response $response, callable $next)
  {
    // Check if the user is authenticated (you need to implement this logic)
    $authenticated = $this->checkAuthentication($request);

    if (!$authenticated) {
      // Redirect to the login page
      $response->redirect('login');
      return $response;
    }

    // User is authenticated, continue to the next middleware or route handler
    return $next($request, $response);
  }

  protected function checkAuthentication(Request $request)
  {
    return true;
  }
}
