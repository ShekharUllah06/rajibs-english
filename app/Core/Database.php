<?php

namespace App\Core;

use PDO;
use Exception;
use PDOException;

class Database
{
  private static $instance;
  private $connection;

  private function __construct($host, $dbname, $username, $password)
  {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    try {
      $this->connection = new PDO($dsn, $username, $password);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      throw new Exception("Database connection error: " . $e->getMessage());
    }
  }

  public static function getInstance()
  {
    if (!self::$instance) {
      $config = include(__DIR__ . '/../../config/database.php');
      self::$instance = new self(
        $config['host'],
        $config['database'],
        $config['username'],
        $config['password']
      );
    }

    return self::$instance;
  }

  public function getPDO()
  {
    return $this->connection;
  }

  public function selectOne(string $query, array $params = [])
  {
    $statement = $this->executeQuery($query, $params);
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  protected function executeQuery(string $query, array $params = [])
  {
    try {
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    } catch (PDOException $e) {
      throw new Exception("Database query error: " . $e->getMessage());
    }
  }
}
