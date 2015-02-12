<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My Cinema - Film</title>
		<link rel="stylesheet" href="my_cinema.css">
	</head>
	<body> 
		<h1>Bienvenue sur le site MY_CINEMA !</h1>
		<nav>
			<ul>
				<li id="un"><a href="recherche.php">Rechercher un film</a></li>
				<li id="deux"><a href="abonnements.php">Abonnements</a></li>
				<li id="trois"><a href="reduc.php">Réductions</a></li>
				<li id="quatre"><a href="clients.php">Les Clients</a></li>
			</ul>
		</nav>
		<div class="conteneur">
			<h2>Description du film</h2>
			<?php
				require_once ('connexion.php');
				$connect_bdd = connect_db();
				$id_page = intval($_GET['id']);
				$films = $connect_bdd->query("SELECT `titre`, `resum`, `annee_prod`, tp_genre.nom AS 'Genre', tp_distrib.nom AS 'Distributeur' FROM tp_film LEFT JOIN tp_genre ON tp_film.id_genre = tp_genre.id_genre LEFT JOIN tp_distrib ON tp_film.id_distrib = tp_distrib.id_distrib WHERE `id_film` = '$id_page'");
			?>
			<table>
				<tr class="titre">
					<td>Nom du film</td>
					<td>Résumé</td>
					<td>Année de production</td>
					<td>Genre</td>
					<td>Distributeur</td>
				</tr>
			<?php
			while($donnees = $films->fetch()){
			?>
				<tr class="donnees">
					<td><?php
					 echo $donnees['titre'];?></td>
					 <td><?php
					 echo $donnees['resum'];?></td>
					 <td><?php
					 echo $donnees['annee_prod'];?></td>
					 <td><?php
					 echo $donnees['Genre'];?></td>
					 <td><?php
					 echo $donnees['Distributeur'];?></td>
				</tr>

			<?php
			}
			?>
			</table>
		</div>		
	</body>
</html>