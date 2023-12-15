<?php

namespace App\Core;

class Response
{
  protected $statusCode = 200;
  protected $headers = [];
  protected $content = '';

  public function setStatusCode(int $statusCode)
  {
    $this->statusCode = $statusCode;
    return $this;
  }

  public function setHeader(string $name, string $value)
  {
    $this->headers[$name] = $value;
    return $this;
  }

  public function setContent(string $content)
  {
    $this->content = $content;
    return $this;
  }

  public function redirect(string $url)
  {
    $this->setStatusCode(302)->setHeader('Location', $url)->setContent('');
    $this->send();
  }

  public function send()
  {
    // Set headers
    foreach ($this->headers as $name => $value) {
      header("$name: $value");
    }

    // Set status code
    http_response_code($this->statusCode);

    // Send content
    echo $this->content;

    // Finish the request
    exit();
  }
}
