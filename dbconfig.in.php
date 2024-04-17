<?php

// Define database connection parameters
$host = '127.0.0.1:3306';
$dbname = 'StudentInfo';
$username = 'root';
$password = 'Yara020702';

// Create a PDO instance
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "connected to the database";
} catch (PDOException $e) {
  die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>