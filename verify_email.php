<?php
session_start();
include('bdcon.php'); 

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
    // Vérification le token dans la base de données
    $query = "SELECT * FROM users WHERE verify_token = '$token' LIMIT 1";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $user_id = $user['id'];

        // on met en jour le statut de vérification
        $update_query = "UPDATE users SET is_verified = 1 WHERE id = $user_id";
        if (mysqli_query($con, $update_query)) {
            // Rediriger vers la page de bienvenue
            $_SESSION['user_id'] = $user_id;
            $_SESSION['is_verified'] = 1;
            header("Location: welcome.php");
            exit();
        } else {
            echo "Échec de la mise à jour de la vérification. Veuillez contacter le support.";
        }
    } else {
        echo "Token non valide.";
    }
} else {
    echo "Token non spécifié.";
}
?>
