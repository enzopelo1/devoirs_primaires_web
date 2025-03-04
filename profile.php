<?php
session_start();
include 'config.php';

// Je vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Je vérifie si le rôle de l'utilisateur est défini
if (!isset($_SESSION['role'])) {
    echo "Erreur : rôle de l'utilisateur non défini.";
    exit();
}

// Je récupère les résultats des exercices de l'utilisateur, de ses enfants ou de ses élèves
$userId = $_SESSION['id'];
$role = $_SESSION['role'];
$class = $_SESSION['class'] ?? '';

// Je définis la colonne de tri par défaut
$sort = $_GET['sort'] ?? 'date';
$validSortColumns = ['date', 'exercise_type', 'name'];
$sortColumn = in_array($sort, $validSortColumns) ? $sort : 'date';

// Je prépare la requête SQL en fonction du rôle de l'utilisateur
if ($role == 'parent') {
    $sql = "SELECT exercise_results.exercise_type, exercise_results.score, exercise_results.date, users.username AS child_name
            FROM exercise_results
            JOIN parent_child ON exercise_results.user_id = parent_child.child_id
            JOIN users ON users.id = parent_child.child_id
            WHERE parent_child.parent_id = :parent_id
            ORDER BY " . ($sortColumn == 'name' ? 'child_name' : $sortColumn) . " DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':parent_id', $userId, PDO::PARAM_INT);
} elseif ($role == 'enseignant') {
    $sql = "SELECT exercise_results.exercise_type, exercise_results.score, exercise_results.date, users.username AS student_name
            FROM exercise_results
            JOIN users ON exercise_results.user_id = users.id
            WHERE users.class = (SELECT class FROM users WHERE id = :teacher_id)
            ORDER BY " . ($sortColumn == 'name' ? 'student_name' : $sortColumn) . " DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':teacher_id', $userId, PDO::PARAM_INT);
} else {
    $sql = "SELECT exercise_type, score, date FROM exercise_results WHERE user_id = :user_id ORDER BY " . $sortColumn . " DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
}

// J'exécute la requête et je récupère les résultats
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Je récupère tous les noms des enfants pour le volet déroulant
$childrenSql = "SELECT id, username FROM users WHERE role = 'enfant'";
$childrenStmt = $pdo->prepare($childrenSql);
$childrenStmt->execute();
$children = $childrenStmt->fetchAll(PDO::FETCH_ASSOC);

// J'ajoute un enfant à un parent
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['child_id'])) {
    $childId = $_POST['child_id'];
    $parentId = $_SESSION['id'];

    $addChildSql = "INSERT INTO parent_child (parent_id, child_id) VALUES (:parent_id, :child_id)";
    $addChildStmt = $pdo->prepare($addChildSql);
    $addChildStmt->bindParam(':parent_id', $parentId, PDO::PARAM_INT);
    $addChildStmt->bindParam(':child_id', $childId, PDO::PARAM_INT);
    $addChildStmt->execute();

    echo "Enfant ajouté avec succès.";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        thead th {
            background-color: #1f2937;
            color: white;
        }

        tbody tr:hover {
            background-color: #e5e7eb;
            /* Gris clair pour le survol */
        }

        table {
            border-spacing: 0 4px;
            /* Séparation de 4 pixels entre les lignes */
        }
    </style>
</head>

<body class="bg-gray-100">
    <?php include 'header.php'; ?>
    <main class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Profil de <?php echo htmlspecialchars($_SESSION['pseudo_utilisateur']); ?> (<?php echo htmlspecialchars($class); ?>)[<?php echo htmlspecialchars($role); ?>]</h1>
        <h2 class="text-2xl mb-4">Statistiques des exercices</h2>

        <form method="GET" class="mb-4">
            <label for="sort" class="mr-2">Trier par :</label>
            <select name="sort" id="sort" class="border rounded py-1 px-2">
                <option value="date">Date</option>
                <option value="exercise_type">Type d'exercice</option>
                <?php if ($role == 'parent' || $role == 'enseignant'): ?>
                    <option value="name">Nom de l'élève</option>
                <?php endif; ?>
            </select>
            <button type="submit" class="ml-2 py-1 px-4 bg-blue-500 text-white rounded">Trier</button>
        </form>

        <?php if ($role == 'parent'): ?>
            <h2 class="text-2xl mb-4">Ajouter un enfant</h2>
            <form method="POST" class="mb-4">
                <label for="child_id" class="mr-2">Sélectionner un enfant :</label>
                <select name="child_id" id="child_id" class="border rounded py-1 px-2">
                    <?php foreach ($children as $child): ?>
                        <option value="<?php echo htmlspecialchars($child['id']); ?>"><?php echo htmlspecialchars($child['username']); ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="ml-2 py-1 px-4 bg-blue-500 text-white rounded">Ajouter</button>
            </form>
        <?php endif; ?>

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-center">Type d'exercice</th>
                    <th class="py-2 px-4 border-b text-center">Score</th>
                    <th class="py-2 px-4 border-b text-center">Date</th>
                    <?php if ($role == 'parent' || $role == 'enseignant'): ?>
                        <th class="py-2 px-4 border-b text-center">Nom de l'élève</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                    <tr>
                        <td class="py-2 px-4 border-b text-center"><?php echo htmlspecialchars($result['exercise_type']); ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo htmlspecialchars($result['score']); ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo htmlspecialchars($result['date']); ?></td>
                        <?php if ($role == 'parent'): ?>
                            <td class="py-2 px-4 border-b text-center"><?php echo htmlspecialchars($result['child_name']); ?></td>
                        <?php elseif ($role == 'enseignant'): ?>
                            <td class="py-2 px-4 border-b text-center"><?php echo htmlspecialchars($result['student_name']); ?></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>