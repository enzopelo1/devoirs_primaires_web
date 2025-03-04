<?php
@ob_start();
include 'utils.php';
session_start();
log_adresse_ip("logs/log.txt", "correction.php - " . $_SESSION['prenom'] . " - Question numéro " . $_SESSION['nbQuestion']);

if ($_POST['correction'] == "") {
	session_destroy();
	session_unset();
	unset($_POST);
	header('Location: ./index.php');
}
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Correction</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
	<?php include '../header.php'; ?>

	<div class="container mx-auto py-8 flex-grow">
		<div class="bg-white p-8 rounded-lg shadow-lg text-center min-h-[300px]">
			<?php if ($_POST['mot'] == $_POST['correction']): ?>
				<h1 class="text-2xl font-bold text-green-600 mb-4">Super <?php echo $_SESSION['prenom']; ?> ! Bonne réponse.</h1>
				<?php $_SESSION['nbBonneReponse']++; ?>
			<?php else: ?>
				<h1 class="text-2xl font-bold text-red-600 mb-4">Oh non !</h1>
				<h2 class="text-xl mb-4">La bonne réponse était : <?php echo $_POST['operation'] . $_POST['correction']; ?>.</h2>
			<?php endif; ?>
			<?php $_SESSION['historique'] .= $_POST['operation'] . ($_POST['mot'] == $_POST['correction'] ? $_POST['correction'] : '********' . $_POST['mot'] . ';' . $_POST['correction']) . "\n"; ?>
			<?php if ($_SESSION['nbQuestion'] < $_SESSION['nbMaxQuestions']): ?>
				<form action="./question.php" method="post" class="mt-4">
					<button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Suite</button>
				</form>
			<?php else: ?>
				<form action="./fin.php" method="post" class="mt-4">
					<button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Suite</button>
				</form>
			<?php endif; ?>
		</div>
	</div>

	<?php include '../footer.php'; ?>
</body>

</html>