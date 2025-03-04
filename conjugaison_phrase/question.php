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
    <?php
    $_SESSION['nbQuestion'] = $_SESSION['nbQuestion'] + 1;
    $fichier = file("listeQuestions.txt");
    $total = count($fichier);
    $alea = mt_rand(0, $total - 1);
    $ligneFichier = explode(';', $fichier[$alea]);
    $numPronom = mb_substr($ligneFichier[0], 0, 1);
    if ($numPronom == "*") {
        $numPronom = mt_rand(1, 1);
        switch ($numPronom) {
            case "1":
                $sujet = "Je";
                break;
            case "2":
                $sujet = "Tu";
                break;
            case "3":
                $alea = mt_rand(0, 2);
                $sujet = "Il";
                if ($alea == 0)
                    $sujet = "Elle";
                if ($alea == 1)
                    $sujet = "On";
                break;
            case "4":
                $sujet = "Nous";
                break;
            case "5":
                $sujet = "Vous";
                break;
            case "6":
                $sujet = "Ils";
                if (mt_rand(0, 1) == 0)
                    $sujet = "Elles";
                break;
        }
    } else {
        $sujet = mb_substr($ligneFichier[0], 1);
    }
    $verbe = $ligneFichier[1];
    $finDePhrase = $ligneFichier[2];
    $bonneReponse = conjugaison("verbes/" . supprime_caracteres_speciaux($verbe) . "_present.txt", $numPronom);
    $bonneReponsescs = supprime_caracteres_speciaux($bonneReponse);
    if ($sujet == "Je" && (substr($bonneReponsescs, 0, 1) == "a" || substr($bonneReponsescs, 0, 1) == "e" || substr($bonneReponsescs, 0, 1) == "i" || substr($bonneReponsescs, 0, 1) == "o" || substr($bonneReponsescs, 0, 1) == "u")) {
        $sujet = "J'";
    }
    ?>
    <div class="container mx-auto py-8">
        <div class="bg-white p-8 rounded-lg shadow-lg text-center">
            <h1 class="text-4xl font-bold mb-4">Question Numéro <?php echo $_SESSION['nbQuestion']; ?></h1>
            <h2 class="text-2xl mb-4">Conjugue le verbe <u><?php echo $verbe; ?></u> pour compléter cette phrase :</h2>
            <form action="./correction.php" method="post" class="space-y-4">
                <input type="hidden" name="sujet" value="<?php echo $sujet; ?>">
                <input type="hidden" name="correction" value="<?php echo $bonneReponse; ?>">
                <input type="hidden" name="finDePhrase" value="<?php echo $finDePhrase; ?>">
                <label for="mot" class="block text-lg font-medium text-gray-700"><?php echo $sujet; ?> ... <?php echo $finDePhrase; ?></label>
                <input type="text" id="mot" name="mot" autocomplete="off" autofocus class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Valider</button>
            </form>
        </div>
    </div>

    <?php include '../footer.php'; ?>
</body>

</html>