<?php if( !empty($message) ) 
      {
        if ($message == 1){
          echo '<div data-alert class="alert-box success radius">
  This is a success alert with a radius.
  <a href="#" class="close">&times;</a>
</div>';
        }
      }
?>   

    <!-- Debut du formulaire -->
   <form enctype="multipart/form-data" action="" method="post">
    <fieldset>
        <legend>Formulaire</legend>
          <p>
            <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
            <input name="fichier" type="file" id="fichier_a_uploader" />
            <input type="submit" name="submit" value="Uploader" />
          </p>
      </fieldset>
    </form>