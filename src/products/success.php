<?php
session_start();

// Connexion à la base de données (si nécessaire)
$pdo = new PDO('mysql:host=localhost;dbname=shop', 'root', '');

// Récupérer les informations de l'utilisateur et du panier
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Exemple d'enregistrement de la commande en base de données
if (!empty($cart)) {
    $total = 0;
    foreach ($cart as $item) {
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;

        // Ajouter chaque article à la table des commandes (si elle existe)
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, product_name, quantity, total_price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user_id, $item['name'], $item['quantity'], $subtotal]);
    }

    // Vider le panier après la commande
    unset($_SESSION['cart']);
}

// Afficher le message de confirmation
echo "<h1>Paiement réussi !</h1>";
echo "<p>Merci pour votre commande. Votre numéro de commande est : " . htmlspecialchars($pdo->lastInsertId()) . ".</p>";
echo '<a href="index.php" class="btn btn-primary">Retour à la boutique</a>';
?>
