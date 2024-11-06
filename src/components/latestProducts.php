<?php

require_once'C:\xampp\htdocs\SHOOP\src\config.php';
    $stmt = $pdo->query("SELECT * FROM products ORDER BY product_id DESC LIMIT 3");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h3 class="fw-bold text-center text-uppercase mt-5">Lastes News</h3>
<div class="row justify-content-center align-items-center g-2 mt-5">
    <?php foreach ($products as $product): ?>
        <div class="col">
            <div class="card text-start border-0 image-container bg-light">
                <img class="card-img-top image" src="public/images/<?= htmlspecialchars($product['product_image']) ?>" alt="<?= htmlspecialchars($product['product_name']) ?>"  />
                <div class="card-body">
                    <p class="">
                        <span><?= htmlspecialchars($product['product_description']) ?></span>
                        <br>
                        <a href=" src\products\singleProduct?product_id=<?= $product['product_id'] ?>" class="btn btn-dark">Shop now</a>
                    </p>
                 </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
--