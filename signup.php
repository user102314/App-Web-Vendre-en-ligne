<?php
session_start();

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

// Traitement du formulaire d'inscription
if (isset($_POST['signup'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hacher le mot de passe

    // Vérifier si l'email existe déjà
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $signup_error = "Cet email est déjà utilisé.";
    } else {
        // Insérer le nouvel utilisateur
        $stmt = $conn->prepare("INSERT INTO users (nom, email, pass) VALUES (:nom, :email, :pass)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $password);
        $stmt->execute();

        $signup_success = "Inscription réussie ! Bienvenue, $nom.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - EIDID</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="css/back2.css">
</head>
<body>
    <div class="form-container">
        <h2>Sign Up</h2>
        <?php if (isset($signup_error)) : ?>
            <p class="error"><?php echo $signup_error; ?></p>
        <?php endif; ?>
        <?php if (isset($signup_success)) : ?>
            <p class="success"><?php echo $signup_success; ?></p>
        <?php endif; ?>
        <form action="signup.php" method="POST">
            <input type="text" name="nom" placeholder="Nom" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="signup">Sign Up</button>
        </form>
        <p class="toggle-form">Already have an account? <a href="signin.php">Login</a></p>
    </div>
</body>
</html>