<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <title>E-Commerce Grid</title>

    <style>
        body ,.banner{
            margin:0 20px;
        }
    </style>
 
</head>
<body >
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <title>E-Commerce Grid</title>
    <style>
        /* Custom margin to add space between the elements and the edge of the screen */
        body {
            margin: 0 15px; /* Adds 15px margin on left and right */
        }
    </style>
</head>
<body>
    <div class="my-3">
        <!-- Banner Section -->
        <div class="banner mb-4">
            <div class="row justify-content-center align-items-center g-2 bg-light shadow-sm">
                <div class="col text-center">
                    <img src="path/to/designer-bags.jpg" alt="Designer Bags" class="img-fluid rounded" style="max-width: 250px;">
                </div>
                <div class="col text-center">
                    <h1>TRENDY SKIRTS</h1>
                    <p>UP TO 50% OFF ON TOP BRANDS</p>
                    <button class="btn btn-dark">SHOP NOW</button>
                </div>
            </div>
        </div>

        <!-- Product Grid Section -->
        <div class="row">
            <!-- Designer Bags -->
            <div class="col-md-4 mb-3 d-flex">
                <div class="bg-light shadow-sm p-5 text-left rounded w-100 h-100 d-flex align-items-center">
                    <div class="image-container">
                        <img src="images/shoehome.png" alt="Designer Bags" class="img-fluid" style="max-width:200px">
                    </div>
                    <div class="ml-3 py-3">
                        <h5>DESIGNER BAGS</h5>
                        <button class="btn btn-dark">BUY NOW</button>
                    </div>
                </div>
            </div>
            <!-- Branded Watch -->
            <div class="col-md-4 mb-3 d-flex">
                <div class="bg-light shadow-sm p-3 text-left rounded w-100 h-100 d-flex align-items-center">
                    <div class="image-container">
                        <img src="images/homeBg.png" alt="Branded Watch" class="img-fluid" style="max-width:200px">
                    </div>
                    <div class="ml-3">
                        <h3>BRANDED WATCH</h3>
                        <button class="btn btn-dark">SHOP NOW</button>
                    </div>
                </div>
            </div>
            <!-- Casual Shoes -->
            <div class="col-md-4 mb-3 d-flex">
                <div class="bg-light shadow-sm p-3 text-left rounded w-100 h-100 d-flex align-items-center">
                    <div class="image-container">
                        <img src="images/backhome.png" alt="Casual Shoes" class="img-fluid" style="max-width:200px">
                    </div>
                    <div class="ml-3">
                        <h3>CASUAL SHOES</h3>
                        <button class="btn btn-dark">SHOP NOW</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
