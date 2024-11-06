<?php
session_start();
?>
<?php include_once '../../src/components/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../public/css/cart.css"">
 

</head>
<body>
  <div class="shopping-cart bg-light p-5 container rounded-4 mt-5 ">
    <h2 class="text-center fw-bold">SHOPPING CARD</h2>

  </div>

<div class="container shooping  shoomy-5 mt-5">
    

    <?php 
    
    if (!empty($_SESSION['cart'])): ?>
      <table class="table cart-table table-responsive">
        <thead>
          <tr>
            <th scope="col">Product</th>
            <th scope="col">Quantity</th>
            <th scope="col">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $product_id => $item):
              $subtotal = $item['price'] * $item['quantity'];
              $total += $subtotal;
          ?>
          <tr>
          <td>
    <div class="d-flex align-items-center">
        <?php if (!empty($item['image'])): ?>
          <img src="public/images/<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="me-3">
 <?php else: ?>
            <p>No image available</p>
        <?php endif; ?>
        <div>
            <h5 class="mb-1"><?php echo htmlspecialchars($item['name']); ?></h5>
            <p class="mb-1">€ <?php echo htmlspecialchars($item['price']); ?></p>
            <a href="remove_from_cart.php?product_id=<?php echo $product_id; ?>" class="text-warning remove">Remove</a>
        </div>
    </div>
</td>

            <td>
              <form method="POST" action="update_cart.php">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <input type="number" name="quantity" class="form-control quantity-input d-inline me-2" value="<?php echo $item['quantity']; ?>" min="1">
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </td>
            <td class="subtotal">€ <?php echo $subtotal; ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="d-flex justify-content-between">
        <h4 class="fw-bold bg-warning p-2">Total: $<?php echo $total; ?></h4>
        <a href="checkout.php" class="btn btn-checkout p-3">Proceed to Checkout</a>
      </div>

    <?php else: ?>
      <p class="empty-cart text-center">Your cart is empty.</p>
    <?php endif; ?>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<?php include_once '../../src/components/footer.php'; ?>
</body>
</html>


