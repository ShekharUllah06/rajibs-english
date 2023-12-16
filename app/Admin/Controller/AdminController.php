<?php

namespace App\Admin\Controller;

use App\Core\View;
use App\Core\Database;

use Exception;

class AdminController
{
  public function login()
  {
    View::render('Admin', 'login', ['username' => 'John']);
  }

  public function dashboard()
  {
    $content = View::renderPartial('Admin', 'dashboard');
    return View::render('admin', 'index', ['content' => $content, 'active' => 'dashboard']);
  }
  public function addCourse()
  {
    try {
      $db = Database::getInstance();
      
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
    // $content = View::renderPartial('Admin', 'addcourse');
    // return View::render('admin', 'index', ['content' => $content, 'active' => 'addcourse','expand'=> 'course']);
  }
}

