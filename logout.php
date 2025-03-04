<?php
// Démarre une nouvelle session ou reprend une session existante
session_start();

// Détruit toutes les données de la session
session_destroy();

// Redirige l'utilisateur vers la page d'accueil
header("Location: index.php");
exit();
