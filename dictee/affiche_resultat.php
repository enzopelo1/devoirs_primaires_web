<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Résultats</title>
		<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
	</head>
	<body style="background-color:grey;">
		<?php include 'header.php'; ?>
		<center>
			<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:1000px;height:430px;background-image:url('./images/NO.jpg');background-repeat:no-repeat;">
						<center>
						
							<?php
								if($_GET['prenomRes']==""){
									include 'utils.php';
									log_adresse_ip("logs/log.txt","affiche_resultat.php");
							?>
						
						
						
							<h3>Quel est le prénom de l'enfant ?</h3><br />
							<form action="./affiche_resultat.php" method="get">
								<input type="text" id="prenomRes" name="prenomRes" autocomplete="off"><br /><br /><br />
								<input type="submit" value="Afficher les résultats">
							</form>
						
						
							<?php
								}else{
									include 'utils.php';
									log_adresse_ip("logs/log.txt","affiche_resultat.php - ".$_GET['prenomRes']);
									echo '<h1>Résultats de '.$_GET['prenomRes'].'</h1>';
									$total=0;
									$files=scandir('./resultats/');
									$_GET['prenomRes']=strtolower($_GET['prenomRes']);
                                    $_GET['prenomRes']=supprime_caracteres_speciaux($_GET['prenomRes']);
									foreach ($files as $fichier)
										if(substr($fichier, 0, strlen($_GET['prenomRes']))==$_GET['prenomRes']){
											echo '<a href="./resultats/'.$fichier.'">'.$fichier.'</a> : ';
											$fichierOuvert = file('./resultats/'.$fichier);
											$der_ligne = $fichierOuvert[count($fichierOuvert)-1];
											$total=$total+$der_ligne;
											echo $der_ligne.' points - <a href="supprimer_resultat.php?prenomRes='.$_GET['prenomRes'].'&nomFichier='.$fichier.'">supprimer</a><br /><br />';
										}
										
									echo '<hr><br />';
										
									if($total>1)
										echo '<h2>TOTAL : '.$total.' POINTS</h2>';
									else
										echo '<h2>TOTAL : '.$total.' POINT</h2>';
								}
							?>
							
							
															
						
						
						
						</center>
					</td>
					<td style="width:280px;height:430px;background-image:url('./images/NE.jpg');background-repeat:no-repeat;"></td>
				</tr>
				<tr>
					<td style="width:1000px;height:323px;background-image:url('./images/SO.jpg');background-repeat:no-repeat;"></td>
					<td style="width:280px;height:323px;background-image:url('./images/SE.jpg');background-repeat:no-repeat;"></td>
				</tr>
			</table>
		</center>
		<br />
		<?php include 'footer.php'; ?>
	</body>
</html>
