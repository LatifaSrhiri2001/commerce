
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="public/css/index.css">
  <link rel="stylesheet" href="public/css/home.css">
  <title>home</title>
 
</head>
<body>
<?php include_once 'src/components/navbar.php'; ?>


<!-- ********************************home section***************************** -->
<section class="home-section  py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 ">
      <h1 class="trendy-title ">SHOP CLOTHES AND WATCHES</h1>
      <p class=" fs-1 fw-bold" style="color:#423e37">UP TO 50% OFF ON TOP BRANDS</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. At, incidunt possimus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, veniam tempora?</p>
     <a href="public/showingProducts.php" class="btn btn-warning p-3 fw-bold fs-5 mb-5">Shop now</a>
       </div>
       <div class="col-md-6 col-sm-6">
        <img src="public/images/HOME.avif" class="img-fluid rounded" alt="Your Image">
      </div>
     </div>
    </div>
</section>
<!--*************************** fin home section***************************** -->


<!-- **********************************features section************************************** -->
<section class="features-section large-spacing my-5" style="margin-top:500px">
  <div class="container">
    <div class="feature-container">
      
      <div class="feature-item">
        <div class="feature-icon mx-4">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="feature-name">Cart</div>
        <p>Ajoutez vos produits préférés au panier pour un achat rapide et facile.</p>
      </div>
      
      <div class="feature-item">
        <div class="feature-icon mx-4">
          <i class="fas fa-credit-card"></i>
        </div>
        <div class="feature-name">Payment</div>
        <p>Procédez au paiement en toute sécurité avec nos différentes options de paiement.</p>
      </div>
      
      <div class="feature-item">
        <div class="feature-icon mx-4">
          <i class="fas fa-box"></i>
        </div>
        <div class="feature-name">Shipping</div>
        <p>Profitez d'une livraison rapide et fiable partout dans le monde.</p>
      </div>
      
      <div class="feature-item">
        <div class="feature-icon mx-4">
          <i class="fas fa-user"></i>
        </div>
        <div class="feature-name">Account</div>
        <p>Gérez vos informations personnelles et vos commandes via votre compte.</p>
      </div>
      
      <div class="feature-item">
        <div class="feature-icon mx-4">
          <i class="fas fa-star"></i>
        </div>
        <div class="feature-name">Reviews</div>
        <p>Lisez les avis clients et partagez votre expérience d'achat avec nous.</p>
      </div>
      
    </div>
  </div>
</section>

<!-- **************************************end features section*************************** -->



<!-- ***********************************************categories section************************* -->
<section class="categories-section large-spacing">
  <div class="container categories p-5 rounded-4">
    <h3 class="fw-bold text-center text-uppercase">Categories</h3>
    <div class="category-container row justify-content-center align-items-center g-2 p-3">
      <a href= "categoryProduct.php?category=Accessories"  class="col-6 col-sm-4 col-md-3 col-lg-2 text-decoration-none">
        <div class="category-item text-center">
          <div class="category-icon">
            <img src="public/images/watch1.jfif" alt="Category 1" class="img-fluid">
          </div>
          <div class="category-name fw-bold">Accessories</div>
        </div>
      </a>
      <a href= "categoryProduct.php?category=Clothing"  class="col-6 col-sm-4 col-md-3 col-lg-2 text-decoration-none">
        <div class="category-item text-center">
          <div class="category-icon">
            <img src="public/images/clo1.jpg" alt="Category 2" class="img-fluid">
          </div>
          <div class="category-name fw-bold">Clothing</div>
        </div>
      </a>
      <a href="categoryProduct.php?category=Shoes" class="col-6 col-sm-4 col-md-3 col-lg-2 text-decoration-none">
        <div class="category-item text-center">
          <div class="category-icon">
            <img src="public/images/SHOE1.jfif" alt="Category 3" class="img-fluid">
          </div>
          <div class="category-name fw-bold">Shoe</div>
        </div>
      </a>
      <a href= "categoryProduct.php?category=Bags" class="col-6 col-sm-4 col-md-3 col-lg-2 text-decoration-none">
        <div class="category-item text-center">
          <div class="category-icon">
            <img src="public/images/WOMAN11.jfif" alt="Category 4" class="img-fluid">
          </div>
          <div class="category-name fw-bold">Bags</div>
        </div>
      </a>
     
    </div>
  </div>
</section>





<!-- *******************************************end categories section*************************** -->


<!-- *******************************************Most popular section*********************************** -->
<section class="most-popular-section large-spacing m-4">
  <?php include_once 'src/components/popular.html'; ?>
</section>
<!-- *******************************************end Most popular section*************************** -->


<!-- *******************************************Beautiful product offer section*********************************** -->
<section class="beautiful-offer-section container bg-light rounded large-spacing ">
  <div class="container">
    <div class="row justify-content-center align-items-center g-2">
      <div class="col ml-5">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/></svg>
        <h1>Discover the Latest Smartwatch</h1>
    <p>From 22 EURO</p>
    <p>Stay connected and stylish with our latest smartwatch collection. Whether you're tracking your fitness or staying on top of notifications, this smartwatch has it all. Pair it with our exclusive range of women's bags for the ultimate look.</p>
    <a href="public/showingProducts.php"><button class="offer mt-4 bg-secondary rounded border-0 p-3 text-white">Shop now</button></a>
      </div>
      <div class="col-md-6 col-sm-2">
        <img src="public/images/SMARTWATCH.png" alt="watch" style="width:400px;height:400px;object-fit:cover;">
      </div>
    </div>
  </div>
</section>
<!-- *******************************************end beautiful product offer section*************************** -->


<!-- *******************************************Latest product section*********************************** -->
<section class="latest-products-section  container large-spacing ">
  <?php include_once 'src/components/latestProducts.php'; ?>
</section>
<!-- *******************************************end Latest product section*************************** -->


<section class="large-spacing ">
<?php include_once 'src/components/popular.html'; ?>  
</section>


 <section id="footer">
 <?php include_once 'src/components/footer.php'; ?> 
 </section>    



</body>
</html>
