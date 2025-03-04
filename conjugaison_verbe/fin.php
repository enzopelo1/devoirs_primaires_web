<?php
@ob_start();
include '../config.php';
session_start();

$_SESSION['origine'] = "fin";

// Enregistrer les résultats dans la base de données
$userId = $_SESSION['id'];
$exerciseType = 'conjugaison_verbe';
$score = $_SESSION['nbBonneReponse'];

$sql = "INSERT INTO exercise_results (user_id, exercise_type, score) VALUES (:user_id, :exercise_type, :score)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
$stmt->bindParam(':exercise_type', $exerciseType, PDO::PARAM_STR);
$stmt->bindParam(':score', $score, PDO::PARAM_INT);
$stmt->execute();
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Fin de la série</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
	<?php include '../header.php'; ?>

	<div class="container mx-auto py-8 flex-grow">
		<div class="bg-white p-8 rounded-lg shadow-lg text-center min-h-[300px]">
			<h2 class="text-2xl font-bold mb-4">Fin du test.</h2>
			<p class="text-xl mb-4">Tu as <?php echo $_SESSION['nbBonneReponse']; ?> bonne(s) réponse(s) sur <?php echo $_SESSION['nbQuestion']; ?> questions.</p>
			<form action="../index.php" method="post" class="mt-4">
				<button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Accueil</button>
			</form>
		</div>
	</div>

	<?php include '../footer.php'; ?>
</body>

</html>