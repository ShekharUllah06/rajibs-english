<?php
return [
  'GET' => [
    '{baseURL}/admin/login' => ['handler' => 'App\Admin\Controller\AdminController@login'],
    '{baseURL}/admin/dashboard' => [
      'handler' => 'App\Admin\Controller\AdminController@dashboard',
      'middleware' => ['App\Middleware\AuthMiddleware'],
    ],
  ],
];
