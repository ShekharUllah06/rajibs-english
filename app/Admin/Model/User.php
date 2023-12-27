<?php

namespace App\Admin\Model;

use App\Core\Database;
use PDO;
use PDOException;

class User
{
  public $user_id;
  public $username;
  public $password_hash;
  public $email;
  public $full_name;
  public $active_status;

  protected Database $database;

  public function __construct(Database $database)
  {
    $this->database = $database;
  }

  public function login(string $username, string $password): bool
  {
    try {
      $hashedPassword = $this->getHashedPasswordByUsername($username);
      if ($hashedPassword !== null && $password==$hashedPassword) {
        $_SESSION['username'] = $username;
        return true;
      }

      echo "Not Matched";
      return false;
    } catch (PDOException $e) {
      return false;
    }
  }

  protected function getHashedPasswordByUsername(string $username): ?string
  {
    $query = "SELECT password_hash FROM user WHERE username = :username";
    $params = [':username' => $username];

    try {
      $result = $this->database->selectOne($query, $params);
      return $result ? $result['password_hash'] : null;
    } catch (PDOException $e) {
      return null;
    }
  }
}
