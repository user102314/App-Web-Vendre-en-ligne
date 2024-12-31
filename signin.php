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

// Traitement du formulaire de connexion
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier si l'utilisateur existe
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['pass'])) {
        $_SESSION['user'] = $user['email'];
        header("Location: prod.php");
        exit();
    } else {
        $login_error = "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EIDID</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="css/back1.css">
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <?php if (isset($login_error)) : ?>
            <p class="error"><?php echo $login_error; ?></p>
        <?php endif; ?>
        <form action="signin.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <p class="toggle-form">Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>