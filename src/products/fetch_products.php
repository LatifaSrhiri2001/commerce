<?php
// Connection to the database
$conn = new mysqli("localhost", "root", "", "shop");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$min_price = isset($_GET['min_price']) ? (float)$_GET['min_price'] : 0;
$max_price = isset($_GET['max_price']) ? (float)$_GET['max_price'] : 5000;
$category = isset($_GET['category']) ? $conn->real_escape_string($_GET['category']) : '';



$query = "SELECT * FROM products WHERE product_name LIKE '%$search%' AND product_price BETWEEN $min_price AND $max_price";
if ($category !== '') {
    $query .= " AND product_category = '$category'";
}

$result = $conn->query($query);

// Display products
if ($result->num_rows > 0) {
    echo "<div class='row'>"; // Open the row container
    $counter = 0; // Initialize a counter

    while ($product = $result->fetch_assoc()) {
        echo "
        <div class='col-md-4 mt-5 mb-5 text-center'>
            <figure class='card card-product-grid border-0 p-3'>
                <div class='img-wrap'> 
                    <img src='images/{$product['product_image']}' class='img-fluid product-image' alt='{$product['product_name']}'>
                </div>
                <figcaption class='info-wrap'>
                    <a href='#' class='title  text-dark'>{$product['product_name']}</a>
                    <div class='price-wrap mt-2'>
                        <span class='price fw-bold'>{$product['product_price']}$</span>
                    </div>
                   <div class='stars text-warning'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                            </div>
                             <a href='../src/products/singleProduct.php?product_id={$product['product_id']}' class=' btn btn-outline bg-warning fw-bold text-dark p-2 add-to-cart'>Add to Cart</a>
                   
             
                </figcaption>
            </figure>
        </div>";

        $counter++;

       
        if ($counter % 3 === 0) {
            echo "</div><div class='row'>"; 
        }
    }
    echo "</div>"; 
} else {
    echo "<p class='text-center'>No products found.</p>";
}


$conn->close();
?>

<style>
    /* Ensure all product images have the same size */
.product-image {
    width: 100%; /* Full width */
    height: 300px; /* Set a fixed height */
    object-fit: contain; /* Cover the area without stretching */
}

/* Remove text decoration from the title and Add to Cart link */
.title {
    text-decoration: none; /* Remove underline */
}

.add-to-cart {
    text-decoration: none; /* Remove underline */
    color: #6e4aac; /* Customize the color if needed */
}

/* Make product name bold */
.title {
    font-weight: bold;
}

/* Optional: Hover effect for Add to Cart link */
.add-to-cart:hover {
    text-decoration: underline; /* Underline on hover for better UX */
}

</style>