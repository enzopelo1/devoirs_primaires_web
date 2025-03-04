<?php
// J'inclus le fichier de configuration
include 'config.php';

// Je démarre la session
session_start();

// Je gère le floutage/défloutage des exercices
if (isset($_POST['submit_floutage'])) {
	// Je récupère les exercices à flouter depuis le formulaire
	$exercices_a_flouter = isset($_POST['exercices_a_flouter']) ? $_POST['exercices_a_flouter'] : [];
	$classe = $_SESSION['class'];

	// Je supprime tous les exercices floutés pour la classe
	$stmt = $pdo->prepare("DELETE FROM exercices_floutes WHERE classe = :classe");
	$stmt->bindParam(':classe', $classe);
	$stmt->execute();

	// J'ajoute les nouveaux exercices floutés
	$stmt = $pdo->prepare("INSERT INTO exercices_floutes (classe, exercice) VALUES (:classe, :exercice)");
	foreach ($exercices_a_flouter as $exercice) {
		$stmt->bindParam(':classe', $classe);
		$stmt->bindParam(':exercice', $exercice);
		$stmt->execute();
	}
}

// Je récupère les exercices floutés pour la classe de l'enseignant
$exercices_floutes = [];
if (isset($_SESSION['class'])) {
	$classe = $_SESSION['class'];
	$stmt = $pdo->prepare("SELECT exercice FROM exercices_floutes WHERE classe = :classe");
	$stmt->bindParam(':classe', $classe);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $row) {
		$exercices_floutes[] = $row['exercice'];
	}
}
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Accueil</title>
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	<style>
		.floute {
			filter: blur(5px);
			pointer-events: none;
		}
	</style>
</head>

<body class="bg-gray-100">
	<?php include 'header.php'; ?>

	<div class="container mx-auto py-8">
		<div class="text-center">
			<?php if (isset($_SESSION['pseudo_utilisateur'])): ?>
				<h1 class="text-4xl font-bold mb-4">Bonjour <?php echo htmlspecialchars($_SESSION['pseudo_utilisateur']); ?>!</h1>
			<?php else: ?>
				<h1 class="text-4xl font-bold mb-4">Bonjour</h1>
			<?php endif; ?>
			<h2 class="text-2xl mb-8">Que veux-tu faire ?</h2>
		</div>

		<form method="post" class="text-center">
			<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
				<?php
				// Je définis les exercices disponibles
				$exercices = [
					'addition' => 'Addition',
					'soustraction' => 'Soustraction',
					'multiplication' => 'Multiplication',
					'dictee' => 'Dictée',
					'conjugaison_verbe' => 'Conjugaison de verbes',
					'conjugaison_phrase' => 'Conjugaison de phrases'
				];
				// Je parcours chaque exercice pour les afficher
				foreach ($exercices as $key => $label):
					// Je vérifie si l'exercice est flouté
					$floute = in_array($key, $exercices_floutes);
				?>
					<div class="bg-white p-6 rounded-lg shadow-lg text-center">
						<div class="<?php echo $floute ? 'floute' : ''; ?>">
							<a href="<?php echo $key; ?>/index.php" class="block text-black font-bold no-underline <?php echo $floute ? 'pointer-events-none' : ''; ?>">
								<img src="./images/<?php echo $key; ?>.png" class="mx-auto mb-4">
								<?php echo $label; ?>
							</a>
						</div>
						<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'enseignant'): ?>
							<div class="mt-4 flex items-center justify-center bg-blue-500 text-white p-2 rounded">
								<input type="checkbox" name="exercices_a_flouter[]" value="<?php echo $key; ?>" <?php echo $floute ? 'checked' : ''; ?> class="form-checkbox h-5 w-5 text-blue-600 border-2 border-white rounded focus:ring-2 focus:ring-blue-500">
								<label for="exercices_a_flouter[]" class="ml-2"><?php echo $floute ? 'Déflouter' : 'Flouter'; ?></label>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
			<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'enseignant'): ?>
				<button type="submit" name="submit_floutage" class="bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-8">
					Enregistrer les modifications
				</button>
			<?php endif; ?>
		</form>
	</div>

	<?php include 'footer.php'; ?>
</body>

</html>