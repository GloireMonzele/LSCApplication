<?php
session_start();
$page_title = "Welcome";
include('includes/header.php');
include('includes/navbar.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

//  personnalisation du contenu de bienvenue
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>Bienvenue, <?php echo $user_name; ?> !</h3>
                        <p>Contenu de la page de bienvenue ici...</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
