<?php

namespace App\Admin\Service;

class AdminAuthService
{
  public static function authenticate($username, $password)
  {
    // Add your authentication logic here
    // For simplicity, let's assume a basic check for admin credentials
    return ($username === 'admin' && $password === 'password');
  }
}
