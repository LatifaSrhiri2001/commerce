

$(document).ready(function() {
    loadCategories(); // Charger les catégories dans le dropdown
    loadProducts();   // Charger les produits au chargement de la page

    // Fonctionnalité de recherche
    $('#searchInput').on('input', function() {
        loadProducts();
    });

    // Filtrage par catégorie
    $('#categoryFilter').change(function() {
        loadProducts();
    });

    // Filtrage par prix
    $('#filterBtn').click(function() {
        loadProducts();
    });

    function loadCategories() {
        $.ajax({
            url: 'fetch_categories.php',
            method: 'GET',
            success: function(response) {
                $('#categoryFilter').append(response);
            }
        });
    }

    function loadProducts() {
        var searchQuery = $('#searchInput').val();
        var minPrice = $('#minPrice').val();
        var maxPrice = $('#maxPrice').val();
        var selectedCategory = $('#categoryFilter').val();

        $.ajax({
            url: 'fetch_products.php',
            method: 'GET',
            data: {
                search: searchQuery,
                min_price: minPrice,
                max_price: maxPrice,
                category: selectedCategory
            },
            success: function(response) {
                $('#productDisplay').html(response);
            }
        });
    }
});

