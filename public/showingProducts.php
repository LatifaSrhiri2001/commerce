<?php include_once '../src/components/navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Filter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-md-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Search product...">
        </div>
        <div class="col-md-2">
            <select id="categoryFilter" class="form-control">
                <option value="">All Categories</option>
                <?php include_once '../src/products/fetch_categories.php'; ?>
            </select>
        </div>
        <div class="col-md-2">
            <input id="minPrice" class="form-control" placeholder="$0" type="number" value="0">
        </div>
        <div class="col-md-2">
            <input id="maxPrice" class="form-control" placeholder="$5000" type="number" value="5000">
        </div>
        <div class="col-md-2">
            <input id="filterBtn" class="form-control btn btn-warning" type="button" value="Filter">
        </div>
    </div>

    <div id="productDisplay" class="mt-4">
        <?php include_once '../src/products/fetch_products.php'; ?>
    </div>
</div>

<script>
$(document).ready(function() {
    loadProducts(); // Load products on page load

    $('#searchInput').on('input', function() {
        loadProducts();
    });

    $('#categoryFilter').change(function() {
        loadProducts();
    });

    $('#filterBtn').click(function(e) {
        e.preventDefault(); // Prevent default form submission
        loadProducts();
    });

    function loadProducts() {
        var searchQuery = $('#searchInput').val();
        var minPrice = $('#minPrice').val();
        var maxPrice = $('#maxPrice').val();
        var selectedCategory = $('#categoryFilter').val();

        $.ajax({
            url: '../src/products/fetch_products.php',
            method: 'GET',
            data: {
                search: searchQuery,
                min_price: minPrice,
                max_price: maxPrice,
                category: selectedCategory
            },
            success: function(response) {
                $('#productDisplay').html(response);
            },
            error: function() {
                alert('Error fetching products. Please try again.');
            }
        });
    }
});
</script>

<?php include_once '../src/components/footer.php'; ?>
</body>
</html>
