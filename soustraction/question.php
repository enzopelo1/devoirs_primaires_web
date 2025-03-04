<?php
@ob_start();
include 'utils.php';

session_start();

$numQuestion = $_SESSION['nbQuestion'] + 1;
log_adresse_ip("logs/log.txt", "question.php - " . $_SESSION['prenom'] . " - Question numéro " . $numQuestion);

$_SESSION['nbQuestion'] = $_SESSION['nbQuestion'] + 1;

// Ajuster les valeurs des nombres en fonction de la classe de l'utilisateur
$userClass = $_SESSION['class'];
if ($userClass == 'CP') {
	$nbGauche = mt_rand(0, 100);
	$nbDroite = mt_rand(0, 100);
} elseif ($userClass == 'CE1') {
	$nbGauche = mt_rand(0, 1000);
	$nbDroite = mt_rand(0, 1000);
} else {
	$nbGauche = mt_rand(1000, 9999);
	$nbDroite = mt_rand(1000, 9999);
}

$operation = $nbGauche . ' - ' . $nbDroite;
$reponse = $nbGauche - $nbDroite;
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
			<h2 class="text-2xl mb-4">Combien fait le calcul suivant ?</h2>
			<h3 class="text-xl mb-6"><?php echo $operation . ' = ?'; ?></h3>
			<form action="./correction.php" method="post" class="space-y-4">
				<input type="hidden" name="operation" value="<?php echo $operation . ' = '; ?>">
				<input type="hidden" name="correction" value="<?php echo $reponse; ?>">
				<label for="mot" class="block text-lg font-medium text-gray-700">Combien fait le calcul ci-dessus ?</label>
				<input type="text" id="mot" name="mot" autocomplete="off" autofocus class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
				<button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Valider</button>
			</form>
		</div>
	</div>

	<?php include '../footer.php'; ?>
</body>

</html>