<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Découvrir les Cours - Langue des Signes Congolaise</title>
    <!-- Liens vers Bootstrap CSS et JavaScript -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Votre propre fichier CSS pour les styles personnalisés -->
    <style>
        /* Styles personnalisés */
        .main-section {
            background-color: #f8f9fa; /* Couleur de fond */
            padding: 100px 0; /* Espacement intérieur */
            text-align: center; /* Centrer le contenu */
        }

        .main-section h1 {
            font-size: 2.5rem; /* Taille de la police du titre */
            font-weight: bold; /* Gras */
            margin-bottom: 20px; /* Espacement en bas du titre */
        }

        .main-section p {
            font-size: 1.2rem; /* Taille de la police du paragraphe */
            color: #6c757d; /* Couleur du texte gris */
            margin-bottom: 40px; /* Espacement en bas du paragraphe */
        }

        .main-section .btn-primary {
            font-weight: bold; /* Gras */
            font-size: 1.2rem; /* Taille de la police */
            padding: 10px 30px; /* Espacement intérieur du bouton */
            border-radius: 25px; /* Bordures arrondies */
        }

        .main-section .btn-primary:hover {
            background-color: #0c8abf; /* Couleur de fond au survol */
            border-color: #0c8abf; /* Couleur de la bordure au survol */
        }
    </style>
</head>
<body>

<!-- Section principale -->
<section class="main-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <h1>Découvrir les Cours</h1>
                <p>Explorez notre sélection de cours interactifs en langue des signes congolaise.</p>
                <button class="btn btn-primary btn-lg" id="btnDiscoverCourses">Voir les cours</button>
            </div>
        </div>
    </div>
</section>


<script>
    
    document.getElementById('btnDiscoverCourses').addEventListener('click', function() {
        alert('Vous allez être redirigé vers la page des cours.');
       
        window.location.href = 'course.php';
    });
</script>

</body>
</html>
