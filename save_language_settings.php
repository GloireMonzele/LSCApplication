<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurez-vous que l'utilisateur est connecté
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

   
    require_once 'bdcon.php';

    // Récupération l'ID utilisateur de la session
    $user_id = $_SESSION['user_id'];

    
    $sign_language = $_POST['sign_language'];

  
    $query = "UPDATE users SET sign_language = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "si", $sign_language, $user_id);
    
    if (mysqli_stmt_execute($stmt)) {
     
        header('Location: dashboard.php'); 
        exit;
    } else {
       
        echo "Erreur lors de la mise à jour des paramètres de langue : " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
} else {
    
    header('Location: dashboard.php');
    exit;
}
?>
