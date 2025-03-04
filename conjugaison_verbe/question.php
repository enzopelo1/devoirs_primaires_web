<?php
@ob_start();
include 'utils.php';

session_start();
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
$alea = mt_rand(2, 2);
$temps = 'present';

if ($alea == 1)
	$temps = 'futur';
if ($alea == 2)
	$temps = 'imparfait';
$fichier = file("verbes/" . $temps . ".txt");
$total = count($fichier);
$alea = mt_rand(0, $total - 1);
$verbe = $fichier[$alea];
$verbe = substr($verbe, 0, -1);
$verbeSansAccent = str_replace("à", "a", $verbe);
$verbeSansAccent = str_replace("â", "a", $verbeSansAccent);
$verbeSansAccent = str_replace("é", "e", $verbeSansAccent);
$verbeSansAccent = str_replace("è", "e", $verbeSansAccent);
$verbeSansAccent = str_replace("ë", "e", $verbeSansAccent);
$verbeSansAccent = str_replace("ê", "e", $verbeSansAccent);
$verbeSansAccent = str_replace("î", "i", $verbeSansAccent);
$verbeSansAccent = str_replace("ï", "i", $verbeSansAccent);
$verbeSansAccent = str_replace("ô", "o", $verbeSansAccent);
$verbeSansAccent = str_replace("ö", "o", $verbeSansAccent);
$verbeSansAccent = str_replace("ù", "u", $verbeSansAccent);
$verbeSansAccent = str_replace("û", "u", $verbeSansAccent);
$verbeSansAccent = str_replace("ü", "u", $verbeSansAccent);
$verbeSansAccent = str_replace("ÿ", "y", $verbeSansAccent);
$verbeSansAccent = str_replace("ç", "c", $verbeSansAccent);
$nomFichier = "verbes/" . $verbeSansAccent . "_" . $temps . ".txt";
$fichierVerbe = file($nomFichier);
$reponse1 = substr($fichierVerbe[0], 0, -1);
$reponse2 = substr($fichierVerbe[1], 0, -1);
$reponse3 = substr($fichierVerbe[2], 0, -1);
$reponse4 = substr($fichierVerbe[3], 0, -1);
$reponse5 = substr($fichierVerbe[4], 0, -1);
$reponse6 = substr($fichierVerbe[5], 0, -1);
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
			<h2 class="text-2xl mb-4">Conjugue le verbe <u><?php echo $verbe; ?></u> au <?php echo $temps; ?> :</h2>
			<form action="./correction.php" method="post" class="space-y-4">
				<input type="hidden" name="correction1" value="<?php echo $reponse1; ?>">
				<input type="hidden" name="correction2" value="<?php echo $reponse2; ?>">
				<input type="hidden" name="correction3" value="<?php echo $reponse3; ?>">
				<input type="hidden" name="correction4" value="<?php echo $reponse4; ?>">
				<input type="hidden" name="correction5" value="<?php echo $reponse5; ?>">
				<input type="hidden" name="correction6" value="<?php echo $reponse6; ?>">
				<table class="w-full mx-auto">
					<tbody>
						<tr>
							<td class="text-left"><label for="mot1">Je/J' </label></td>
							<td><input type="text" id="mot1" name="mot1" autocomplete="off" autofocus class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></td>
						</tr>
						<tr>
							<td class="text-left"><label for="mot2">Tu </label></td>
							<td><input type="text" id="mot2" name="mot2" autocomplete="off" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></td>
						</tr>
						<tr>
							<td class="text-left"><label for="mot3">Il/Elle/On </label></td>
							<td><input type="text" id="mot3" name="mot3" autocomplete="off" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></td>
						</tr>
						<tr>
							<td class="text-left"><label for="mot4">Nous </label></td>
							<td><input type="text" id="mot4" name="mot4" autocomplete="off" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></td>
						</tr>
						<tr>
							<td class="text-left"><label for="mot5">Vous </label></td>
							<td><input type="text" id="mot5" name="mot5" autocomplete="off" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></td>
						</tr>
						<tr>
							<td class="text-left"><label for="mot6">Ils/Elles </label></td>
							<td><input type="text" id="mot6" name="mot6" autocomplete="off" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></td>
						</tr>
					</tbody>
				</table>
				<button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Valider</button>
			</form>
		</div>
	</div>

	<?php include '../footer.php'; ?>
</body>

</html>