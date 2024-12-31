<?php
// Connexion à la base de données
$host = "localhost";
$dbname = "eidid";
$username = "root"; // Utilisateur par défaut de XAMPP
$password = ""; // Mot de passe par défaut de XAMPP (vide)

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

?>