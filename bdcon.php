<?php
$host = 'localhost';  // MY  hôte
$username = 'root';   // ma  base de données
$password = '';       // password de ma base de donnée
$database = 'lscsarah'; // db's name, le mienne est lscsarah

// Connexion à la base de données
$con = mysqli_connect($host, $username, $password, $database);

// Vérification de la connexion
if (!$con) {
    die('Erreur de connexion : ' . mysqli_connect_error());
}
