<header class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="../index.php">
            <h1 class="text-3xl font-bold">Les Devoirs de Primaire</h1>
        </a>
        <div class="flex space-x-4">
            <?php if (isset($_SESSION['pseudo_utilisateur'])): ?>
                <a href="../profile.php" class="text-white underline">Profil</a>
                <a href="../confirm_logout.php" class="text-white underline">Déconnexion</a>
            <?php else: ?>
                <a href="../login.php" class="text-white underline">Connexion</a>
            <?php endif; ?>
        </div>
    </div>
</header>   