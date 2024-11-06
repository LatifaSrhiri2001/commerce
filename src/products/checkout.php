<?php
session_start();

// Vérifier si le panier existe
if (empty($_SESSION['cart'])) {
    header('Location: cart.php'); // Rediriger vers le panier si vide
    exit();
}

// Inclure la bibliothèque Stripe
require '../../vendor/autoload.php';

// Configurer la clé API Stripe
\Stripe\Stripe::setApiKey('sk_test_51Q57AuIyHaDXfOoKCKGTcfe7w62P3EEQnM4GXil47QGNPhWWnQKoguSkURXpN1070yjjScGRSsR7Kf9VP6AzVEs700tf9omXce'); // Remplace avec ta clé privée Stripe

// Calculer le total du panier
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $subtotal = $item['price'] * $item['quantity'];
    $total += $subtotal;
}

// Créer une session Stripe Checkout
$checkout_session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'eur', // Devise
            'product_data' => [
                'name' => 'Commande de produits', // Nom de l'article (peut être modifié)
            ],
            'unit_amount' => $total * 100, // Stripe attend les montants en centimes
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://your-website.com/success.php', // URL à laquelle l'utilisateur sera redirigé après un paiement réussi
    'cancel_url' => 'http://localhost/SHOOP/src/products/cancel.php', // URL à laquelle l'utilisateur sera redirigé après un paiement annulé
]);

// Rediriger l'utilisateur vers Stripe Checkout
header("Location: " . $checkout_session->url);
exit();
