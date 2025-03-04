<?php
// Démarre une nouvelle session ou reprend une session existante
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Confirmation de Déconnexion</title>
    <!-- Inclut Tailwind CSS pour le style -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Inclut le fichier header.php pour l'en-tête de la page -->
    <?php include 'header.php'; ?>
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-center">Confirmation de Déconnexion</h1>
            <p class="mb-6 text-center">Êtes-vous sûr de vouloir vous déconnecter ?</p>
            <div class="flex justify-center space-x-4">
                <!-- Lien pour confirmer la déconnexion -->
                <a href="logout.php" class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Oui</a>
                <!-- Lien pour annuler la déconnexion et revenir à la page d'accueil -->
                <a href="index.php" class="bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Non</a>
            </div>
        </div>
    </div>
</body>

</html>