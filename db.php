<?php
$host = 'localhost';
$db = 'dbcsdf1x9segki';
$user = 'ufgzffdwyusgm';
$pass = 'ifqlkpgc9quz';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>
