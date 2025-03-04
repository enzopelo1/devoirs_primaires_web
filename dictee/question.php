<?php
@ob_start();
session_start();
include 'utils.php';

$_SESSION['origine'] = "question";
if ($_SESSION['prenom'] == "" && $_POST['prenom'] == "") {
	log_adresse_ip("logs/log.txt", "question.php - accès irrégulier");
	unset($_SESSION);
	unset($_POST);
	header('Location: ./index.php');
}
if ($_SESSION['prenom'] == "") {
	$_SESSION['prenom'] = $_POST['prenom'];
}
$numQuestion = $_SESSION['nbQuestion'] + 1;
log_adresse_ip("logs/log.txt", "question.php - " . $_SESSION['prenom'] . " - Question numéro " . $numQuestion);

$_SESSION['nbQuestion'] = $_SESSION['nbQuestion'] + 1;
$fichier = file("listeDeMots/liste_dictee_20230407.txt");
$total = count($fichier);
$alea = mt_rand(0, $total - 1);
$ligneFichier = explode(';', $fichier[$alea]);
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Question</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
	<?php include '../header.php'; ?>

	<div class="container mx-auto py-8">
		<div class="bg-white p-8 rounded-lg shadow-lg text-center">
			<h1 class="text-4xl font-bold mb-4">Question Numéro <?php echo $_SESSION['nbQuestion']; ?></h1>
			<audio autoplay controls class="mx-auto mb-4">
				<source src="./<?php echo './sons/' . $ligneFichier[1]; ?>" type="audio/mpeg">
				Votre navigateur ne supporte pas l'audio. Passez à Firefox !
			</audio>
			<form action="./correction.php" method="post" class="space-y-4">
				<input type="hidden" name="correction" value="<?php echo $ligneFichier[0]; ?>">
				<label for="mot" class="block text-lg font-medium text-gray-700">Qu'as-tu entendu ?</label>
				<input type="text" id="mot" name="mot" autocomplete="off" autofocus class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
				<button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Valider</button>
			</form>
		</div>
	</div>

	<?php include '../footer.php'; ?>
</body>

</html>