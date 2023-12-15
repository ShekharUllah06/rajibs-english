<?php

namespace App\Core;

class Request
{
  protected array $get;
  protected array $post;
  protected array $server;

  public function __construct(array $get, array $post, array $server)
  {
    $this->get = $get;
    $this->post = $post;
    $this->server = $server;
  }

  public function getMethod(): string
  {
    return strtoupper($this->server['REQUEST_METHOD']);
  }

  public function getUri(): string
  {
    return $this->server['REQUEST_URI'];
  }

  public function get(string $key, $default = null)
  {
    return $this->get[$key] ?? $default;
  }

  public function post(string $key, $default = null)
  {
    return $this->post[$key] ?? $default;
  }
}
