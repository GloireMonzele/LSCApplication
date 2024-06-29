<?php
ob_start();
session_start();


include('bdcon.php');

// Vérification si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
   
    header('Location: dashboard.php');
    exit;
}

$page_title = "Login Form"; 
include('includes/header.php');
include('includes/navbar.php');

// Traitement du formulaire de login
if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

 
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        
        if ($password === $row['password']) {
         
            $_SESSION['user_id'] = $row['id']; 

          
            header('Location: dashboard.php');
            exit;
        } else {
          
            $_SESSION['message'] = "Mot de passe incorrect. Veuillez réessayer.";
            $_SESSION['message_type'] = "danger";
        }
    } else {
        // Utilisateur non trouvé avec cet email
        $_SESSION['message'] = "Aucun utilisateur trouvé avec cet email.";
        $_SESSION['message_type'] = "danger";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Votre style CSS -->
</head>
<body>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card card-shadow">
                    <div class="card-body">
                        <h5 class="mb-4">Login Form</h5>

                        <!-- Affichage du message d'erreur s'il existe -->
                        <?php if (isset($_SESSION['message']) && isset($_SESSION['message_type'])): ?>
                            <div class="alert alert-<?php echo $_SESSION['message_type']; ?>" role="alert">
                                <?php echo $_SESSION['message']; ?>
                            </div>
                            <?php
                            // Nettoyer les variables de session une fois affichées
                            unset($_SESSION['message']);
                            unset($_SESSION['message_type']);
                            ?>
                        <?php endif; ?>

                        <!-- Formulaire de connexion -->
                        <form method="POST" action="login.php">
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="login_btn" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>

                        <!-- Liens supplémentaires -->
                        <div class="mt-3 text-center">
                            <p>Vous n'avez pas de compte ? <a href="register.php">Créez un compte ici</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
ob_end_flush(); // Fin du tampon de sortie
?>
