
    <!--=============================================== HEADER ================================================-->
   <nav class="navbar navbar-expand-lg shadow">
        <div class="container">
            <a class="navbar-brand text-warning fw-bolder" href="../../public/index.php">E-commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                   
                <li class="nav-item dropdown">
    <a class="nav-link " href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-user me-2 ms-3"></i>Profile
    </a>
    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
        <li>
            <a class="dropdown-item" href="../src/auth/userAccout.php">Profile</a>
        </li>
        <li>
            <a class="dropdown-item" href="../src/auth/logout.php">Logout</a>
        </li>
    </ul>
</li>

                    <li class="nav-item">
                        <a class="nav-link  " href="../src/auth/userAccout.php">
                            <button class=" bg-warning text-white rounded border-0 ">
                              <i class="fa fa-shopping-cart me-2 "></i>Cart  
                            </button>
                            
                            
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>