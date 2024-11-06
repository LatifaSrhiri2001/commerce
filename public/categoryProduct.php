<?php
require_once '../src/config.php'; 
include_once '../src/components/navbar.php'; 

$category = isset($_GET['category']) ? $_GET['category'] : '';

// Fetch products for the given category
$stmt = $pdo->prepare("SELECT * FROM products WHERE LOWER(product_category) = LOWER(:category)");
$stmt->execute(['category' => $category]);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - <?php echo htmlspecialchars($category); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Products in <?php echo htmlspecialchars($category); ?></h1>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class=" p-6 ">
                        <img src="images/<?php echo htmlspecialchars($product['product_image']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>" class="w-full h-50 object-cover mb-4">
                        <h2 class="text-xl font-semibold"><?php echo htmlspecialchars($product['product_name']); ?></h2>
                        <p class="text-gray-600"><?php echo htmlspecialchars($product['product_description']); ?></p>
                        <p class="text-lg font-bold mt-2"><?php echo htmlspecialchars($product['product_price']); ?>€</p>
                        
                        <a href="productDetails.php?id=<?php echo $product['product_id']; ?>" class="mt-4 block text-center text-white bg-blue-500 py-2 rounded">View Details</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">No products found in this category.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
