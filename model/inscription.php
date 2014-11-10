<?php
	
include('bdd.php');	

if(!empty($_POST['Envoyer']))
{       

	if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["password"]))
		{
		
			if(!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["mail"]) && !empty($_POST["password"]))
			{
				
				$last_name=$_POST["nom"];
				$first_name=$_POST["prenom"];
				$mail=$_POST["mail"];
				$password=$_POST["password"];
			$sql = 'INSERT INTO users(last_name, first_name, mail, password)
					VALUES (:last_name, :first_name, :mail, :password)';
					echo $sql ;
					$result = $db->prepare($sql);
				$columns = $result->execute(array(
											':last_name'=>$last_name,
											':first_name'=>$first_name,
											':mail'=>$mail,
											':password'=>$password
									));
				$columns = $result->fetch();
				$_SESSION['utilisateur'] = $_POST["first_name"]. ' '.$_POST["last_name"];
				 $_SESSION['first_name'] = $_POST["first_name"] ;
				 $_SESSION['id'] = $_POST["utilisateur_id"] ;
				 header('location:../index.php') ;
				 

			
			}
			else
			{
				echo "Remplissez tous les champs s'il vous plait" ;
			}
		}

    }

?>


	
		<div class="arrondi">
			<h1 align="center" > INSCRIPTION </h1>
	<form method="post" align="center" id="inscription" enctype="multipart/form-data">
		<fieldset>
		<strong><h3>Vos coordonnées</h3></strong>
		<div id="form">
		<label for="nom">Votre nom</label> : <input type="text" name="nom" id="nom"/>
		<br/>
		<label for="prenom">Votre prénom</label> : <input type="text" name="prenom" id="prenom" />
		<br/>
		<label for="mail">Votre mail</label> : <input type="email" name="mail"  id="mail" placeholder="Ex : john.doe@doe.com"/>
		<br/>
		<label for="motdepasse">Votre mot de passe</label> : <input type="password" name="password" id="motdepasse" />
		<br/>
   <a href="accueil.php"><input type="submit" value="Envoyer" name="Envoyer" id="envoyer"/></a>
		</div>
	</form></fieldset>
	</form>
	</div>
