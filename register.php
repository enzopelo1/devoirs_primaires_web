<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupère et sécurise les données du formulaire
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];
    $class = $_POST['class'] ?? null;
    $child_id = $_POST['child_id'] ?? null;
    $teaches_class = $_POST['teaches_class'] ?? null;

    // Vérifie si les mots de passe correspondent
    if ($password !== $confirm_password) {
        $error = 'Les mots de passe ne correspondent pas.';
    } else {
        try {
            // Hash le mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Détermine la classe à insérer dans la base de données
            $class_to_insert = $role === 'enseignant' ? $teaches_class : $class;

            // Insère le nouvel utilisateur dans la base de données
            $sql = "INSERT INTO users (username, password, role, class) VALUES (:username, :password, :role, :class)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
            $stmt->bindParam(':role', $role, PDO::PARAM_STR);
            $stmt->bindParam(':class', $class_to_insert, PDO::PARAM_STR);
            $stmt->execute();

            $user_id = $pdo->lastInsertId();

            if ($role == 'parent' && $child_id) {
                $sql = "INSERT INTO parent_child (parent_id, child_id) VALUES (:parent_id, :child_id)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':parent_id', $user_id, PDO::PARAM_INT);
                $stmt->bindParam(':child_id', $child_id, PDO::PARAM_INT);
                $stmt->execute();
            }

            // Initialise les variables de session pour l'utilisateur connecté
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = $username;
            $_SESSION['pseudo_utilisateur'] = $username;
            $_SESSION['id'] = $user_id;
            $_SESSION['role'] = $role;
            $_SESSION['class'] = $class_to_insert;
            $_SESSION['login_success'] = true;

            // Redirige l'utilisateur vers la page d'accueil
            header('Location: index.php');
            exit();
        } catch (PDOException $e) {
            // En cas d'erreur, affiche un message d'erreur
            $error = "Erreur : " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">
    <div class="w-full max-w-sm">
        <form action="register.php" method="post" class="bg-white p-6 rounded shadow-md">
            <h2 class="text-2xl font-bold mb-4">Inscription</h2>
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Mot de passe :</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="confirm_password" class="block text-gray-700">Confirmez le mot de passe :</label>
                <input type="password" id="confirm_password" name="confirm_password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="role" class="block text-gray-700">Rôle :</label>
                <select id="role" name="role" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Sélectionnez un rôle</option>
                    <option value="enfant">Enfant</option>
                    <option value="parent">Parent</option>
                    <option value="enseignant">Enseignant</option>
                </select>
            </div>
            <div id="class-container" class="mb-4" style="display: none;">
                <label for="class" class="block text-gray-700">Classe :</label>
                <select id="class" name="class" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Sélectionnez une classe</option>
                    <option value="CP">CP</option>
                    <option value="CE1">CE1</option>
                    <option value="CE2">CE2</option>
                    <option value="CM1">CM1</option>
                    <option value="CM2">CM2</option>
                </select>
            </div>
            <div id="child-container" class="mb-4" style="display: none;">
                <label for="child_id" class="block text-gray-700">Enfant :</label>
                <select id="child_id" name="child_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Sélectionnez un enfant</option>
                    <?php
                    $sql = "SELECT id, username FROM users WHERE role = 'enfant'";
                    $stmt = $pdo->query($sql);
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['id']}'>{$row['username']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div id="teaches-class-container" class="mb-4" style="display: none;">
                <label for="teaches_class" class="block text-gray-700">Classe enseignée :</label>
                <select id="teaches_class" name="teaches_class" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Sélectionnez une classe</option>
                    <option value="CP">CP</option>
                    <option value="CE1">CE1</option>
                    <option value="CE2">CE2</option>
                    <option value="CM1">CM1</option>
                    <option value="CM2">CM2</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600">S'inscrire</button>
            <?php
            if (isset($error)) {
                echo '<p class="mt-4 text-red-500">' . $error . '</p>';
            }
            ?>
        </form>
    </div>

    <script>
        document.getElementById('role').addEventListener('change', function() {
            var role = this.value;
            document.getElementById('class-container').style.display = role === 'enfant' ? 'block' : 'none';
            document.getElementById('child-container').style.display = role === 'parent' ? 'block' : 'none';
            document.getElementById('teaches-class-container').style.display = role === 'enseignant' ? 'block' : 'none';
        });
    </script>

    <div class="w-full">
        <?php include 'footer.php'; ?>
    </div>
</body>

</html>