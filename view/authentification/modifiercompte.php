<?php
define('MAX_SIZE', 1000000000);  
?>
	
		<form method="post" class="row content " >
		<div class="columns large-4 small-4">
			<label for="newuser">Votre nouveau nom :</label>
			<input type="text" name="newuser" />
		</div>
		<div class="columns large-4 small-4">
			<label for="newuserpr">Votre nouveau prenom :</label>
			<input type="text" name="newuserpr" />
		</div>
		<div class="columns large-4 small-4">
			<label for="newmail">Votre nouveau mail :</label>
			<input type="text" name="newmail" />
		</div>
		<div class="columns large-4 small-4">
			<label for="oldpassword">VOTRE ANCIEN MOT DE PASSE :</label>
			<input type="password" name="oldpassword" required/>
		</div>
		<div class="columns large-4 small-4">
			<label for="newpassword">Votre nouveau mot de passe :</label>
			<input type="password" name="newpassword" />
		</div>
		 <div class="large-4 columns">
          <p>
            <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Avatar :</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
            <input required name="fichier" type="file" id="fichier_a_uploader" />
          </p>
		  </div>
		<div class="columns2 large-3 small-3">
		<input type="submit" name="envoyer" class="button"/>
		</div>

		</form>
