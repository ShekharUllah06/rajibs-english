<?php
return [
  'GET' => [
    '{baseURL}/admin/login' => ['handler' => 'App\Admin\Controller\AdminController@login'],
    '{baseURL}/admin/logout' => ['handler' => 'App\Admin\Controller\AdminController@processLogout'],
    '{baseURL}/admin/dashboard' => [
      'handler' => 'App\Admin\Controller\AdminController@dashboard',
      'middleware' => ['App\Middleware\AuthMiddleware'],
    ],
    '{baseURL}/addtask' => [
      'handler' => 'App\Admin\Controller\AdminController@addTask',
      'middleware' => ['App\Middleware\AuthMiddleware'],
    ],
  ],

  'POST' => [
    // '{baseURL}/admin/login' => ['handler' => 'App\Admin\Controller\AdminController@processLogin'],
    '{baseURL}/admin/login' => [
      'handler' => 'App\Admin\Controller\AdminController@processLogin',
    ],
    '{baseURL}/insertTask' => [
      'handler' => 'App\Admin\Controller\TaskController@insertTask',
    ],
  ],
];
