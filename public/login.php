<?php
include_once '../config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="d-flex flex-column min-vh-100">

<div class="container col-xxl-3 col-sm-6 col-lg-6 mt-5">
    <form action="../src/auth/process_login.php" method="post">
        <h3>Login</h3>
        
        <?php
        if (isset($message)) {
            foreach ($message as $msg) {
                echo '<div class="alert alert-danger">' . $msg . '</div>';
            }
        }
        ?>

        <div class="mb-3">
            <label for="email" class="form-label">Adresse Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
        </div>

        <div class="mb-3 password-wrapper">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            <i class="bi bi-eye-slash" id="togglePassword"></i>
        </div>

        <button type="submit" name="submit" class="btn btn-primary mb-3 col-md-12">Se connecter maintenant</button>
        <p class="text-center">Vous n'avez pas de compte ? <a href="register.php" class="ms-4 text-decoration-none fw-bolder" style="color:#191716">Inscrivez-vous maintenant</a></p>
    </form>
</div>



<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
        // Toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        // Toggle the eye slash icon
        this.classList.toggle('bi-eye');
    });
</script>
<!-- Bootstrap JS and Optional JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

</body>
</html>
