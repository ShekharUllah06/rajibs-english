<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/vendor/autoload.php';

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/path/to/entities'], $isDevMode);

// Database connection configuration
$conn = [
  'driver' => 'pdo_mysql',
  'host' => 'your_database_host',
  'user' => 'your_database_user',
  'password' => 'your_database_password',
  'dbname' => 'your_database_name',
];

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

return ConsoleRunner::createHelperSet($entityManager);
