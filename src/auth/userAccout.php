<?php
session_start(); // Démarre la session

if (!isset($_SESSION['user_id'])) {
    // Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
    header('Location:../public/login.php');
    exit();
}

include '../config.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5 ">
        <h3 class="mb-4 fw-bold mt-5 text-warning">Your Orders</h3>
        <table class="table cart-table table-responsive">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Status</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Requête pour obtenir les commandes de l'utilisateur connecté
                $query = $pdo->prepare("SELECT * FROM orders WHERE user_id = :user_id ORDER BY order_date DESC");
                $query->execute(['user_id' => $_SESSION['user_id']]);
                $orders = $query->fetchAll(PDO::FETCH_ASSOC);

                if (count($orders) > 0): ?>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                            <td>$<?php echo htmlspecialchars(number_format($order['cost'], 2)); ?></td>
                            <td><?php echo htmlspecialchars($order['status']); ?></td>
                            <td><?php echo htmlspecialchars(date('Y-m-d H:i:s', strtotime($order['order_date']))); ?></td>
                            <td>
                                <button class="btn btn-info btn-sm" onclick="showDetails(<?php echo $order['order_id']; ?>)">Show Details</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        function showDetails(orderId) {
            alert("Showing details for Order ID: " + orderId);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

