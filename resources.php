<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorer les Quiz - Langue des Signes Congolaise</title>
   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
    <style>
     
        .main-section {
            background-color: #f8f9fa; 
            padding: 100px 0; 
            text-align: center; 
        }

        .main-section h1 {
            font-size: 2.5rem;
            font-weight: bold; 
            margin-bottom: 20px; 
        }

        .main-section p {
            font-size: 1.2rem; 
            color: #6c757d; 
            margin-bottom: 40px; 
        }

        .main-section .btn-primary {
            font-weight: bold;
            font-size: 1.2rem; 
            padding: 10px 30px; 
            border-radius: 25px; /
        }

        .main-section .btn-primary:hover {
            background-color: #0c8abf; 
            border-color: #0c8abf; 
        }
    </style>
</head>
<body>

<!-- Section principale -->
<section class="main-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <h1>Explorer les Quiz</h1>
                <p>Testez vos connaissances avec nos quiz interactifs sur la langue des signes congolaise.</p>
                <button class="btn btn-primary btn-lg" id="btnExploreQuizzes">Explorer les quiz</button>
            </div>
        </div>
    </div>
</section>

<!-- Script JavaScript pour l'interactivité -->
<script>
    // Script JavaScript pour rediriger vers la page des quiz
    document.getElementById('btnExploreQuizzes').addEventListener('click', function() {
        window.location.href = 'ressources.php'; 
    });
</script>

</body>
</html>
