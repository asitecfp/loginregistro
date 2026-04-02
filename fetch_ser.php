<?php
$host = 'localhost';
$db   = 'bnucleds';
$user = 'antonio';
$pass = '*Lm2638220$';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

$stmt = $pdo->prepare('SELECT * FROM maecon04 WHERE tipcon04 = "Serie" AND nomcon04 LIKE ? LIMIT 20');
$stmt->execute(["%" . $_GET['q'] . "%"]);
$results = $stmt->fetchAll();

echo json_encode($results);
?>
