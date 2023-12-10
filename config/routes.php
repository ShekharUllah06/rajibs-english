<?php

return [
  'GET' => [
    '/rajibs-english/public/admin/login' => 'App\Admin\Controller\AdminController@login',
  ],

  'POST' => [
    '/login' => 'App\Auth\Controller\AuthController@login',
    '/logout' => 'App\Auth\Controller\AuthController@logout',
  ],
];
