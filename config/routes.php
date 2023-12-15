<?php
return [
  'GET' => [
    '{baseURL}/admin/login' => ['handler' => 'App\Admin\Controller\AdminController@login'],
    '{baseURL}/admin/dashboard' => [
      'handler' => 'App\Admin\Controller\AdminController@dashboard',
      'middleware' => ['App\Middleware\AuthMiddleware'],
    ],
    '{baseURL}/admin/addcourse' => [
      'handler' => 'App\Admin\Controller\AdminController@addCourse',
      'middleware' => ['App\Middleware\AuthMiddleware'],
    ],
  ],
];
