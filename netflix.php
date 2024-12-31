<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: signin.php"); // Rediriger vers la page de connexion si non connecté
    exit();
}

$user_email = $_SESSION['user']; // Récupérer l'email de l'utilisateur

include "conexion.php";

// Traitement du formulaire de commande
if (isset($_POST['submit'])) {
    $produit = "Netflix"; // Nom du produit
    $quantite = isset($_POST['quantite']) ? (int)$_POST['quantite'] : 0; // Convertir en entier
    $custom_quantite = isset($_POST['custom-quantity-input']) ? (int)$_POST['custom-quantity-input'] : 0; // Custom quantity

    // Si l'utilisateur a choisi une quantité personnalisée, utiliser cette valeur
    if ($_POST['quantite'] === 'personalise' && $custom_quantite > 0) {
        $quantite = $custom_quantite;
    }

    // Vérifier que la quantité est valide
    if ($quantite <= 0) {
        die("Invalid quantity.");
    }

    $prix_unitaire = 20; // Prix unitaire pour Netflix
    $prix_total = $prix_unitaire * $quantite;

    // Insérer la commande dans la base de données
    $stmt = $conn->prepare("INSERT INTO commande (email, produit, quantite) VALUES (:email, :produit, :quantite)");
    $stmt->bindParam(':email', $user_email);
    $stmt->bindParam(':produit', $produit);
    $stmt->bindParam(':quantite', $quantite);
    $stmt->execute();

    $success_message = "Your order has been placed successfully! Total price: $prix_total DT.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix - EIDID</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .order-form {
            background-color: #111;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 119, 255, 0.3);
            width: 300px;
        }
        .order-form h1 {
            color: #000770;
        }
        .order-form label {
            display: block;
            margin: 10px 0 5px;
        }
        .order-form select, .order-form input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #333;
            border-radius: 5px;
            background-color: #222;
            color: #fff;
        }
        .order-form input:focus, .order-form select:focus {
            border-color: #000770;
            outline: none;
        }
        .order-form button {
            width: 100%;
            padding: 10px;
            background-color: #000770;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
        .order-form button:hover {
            background-color: #000550;
        }
        .success {
            color: #0f0;
            margin-bottom: 10px;
        }
    </style>
    <script>
        function updateQuantity() {
            const select = document.getElementById('quantite');
            const customQuantity = document.getElementById('custom-quantity');
            if (select.value === 'personalise') {
                customQuantity.style.display = 'block';
            } else {
                customQuantity.style.display = 'none';
            }
            calculateTotal();
        }

        function calculateTotal() {
            const select = document.getElementById('quantite');
            const customQuantity = document.getElementById('custom-quantity-input');
            const prixTotal = document.getElementById('prix-total');
            const prixUnitaire = 20; // Prix unitaire pour Netflix

            let quantite;
            if (select.value === 'personalise') {
                quantite = customQuantity.value ? parseInt(customQuantity.value) : 0;
            } else {
                quantite = parseInt(select.value);
            }

            const total = quantite * prixUnitaire;
            prixTotal.textContent = `Total Price: ${total} DT`;
        }

        function validateForm() {
            const select = document.getElementById('quantite');
            const customQuantity = document.getElementById('custom-quantity-input');
            if (select.value === 'personalise' && (!customQuantity.value || customQuantity.value <= 0)) {
                alert("Please enter a valid custom quantity.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="order-form">
        <h1>Netflix</h1>
        <?php if (isset($success_message)) : ?>
            <p class="success"><?php echo $success_message; ?></p>
        <?php endif; ?>
        <form action="canva.php" method="POST" onsubmit="return validateForm()">
            <label for="quantite">Select Quantity:</label>
            <select id="quantite" name="quantite" onchange="updateQuantity()" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="personalise">Personalized</option>
            </select>
            <div id="custom-quantity" style="display: none;">
                <label for="custom-quantity-input">Enter Quantity:</label>
                <input type="number" id="custom-quantity-input" name="custom-quantity-input" oninput="calculateTotal()" min="1">
            </div>
            <p id="prix-total">Total Price: 20 DT</p>
            <label for="payment">How will you pay?</label>
            <input type="text" id="payment" name="payment" placeholder="Enter payment method" required>
            <button type="submit" name="submit">Place Order</button>
        </form>
    </div>
</body>
</html>