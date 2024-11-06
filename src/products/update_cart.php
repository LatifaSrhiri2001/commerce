<?php
session_start();

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $new_quantity = (int) $_POST['quantity'];

    // Assurez-vous que la nouvelle quantité est au moins 1
    if ($new_quantity > 0) {
        // Si le produit est dans le panier, mettez à jour sa quantité
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] = $new_quantity;
        }
    } else {
        // Si la quantité est inférieure à 1, supprimez le produit du panier
        unset($_SESSION['cart'][$product_id]);
    }
}

// Redirigez vers la page du panier après la mise à jour
header('Location: cart.php');
exit();
?>

