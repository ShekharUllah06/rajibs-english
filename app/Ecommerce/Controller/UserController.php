<?php

namespace App\Ecommerce\Controller;

use App\Core\View;
use App\Core\Database;
use App\Admin\Model\UserAdmin;

use Exception;

class UserController
{
  public function login()
  {
    // echo "Test Test";
    View::render('Ecommerce', 'index', ['username' => 'John']);
  }
}

