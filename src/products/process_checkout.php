<?php
session_start();


// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: /SHOOP/public/login.php");
    exit();
}

// Récupérer l'ID de l'utilisateur à partir de la session
$user_id = $_SESSION['user_id'];

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les informations utilisateur
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Vérifier que le panier n'est pas vide
    if (!empty($_SESSION['cart'])) {
        // Calculer le total
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
        }

      // Sauvegarder les informations de la commande dans la base de données
$order_id = uniqid(); // Générer un ID unique pour la commande

// Exemple de connexion PDO à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=shop', 'root', '');

// Préparer la requête pour insérer la commande avec le user_id
$stmt = $pdo->prepare('INSERT INTO orders (order_id, user_id, name, email, address, total) VALUES (?, ?, ?, ?, ?, ?)');
$stmt->execute([$order_id, $user_id, $name, $email, $address, $total]);


        // Sauvegarder les détails des produits dans une autre table
        foreach ($_SESSION['cart'] as $product_id => $item) {
            $stmt = $pdo->prepare('INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)');
            $stmt->execute([$order_id, $product_id, $item['quantity'], $item['price']]);
        }

        // Rediriger vers une page de confirmation ou de paiement
        header('Location: confirmation.php?order_id=' . $order_id);
        exit();
    } else {
        echo 'Your cart is empty.';
    }
} else {
    echo 'Invalid request method.';
}
?>

