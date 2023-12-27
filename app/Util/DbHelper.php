<?php

namespace App\Util;

use PDO;
use ReflectionClass;

class DbHelper
{
  public static function insert(PDO $db, $object, $table)
  {
    $reflection = new ReflectionClass($object);
    $methods = $reflection->getMethods();

    $columns = [];
    $values = [];

    foreach ($methods as $method) {
      if (strpos($method->name, 'get') === 0) {
        $property = lcfirst(substr($method->name, 4));
        $columns[] = $property;
        $values[] = $method->invoke($object);
      }
    }

    $columnsString = implode(', ', $columns);
    $valuesString = implode(', ', array_fill(0, count($values), '?'));

    $sql = "INSERT INTO $table ($columnsString) VALUES ($valuesString)";
    $stmt = $db->prepare($sql);

    return $stmt->execute($values);
  }
}
