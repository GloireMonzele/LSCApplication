<?php
ob_start(); // Démarrage du tampon de sortie

session_start();
$page_title = "Formulaire d'Inscription";
include('includes/header.php');
include('includes/navbar.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587; 

        $mail->setFrom('monzelegloire1@gmail.com', 'Gloire Monzele');

        $mail->addAddress($email, $name); 

        
        $mail->isHTML(true);
        $mail->Subject = 'Vérification d\'email de Gloire Monzele';

        $verify_link = "http://localhost:81/LSC_PROJECT/activate_account.php?token=$verify_token";

        $mail_template = "
        <h2>Bienvenue sur Gloire Monzele</h2>
        <p>Veuillez vérifier votre adresse email pour activer votre compte :</p>
        <p><a href='$verify_link'>Cliquez ici pour vérifier</a></p>
        ";

        $mail->Body = $mail_template;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());

    // Vérification si l'email existe déjà
    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $check_result = mysqli_query($con, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        // Email déjà utilisé
        $_SESSION['message'] = "Cette adresse email est déjà associée à un compte. Veuillez utiliser une autre adresse email.";
        $_SESSION['message_type'] = "danger";
    } else {
        // Insertion des données de l'utilisateur dans la base de données
        $query = "INSERT INTO users (name, email, password, verify_token) 
                  VALUES ('$name', '$email', '$password', '$verify_token')";

        if (mysqli_query($con, $query)) {
            // Envoi de l'email de vérification
            if (sendmail_verify($name, $email, $verify_token)) {
                $_SESSION['message'] = "Un email de vérification a été envoyé à votre adresse.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de l'envoi de l'email de vérification. Veuillez réessayer plus tard.";
                $_SESSION['message_type'] = "danger";
            }
        } else {
            $_SESSION['message'] = "Erreur lors de l'inscription : " . mysqli_error($con);
            $_SESSION['message_type'] = "danger";
        }
    }
}

include('includes/footer.php'); 

// Fin de la sortie de tampon
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
</head>

<body>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card card-shadow">
                        <div class="card-body">
                            <h5 class="mb-4">Formulaire d'Inscription</h5>

                            <?php if (isset($_SESSION['message'])): ?>
                                <div class="alert alert-<?php echo $_SESSION['message_type']; ?>" role="alert">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                                <?php
                                unset($_SESSION['message']);
                                unset($_SESSION['message_type']);
                                ?>
                            <?php endif; ?>

                            <form method="POST" action="">
                                <div class="form-group mb-3">
                                    <label for="name">Nom</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
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
