<?php
// Configuration de la base de données
$host = 'localhost';   
$db   = 'shop';  
$user = 'root';   
$pass = '';   

// Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=utf8";

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO($dsn, $user, $pass);

    // Configurer PDO pour afficher les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Si une erreur survient lors de la connexion
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

?>

