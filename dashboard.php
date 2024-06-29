<?php
session_start();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Inclure le fichier de connexion à la base de données
require_once 'bdcon.php';

// Récupération les informations de l'utilisateur depuis la base de données
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    $username = $user['name'];
} else {
    // Gestion d'une éventuelle erreur , le user doit etre trouvé
    $username = "Utilisateur inconnu";
}

$page_title = "Dashboard"; 
include('includes/header.php');
include('includes/navbar.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
      
    </style>
</head>
<body>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-shadow">
                    <div class="card-body">
                        <h5 class="mb-4">Bonjour, <?php echo $username; ?></h5>

                      

                        <p>Ce contenu est visible une fois que vous êtes connecté.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card card-shadow mb-4">
    <div class="card-body">
        <h5 class="card-title">Profil Utilisateur</h5>
        <form action="update_profile.php" method="POST">
            <div class="form-group">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo htmlspecialchars($username); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
            </div>
           
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">Modifier le profil</button>
        </form>
    </div>
</div>


<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Modifier le profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="update_profile.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_username">Nouveau nom d'utilisateur:</label>
                        <input type="text" id="new_username" name="new_username" class="form-control" value="<?php echo htmlspecialchars($username); ?>">
                    </div>
                    <div class="form-group">
                        <label for="new_email">Nouvel email:</label>
                        <input type="email" id="new_email" name="new_email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="card card-shadow mb-4">
    <div class="card-body">
        <h5 class="card-title">Profil Utilisateur</h5>
        <div class="text-center mb-3">
            <?php if (!empty($user['profile_image'])): ?>
                <img src="<?php echo htmlspecialchars($user['profile_image']); ?>" alt="Photo de profil" class="rounded-circle" style="width: 150px; height: 150px;">
            <?php else: ?>
                <img src="default_profile.png" alt="Photo de profil par défaut" class="rounded-circle" style="width: 150px; height: 150px;">
            <?php endif; ?>
        </div>
        <form action="update_profile.php" method="POST">
            <div class="form-group">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo htmlspecialchars($username); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
            </div>
          
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">Modifier le profil</button>
        </form>
    </div>
</div>

<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Modifier le profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_username">Nouveau nom d'utilisateur:</label>
                        <input type="text" id="new_username" name="new_username" class="form-control" value="<?php echo htmlspecialchars($username); ?>">
                    </div>
                    <div class="form-group">
                        <label for="new_email">Nouvel email:</label>
                        <input type="email" id="new_email" name="new_email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="profile_image">Photo de profil:</label>
                        <input type="file" id="profile_image" name="profile_image" class="form-control-file">
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Modifier le profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_username">Nouveau nom d'utilisateur:</label>
                        <input type="text" id="new_username" name="new_username" class="form-control" value="<?php echo htmlspecialchars($username); ?>">
                    </div>
                    <div class="form-group">
                        <label for="new_email">Nouvel email:</label>
                        <input type="email" id="new_email" name="new_email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="profile_image">Photo de profil:</label>
                        <input type="file" id="profile_image" name="profile_image" class="form-control-file">
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Modifier le profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_username">Nouveau nom d'utilisateur:</label>
                        <input type="text" id="new_username" name="new_username" class="form-control" value="<?php echo htmlspecialchars($username); ?>">
                    </div>
                    <div class="form-group">
                        <label for="new_email">Nouvel email:</label>
                        <input type="email" id="new_email" name="new_email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="profile_image">Photo de profil:</label>
                        <input type="file" id="profile_image" name="profile_image" class="form-control-file">
                    </div>
            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>




</body>
</html>
