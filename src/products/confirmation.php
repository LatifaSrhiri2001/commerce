<?php
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    header("Location: paiyement.php");
} else {
    echo "<h2>There was an error processing your order.</h2>";
}

