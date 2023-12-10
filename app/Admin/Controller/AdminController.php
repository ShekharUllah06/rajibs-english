<?php

namespace App\Admin\Controller;

use App\Core\View;

class AdminController
{
  public function login()
  {
    View::render('Admin', 'login', ['username' => 'John']);
  }
}
