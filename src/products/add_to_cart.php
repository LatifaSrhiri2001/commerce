
<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];
    $product_image = $_POST['product_image'];

    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$product_id])) {
        // Update the quantity of the existing product
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        // Add the new product to the cart
        
       $_SESSION['cart'][$product_id] = [
    'name' => $product_name,
    'price' => $product_price,
    'quantity' => $quantity,
    'image' => $product_image,  // No 'public/images/' prefix here
];

    }

    // Redirect back to the cart display page
    header('Location: cart.php');
    exit();
}
?>
