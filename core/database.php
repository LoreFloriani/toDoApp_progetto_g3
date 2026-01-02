<?php
// config/database.php
$host = '127.0.0.1';
$db_name = 'Remindly';
$username = 'root';
$password = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";

$options = [

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 

    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Tenta di creare la connessione (l'oggetto $pdo)
    $pdo = new PDO($dsn, $username, $password, $options);
    
} catch (\PDOException $e) {

    die("Errore di connessione al database: " . $e->getMessage());
}
?>