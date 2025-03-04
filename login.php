<?php
// Inclut le fichier de configuration pour la connexion à la base de données
require_once 'config.php';

// Démarre une nouvelle session ou reprend une session existante
session_start();

// Initialise la variable d'erreur
$error = '';

// Vérifie si l'utilisateur est déjà connecté
if (isset($_SESSION['user'])) {
    // Redirige l'utilisateur vers la page d'accueil s'il est déjà connecté
    header("Location: index.php");
    exit();
}

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupère et sécurise les données du formulaire
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    try {
        // Prépare et exécute la requête pour récupérer les informations de l'utilisateur
        $sql = "SELECT id, password, role, class FROM users WHERE username=:username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        // Vérifie si l'utilisateur existe
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $stored_password = $row['password'];
            $userId = $row['id'];
            $role = $row['role'];
            $class = $row['class'];

            // Vérifie si le mot de passe est correct
            if (password_verify($password, $stored_password)) {
                // Initialise les variables de session pour l'utilisateur connecté
                $_SESSION['logged_in'] = true;
                $_SESSION['user'] = $username;
                $_SESSION['pseudo_utilisateur'] = $username;
                $_SESSION['id'] = $userId;
                $_SESSION['role'] = $role;
                $_SESSION['class'] = $class;
                $_SESSION['login_success'] = true;

                // Redirige l'utilisateur vers la page d'accueil
                header('Location: index.php');
                exit();
            } else {
                // Affiche une erreur si le mot de passe est incorrect
                $error = 'Mot de passe incorrect.';
            }
        } else {
            // Affiche une erreur si le nom d'utilisateur est incorrect
            $error = "Nom d'utilisateur incorrect.";
        }
    } catch (PDOException $e) {
        // En cas d'erreur, affiche un message d'erreur
        $error = "Erreur : " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
    <!-- Inclut Tailwind CSS pour le style -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Inclut le fichier header.php pour l'en-tête de la page -->
    <?php include 'header.php'; ?>
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-center">Connexion</h1>
            <!-- Affiche un message d'erreur si nécessaire -->
            <?php if ($error): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Erreur!</strong>
                    <span class="block sm:inline"><?php echo $error; ?></span>
                </div>
            <?php endif; ?>
            <!-- Formulaire de connexion -->
            <form method="post" action="login.php" class="space-y-4">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Mot de passe" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Se connecter</button>
                </div>
            </form>
            <div class="mt-4 text-center">
                <!-- Lien vers la page d'inscription -->
                <a href="register.php" class="text-indigo-600 hover:text-indigo-800">Créer un compte</a>
            </div>
        </div>
    </div>
</body>

</html>