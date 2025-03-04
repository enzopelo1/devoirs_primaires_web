<?php
@ob_start();
session_start();

//Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion

if (!isset($_SESSION['user'])) {
	header('Location: ../login.php');
	exit();
}
include 'utils.php';
log_adresse_ip("logs/log.txt", "index.php");

$_SESSION['nbMaxQuestions'] = 10;
$_SESSION['nbQuestion'] = 0;
$_SESSION['nbBonneReponse'] = 0;
$_SESSION['prenom'] = "";
$_SESSION['historique'] = "";
$_SESSION['origine'] = "index";
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Accueil</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
	<?php include '../header.php'; ?>

	<div class="container mx-auto py-8">
		<div class="bg-white p-8 rounded-lg shadow-lg text-center">
			<h1 class="text-4xl font-bold mb-4">Bonjour !</h1>
			<h2 class="text-2xl mb-4">Nous allons faire une dictée de <?php echo $_SESSION['nbMaxQuestions']; ?> mots.</h2>
			<h3 class="text-xl mb-6">Mais avant, Quel est ton prénom ?</h3>
			<form action="./question.php" method="post" class="space-y-4">
				<input type="text" id="prenom" name="prenom" autocomplete="off" autofocus class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
				<button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Commencer</button>
			</form>
		</div>
	</div>

	<?php include '../footer.php'; ?>
</body>

</html>