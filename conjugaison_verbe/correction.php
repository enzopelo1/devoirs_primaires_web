<?php
@ob_start();
include 'utils.php';
session_start();
log_adresse_ip("logs/log.txt", "correction.php - " . $_SESSION['prenom'] . " - Question numéro " . $_SESSION['nbQuestion']);

if ($_POST['correction1'] == "" || $_POST['correction2'] == "" || $_POST['correction3'] == "" || $_POST['correction4'] == "" || $_POST['correction5'] == "" || $_POST['correction6'] == "") {
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
			<h2 class="text-2xl font-bold mb-4">Voici tes bonnes et mauvaises réponses !</h2>
			<?php
			$nbPointsLocal = 0;
			if ($_POST['mot1'] == $_POST['correction1']) {
				echo 'Je/J\' ' . $_POST['mot1'] . ' &#9989;<br />';
				$_SESSION['nbBonneReponse']++;
				$nbPointsLocal++;
				$_SESSION['historique'] .= 'Je/J\' ' . $_POST['correction1'] . "\n";
			} else {
				echo 'Je/J\' <strike>' . $_POST['mot1'] . '</strike> &#10060; &#10132; ' . $_POST['correction1'] . '<br />';
				$_SESSION['historique'] .= '********Je/J\' ' . $_POST['mot1'] . ';Je/J\' ' . $_POST['correction1'] . "\n";
			}
			if ($_POST['mot2'] == $_POST['correction2']) {
				echo 'Tu ' . $_POST['mot2'] . ' &#9989;<br />';
				$_SESSION['nbBonneReponse']++;
				$nbPointsLocal++;
				$_SESSION['historique'] .= 'Tu ' . $_POST['correction2'] . "\n";
			} else {
				echo 'Tu <strike>' . $_POST['mot2'] . '</strike> &#10060; &#10132; ' . $_POST['correction2'] . '<br />';
				$_SESSION['historique'] .= '********Tu ' . $_POST['mot2'] . ';Tu ' . $_POST['correction2'] . "\n";
			}
			if ($_POST['mot3'] == $_POST['correction3']) {
				echo 'Il/Elle/On ' . $_POST['mot3'] . ' &#9989;<br />';
				$_SESSION['nbBonneReponse']++;
				$nbPointsLocal++;
				$_SESSION['historique'] .= 'Il/Elle/On ' . $_POST['correction3'] . "\n";
			} else {
				echo 'Il/Elle/On <strike>' . $_POST['mot3'] . '</strike> &#10060; &#10132; ' . $_POST['correction3'] . '<br />';
				$_SESSION['historique'] .= '********Il/Elle/On ' . $_POST['mot3'] . ';Il/Elle/On ' . $_POST['correction3'] . "\n";
			}
			if ($_POST['mot4'] == $_POST['correction4']) {
				echo 'Nous ' . $_POST['mot4'] . ' &#9989;<br />';
				$_SESSION['nbBonneReponse']++;
				$nbPointsLocal++;
				$_SESSION['historique'] .= 'Nous ' . $_POST['correction4'] . "\n";
			} else {
				echo 'Nous <strike>' . $_POST['mot4'] . '</strike> &#10060; &#10132; ' . $_POST['correction4'] . '<br />';
				$_SESSION['historique'] .= '********Nous ' . $_POST['mot4'] . ';Nous ' . $_POST['correction4'] . "\n";
			}
			if ($_POST['mot5'] == $_POST['correction5']) {
				echo 'Vous ' . $_POST['mot5'] . ' &#9989;<br />';
				$_SESSION['nbBonneReponse']++;
				$nbPointsLocal++;
				$_SESSION['historique'] .= 'Vous ' . $_POST['correction5'] . "\n";
			} else {
				echo 'Vous <strike>' . $_POST['mot5'] . '</strike> &#10060; &#10132; ' . $_POST['correction5'] . '<br />';
				$_SESSION['historique'] .= '********Vous ' . $_POST['mot5'] . ';Vous ' . $_POST['correction5'] . "\n";
			}
			if ($_POST['mot6'] == $_POST['correction6']) {
				echo 'Ils/Elles ' . $_POST['mot6'] . ' &#9989;<br />';
				$_SESSION['nbBonneReponse']++;
				$nbPointsLocal++;
				$_SESSION['historique'] .= 'Ils/Elles ' . $_POST['correction6'] . "\n";
			} else {
				echo 'Ils/Elles <strike>' . $_POST['mot6'] . '</strike> &#10060; &#10132; ' . $_POST['correction6'] . '<br />';
				$_SESSION['historique'] .= '********Ils/Elles ' . $_POST['mot6'] . ';Ils/Elles ' . $_POST['correction6'] . "\n";
			}
			echo '<br />';
			if ($nbPointsLocal > 1)
				echo 'Tu as ' . $nbPointsLocal . ' bonnes réponses sur 6 questions.';
			else
				echo 'Tu as ' . $nbPointsLocal . ' bonne réponse sur 6 questions.';
			?>
			<br /><br />
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