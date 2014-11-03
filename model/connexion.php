<?php

include('bdd.php') ;

if(!empty($_POST["envoyer"]))
	{
	if(isset($_POST['mail']) || isset($_POST['mdp']))
			{
			
			if($_POST['mail']!="" && $_POST['mdp']!="")
			{
				$mail = mysql_real_escape_string($_POST["mail"]) ;
				$mdp = mysql_real_escape_string($_POST["mdp"]) ;
			
				$sql = 'SELECT user_id, last_name, first_name FROM users WHERE mail ="'.$mail.'"
				AND password="'.$mdp.'"';
				$result = $db->prepare($sql);
				$columns = $result->execute();
				$columns = $result->fetch();

			
				if(!empty($columns))
				{					
					$_SESSION['nom'] = $columns['last_name'] ;	
					$_SESSION['utilisateur'] = $columns['first_name']. ' '.$columns['last_name'];
					$_SESSION['user_id'] = $columns['user_id'];		
					header('location:../index.php') ;
				}
				else
				{					
					echo "<div class=\"erreur_connexion\">Vos identifiants sont erronés</div>";					
				}
			}
			else
			{
				echo "<div class=\"erreur_connexion_champs\">Remplissez tous les champs</div>";
			}
		}
	}
	?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<body>
		<div id="rond1">
			<h3>CONNEXION</h3>
			<form method="post" action="">
				<input type="mail" name="mail" placeholder="mail" class="mail"/> <br/>
				<input type="password" name="mdp" placeholder="mot de passe" class="password" />
				<input type="submit" name="envoyer" id="submit"/>
			</form>
		</div>
		<div id="rond2">
			<h3>INSCRIPTION<br/>GRATUITE</h3>
			<a href="inscription.php">
				<div id="inscription"> S'inscrire</div>
			</a>
		</div>

	</body>
</html>