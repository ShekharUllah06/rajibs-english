<?php

namespace App\Admin\Controller;
use App\Core\View;
use App\Core\Database;
use App\Admin\Model\User;
use App\Core\Request;
use App\Core\Response;

use Exception;

class AdminController
{
  private Request $request;
  private Response $response;

  public function __construct(Request $request, Response $response)
  {
    $this->request = $request;
    $this->response = $response;
  }

  public function login()
  {
    View::render('Admin', 'login', ['username' => 'John']);
  }

  public function dashboard()
  {
    $content = View::renderPartial('Admin', 'dashboard');
    return View::render('admin', 'index', ['content' => $content, 'active' => 'dashboard']);
  }

  public function addTask()
  {
    try {
      $database = Database::getInstance();
      $userModel = new User($database);
      $loggedIn = $userModel->login('shekhar', 'shekhar');

      if ($loggedIn) {
        $content = View::renderPartial('Admin', 'addtask');
        return View::render('admin', 'index', ['content' => $content, 'active' => 'addtask', 'expand' => 'task']);
      }
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function processLogin()
  {
    // Retrieve the form data from the POST request
    $username = $this->request->post('email'); // Assuming the input name is 'email'
    $password = $this->request->post('password'); // Assuming the input name is 'password'

    try {
      $database = Database::getInstance();
      $userModel = new User($database);
      $loggedIn = $userModel->login($username, $password);

      if ($loggedIn) {
        // $content = View::renderPartial('Admin', 'addcourse');
        // return View::render('admin', 'index', ['content' => $content, 'active' => 'addcourse', 'expand' => 'course']);
        $this->response->redirect('dashboard');
        return; // Important: Stop further execution after the redirect
      }
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function processLogout()
  {

    // Start the session if not started
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    $this->response->redirect('login');
       
  }
}
