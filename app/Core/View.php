<?php

namespace App\Core;

class View
{
  public static function render(string $module, string $view, array $data = [])
  {
    extract($data);
    $filePath = dirname(__DIR__, 1) . "/{$module}/View/{$view}.php";
    // Convert backslashes to forward slashes for Windows compatibility
    $filePath = str_replace('\\', '/', $filePath);
    include $filePath;
  }
}
