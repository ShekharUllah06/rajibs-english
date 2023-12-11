<?php

return [
  'GET' => [
    '{baseURL}/admin/login' => 'App\Admin\Controller\AdminController@login',
  ],

  'POST' => [
    '{baseURL}/login' => 'App\Auth\Controller\AuthController@login',
    '{baseURL}/logout' => 'App\Auth\Controller\AuthController@logout',
  ],
];
