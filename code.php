<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('bdcon.php'); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

function sendmail_verify($name, $email, $verify_token)
{
    $mail = new PHPMailer(true); 

    try {
       
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'monzelegloire1@gmail.com'; 
        $mail->Password = 'wdltshhqhjgreszi'; 
        $mail->SMTPSecure = 'tls'; // Encryption TLS
        $mail->Port = 587; 

        // Sender information
        $mail->setFrom('monzelegloire1@gmail.com', 'Gloire Monzele'); 
        // Recipient
        $mail->addAddress('maboso631@gmail.com', $name); 

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification from Gloire Monzele';

        $verify_link = "http://localhost:81/LSC_PROJECT/register-login-with-verificiation/verify_email.php?token=$verify_token";

        $mail_template = "
        <h2>Welcome to Gloire Monzele</h2>
        <p>Verify your email address to activate your account:</p>
        <p><a href='$verify_link'>Click Here to Verify</a></p>
        ";

        $mail->Body = $mail_template;

        $mail->send();
        return true; // Succès de l'envoi de l'email
    } catch (Exception $e) {
        return false; // Échec de l'envoi de l'email
    }
}

if (isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());

    // Insertion des données de l'utilisateur dans la base de données
    $query = "INSERT INTO users (name, phone, email, password, verify_token) 
              VALUES ('$name', '$phone', '$email', '$password', '$verify_token')";

    if (mysqli_query($con, $query)) {
        // Envoi de l'email de vérification
        if (sendmail_verify($name, $email, $verify_token)) {
            $_SESSION['status'] = "Registration Successful! Please verify your email address.";
            header("Location: register.php");
            exit();
        } else {
            $_SESSION['status'] = "Failed to send verification email.";
            header("Location: register.php");
            exit();
        }
    } else {
        $_SESSION['status'] = "Registration Failed";
        header("Location: register.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card card-shadow">
                    <div class="card-body">
                        <h5 class="mb-4">Formulaire d'Inscription</h5>
                        <form method="POST" action="">
                            <div class="form-group mb-3">
                                <label for="name">Nom</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Téléphone</label>
                                <input type="text" id="phone" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Mot de passe</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="register_btn" class="btn btn-primary btn-block">S'inscrire</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
