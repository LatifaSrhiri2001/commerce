<?php
session_start();

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Check if the product exists in the cart
    if (isset($_SESSION['cart'][$product_id])) {
        
        // Remove the product from the cart
        unset($_SESSION['cart'][$product_id]);
    }

    // Redirect back to the cart page
    header('Location: cart.php');
    exit();
}
?>

