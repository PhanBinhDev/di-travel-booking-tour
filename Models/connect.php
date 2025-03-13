<?php
require './Configs/Config.php';

$servername = $config['servername'] ?? 'localhost';
$username = $config['username'] ?? 'root';
$password = $config['password'] ?? '';
$dbname = $config['dbname'] ?? 'ditravel';

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>