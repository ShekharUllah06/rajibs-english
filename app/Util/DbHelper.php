<?php
class DbHelper
{
  public static function insert(PDO $db, $object, $table)
  {
    $reflection = new ReflectionClass($object);
    $properties = $reflection->getProperties();

    $columns = [];
    $values = [];

    foreach ($properties as $property) {
      $property->setAccessible(true);
      $columns[] = $property->getName();
      $values[] = $property->getValue($object);
    }

    $columnsString = implode(', ', $columns);
    $valuesString = implode(', ', array_fill(0, count($values), '?'));

    $sql = "INSERT INTO $table ($columnsString) VALUES ($valuesString)";
    $stmt = $db->prepare($sql);

    return $stmt->execute($values);
  }
}
