<!DOCTYPE HTML>
<html>
<?php
if (!empty($_SESSION['utilisateur_id']))
{
?>
		<div class='row content'>
		<div class='small-8 large-8 columns'>
		<h1 class='columns large-12 center' >VOTRE COMPTE</h1>
		<div id='infocompte' class='columns small-12 large-12 center'>
		<strong>Votre nom : </strong><?php echo $this->data["row"]["last_name"];?></br>
		<strong>Votre prenom : </strong><?php echo $this->data["row"]["first_name"];?></br>
		<strong>Votre mail : </strong><?php $this->data["row"]["mail"];?></br>
		</div>
		<a href='/seeit/modifiercompte' class='button expand' style='margin-top: 68px' >Modification du compte</a>
		</div>
		<div class='small-4 large-4 columns'>
		<a href='/seeit/modifierimage'><img src='img/<?php echo $this->data["row"]["avatar"];?>' id='photoavatar'/></a>
		</div>
		</div>
<?php
}
else{
	echo "Vous n'êtes pas inscrit" ;
}
?>
</html>