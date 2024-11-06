<?php include_once '../../src/components/navbar.php'; ?>

<?php
// Connexion à la base de données
require_once '../../src/config.php';

// Récupérer l'ID du produit dans l'URL
$product_id = $_GET['product_id'];

// Requête pour récupérer les détails du produit
$stmt = $pdo->prepare('SELECT * FROM products WHERE product_id = ?');
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo 'Produit non trouvé';
    exit;
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?php echo $product['product_name']; ?></title>

    <!-- Bootstrap & Fonts -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css'>
   
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap' rel='stylesheet'>
    
    <style>
        body { font-family: 'Poppins', sans-serif; }
        hr { height: 4px; background-color: #273043; width: 10%; margin: 20px auto; border-radius: 10px; }
    </style>
</head>
<body>

<div class='container py-5'>
    <div class='row'>
        <!-- Image principale du produit -->
        <div class='col-md-6'>
            <div class=''>
                <img id='product_image' src="/SHOOP/public/images/<?php echo $product['product_image']; ?>" class='img-fluid w-75' alt="<?php echo $product['product_name']; ?>">
            </div>
            <div class='row mt-3'>
                <!-- Miniatures sous l'image principale -->
                <div class='col-3'>
                    <img src="/SHOOP/public/images/<?php echo $product['product_image2']; ?>" class='img-fluid thumbnail' alt='<?php echo $product['product_name']; ?>'>
                </div>
                <div class='col-3'>
                    <img src="/SHOOP/public/images/<?php echo $product['product_image3']; ?>" class='img-fluid thumbnail' alt='<?php echo $product['product_name']; ?>'>
                </div>
                <div class='col-3'>
                    <img src="/SHOOP/public/images/<?php echo $product['product_image4']; ?>" class='img-fluid thumbnail' alt='<?php echo $product['product_name']; ?>'>
                </div>
            </div>
        </div>

        <!-- Détails du produit -->
        <div class='col-md-6'>
            <h2 class='product-title fw-bold'><?php echo $product['product_name']; ?></h2>
            <div class='product-rating mt-3 text-warning'>
            <div class='stars'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                            </div>
             
            </div>
            <p class='text-muted'>Brand: <?php echo $product['product_category']; ?></p>
            <p class='lead fw-bold'><?php echo $product['product_price']; ?> MAD</p>
            <p class='product-description'><?php echo $product['product_description']; ?></p>
            <form method='POST' action='add_to_cart.php'>
                <input type='hidden' name='product_id' value="<?php echo $product['product_id']; ?>">
                <input type='hidden' name='product_name' value="<?php echo $product['product_name']; ?>">
                <input type='hidden' name='product_price' value="<?php echo $product['product_price']; ?>">
                <label for='quantity'>Quantity:</label>
                <input type='number' class="border-secondary rounded py-2" name='quantity' id='quantity' value='1' min='1'>
                <button type='submit' class='btn btn-warning'>Add to Cart</button>
            </form>
        </div>
    </div>
</div>

<!-- PRODUITS SIMILAIRES -->
<section class='features container text-center mt-5 py-5'>
    <h3>Related Products</h3>
    <hr>
    <p>Our product features</p>
    <div class='row justify-content-center align-items-center g-2'>
        <?php
        // Récupérer des produits de la même catégorie, en excluant le produit actuel
        $stmt = $pdo->prepare('SELECT * FROM products WHERE product_category = ? AND product_id != ? ORDER BY RAND() LIMIT 3');
        $stmt->execute([$product['product_category'], $product_id]);
        $related_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($related_products as $related_product) {
            echo "
                <div class='col-md-4'>
                    <div class='card text-center border-0'>
                        <img class='card-img-top w-50 mx-auto' src='/SHOOP/public/images/{$related_product['product_image']}' alt='{$related_product['product_name']}' />
                        <div class='card-body me-3 '>
                            <div class='stars text-warning'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                            </div>
                            <h4 class='card-title '>{$related_product['product_name']}</h4>
                            <p class='card-text'>{$related_product['product_price']} MAD</p>
                            <button class='text-uppercase border-0 rounded-3 p-2 text-white' style='background-color:#e6af2e'>Buy Now</button>
                        </div>
                    </div>
                </div>
            ";
        }
        ?>
    </div>
</section>

<script>
// Changement d'image sur clic des miniatures
const productImage = document.getElementById("product_image");
const thumbnails = document.querySelectorAll(".thumbnail");

thumbnails.forEach(image => {
    image.addEventListener('click', function() {
        productImage.src = this.src;
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
