<?php
if( !empty($message) ) 
{
  echo '<p>',"\n";
  echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
  echo "\t</p>\n\n";
}
?>
<!-- Debut du formulaire -->

<div class="row content">
  <form enctype="multipart/form-data" action="" method="post">
    <div class="large-4 columns">
      <p>
        <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Avatar :</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
        <input required name="fichier" type="file" id="fichier_a_uploader" />
      </p>
      <a href="authentification/infocompte"><input required type="submit" name="submit" value="M'inscrire" class="button small" /></a>
    </div>
  </form>
</div>
    <!-- Fin du formulaire -->