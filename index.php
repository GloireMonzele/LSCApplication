<?php 
session_start();
$page_title="Login"; 
include('includes/header.php');
include('includes/navbar.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Langue des Signes Congolaise</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
     
        .hero-section {
            background-color: #f0f0f0;
            padding: 100px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #1DA1F2;
        }
        .hero-section p {
            font-size: 1.5rem;
            color: #333;
        }
        .feature-section {
            background-color: #fff;
            padding: 50px 0;
            text-align: center;
        }
        .feature-section h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #1DA1F2;
            margin-bottom: 30px;
        }
        .feature-section p {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 30px;
        }
        .feature-section .btn-primary {
            background-color: #1DA1F2;
            border-color: #1DA1F2;
            font-weight: bold;
            padding: 12px 24px;
            margin-top: 20px;
        }
        .feature-section .btn-primary:hover {
            background-color: #0c8abf;
            border-color: #0c8abf;
        }
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>
<body>




<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <img src="chemin/vers/votre/photo.jpg" alt="Photo de l'auteur" style="max-width: 200px; border-radius: 50%;">
                <h1>Bienvenue sur HandsSpeak with Sarah</h1>
                <p>Apprenez la langue des signes congolaise avec facilité et efficacité.</p>
                <a href="register.php" class="btn btn-primary btn-lg">Commencez votre formation</a>
            </div>
        </div>
    </div>
</section>

<section class="feature-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2>Cours interactifs</h2>
                <p>Explorez nos vidéos de formation interactives pour apprendre la langue des signes congolaise à votre propre rythme.</p>
                <a href="courses.php" class="btn btn-primary">Découvrir les cours</a>
            </div>
            <div class="col-lg-4">
                <h2>Quiz divertissants</h2>
                <p>Testez vos connaissances avec nos quiz amusants et éducatifs sur la langue des signes congolaise.</p>
                <a href="quiz.php" class="btn btn-primary">Essayer les quiz</a>
            </div>
            <div class="col-lg-4">
                <h2>Ressources utiles</h2>
                <p>Découvrez une variété de ressources supplémentaires pour enrichir votre apprentissage de la langue des signes congolaise.</p>
                <a href="resources.php" class="btn btn-primary">Explorer les ressources</a>
            </div>
        </div>
    </div>
</section>




<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 HandsSpeak with Sarah. Tous droits réservés.</p>
    </div>
</footer>

<!-- Liens vers Bootstrap JS, jQuery et Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
