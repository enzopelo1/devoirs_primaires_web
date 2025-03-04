<?php
@ob_start();
include 'utils.php';
log_adresse_ip("logs/log.txt", "index.php");

session_start();

//Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion

if (!isset($_SESSION['user'])) {
	header('Location: ../login.php');
	exit();
}
$_SESSION['nbMaxQuestions'] = 10;
$_SESSION['nbQuestion'] = 0;
$_SESSION['nbBonneReponse'] = 0;
$_SESSION['prenom'] = "";
$_SESSION['historique'] = "";
$_SESSION['origine'] = "index";

// Récupérer la classe de l'utilisateur depuis la base de données
$userId = $_SESSION['id'];
include '../config.php'; // Assurez-vous que le fichier config.php contient la connexion à la base de données
$sql = "SELECT class FROM users WHERE id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
$stmt->execute();
$userClass = $stmt->fetchColumn();
$_SESSION['class'] = $userClass;
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Accueil</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	<style>
		html,
		body {
			height: 100%;
		}

		body {
			display: flex;
			flex-direction: column;
		}

		main {
			flex: 1;
		}
	</style>
</head>

<body class="bg-gray-100">
	<?php include '../header.php'; ?>

	<main class="container mx-auto py-8">
		<div class="bg-white p-8 rounded-lg shadow-lg text-center">
			<h1 class="text-4xl font-bold mb-4">Bonjour !</h1>
			<?php if ($_SESSION['class'] == 'CP'): ?>
				<h2 class="text-2xl mb-4">Nous allons faire du calcul mental avec des nombres entre 0 et 100.</h2>
			<?php elseif ($_SESSION['class'] == 'CE1'): ?>
				<h2 class="text-2xl mb-4">Nous allons faire du calcul mental avec des nombres entre 0 et 1000.</h2>
			<?php else: ?>
				<h2 class="text-2xl mb-4">Nous allons faire du calcul mental avec des nombres entre 1000 et 9999.</h2>
			<?php endif; ?>
			<h3 class="text-xl mb-6">Appuyez sur "Commencer" pour démarrer l'exercice.</h3>
			<a href="./question.php" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Commencer</a>
		</div>
	</main>

	<?php include '../footer.php'; ?>
</body>

</html>