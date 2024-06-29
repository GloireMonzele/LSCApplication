<?php
session_start();
include('bdcon.php'); 

// Vérification du paramètre 'token' dans l'URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Requête pour trouver l'utilisateur avec le token spécifié
    $query = "SELECT * FROM users WHERE verify_token = '$token'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Utilisateur trouvé, activer le compte
        $user = mysqli_fetch_assoc($result);

        // 'verified' dans la base de données
        $update_query = "UPDATE users SET is_verified = 1 WHERE id = " . $user['id'];
        if (mysqli_query($con, $update_query)) {
            // Succès de l'activation du compte
            $_SESSION['message'] = "Votre compte a été activé avec succès. Vous pouvez maintenant vous connecter.";
            $_SESSION['message_type'] = "success";
            header("Location: login.php"); // Rediriger vers la page de connexion
            exit();
        } else {
            // Échec de l'activation du compte
            $_SESSION['message'] = "Erreur lors de l'activation du compte. Veuillez réessayer.";
            $_SESSION['message_type'] = "danger";
            header("Location: login.php"); 
            exit();
        }
    } else {
        // Aucun utilisateur trouvé avec ce token
        $_SESSION['message'] = "Token invalide. Veuillez réessayer.";
        $_SESSION['message_type'] = "danger";
        header("Location: login.php"); 
        exit();
    }
} else {
    
    $_SESSION['message'] = "Paramètre 'token' manquant. Veuillez utiliser le lien reçu par email.";
    $_SESSION['message_type'] = "danger";
    header("Location: login.php"); 
    exit();
}
?>
