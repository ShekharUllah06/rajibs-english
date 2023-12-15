<?php

namespace App\Admin\Controller;

use App\Core\View;

class AdminController
{
  public function login()
  {
    View::render('Admin', 'login', ['username' => 'John']);
  }

  public function dashboard()
  {
    $content = View::renderPartial('Admin', 'dashboard');
    return View::render('admin', 'index', ['content' => $content]);
  }
}
